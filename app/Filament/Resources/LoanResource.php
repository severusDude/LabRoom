<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\Loan;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\LoanResource\Pages;

class LoanResource extends Resource
{
    protected static ?string $model = Loan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = "Kelola";
    protected static ?string $navigationLabel = 'Kelola Peminjaman';

    public static function form(Form $form): Form
    {
        $now = now();
        $minDate = Carbon::instance($now)->clone();
        $maxDate = Carbon::instance($now)->clone()->endOfMonth();

        return $form
            ->schema([
                // Forms\Components\DatePicker::make('date')
                //     ->native(false)
                //     ->label('Date')
                //     ->required()
                //     ->default($now)
                //     ->minDate($minDate)
                //     ->maxDate($maxDate),

                // Forms\Components\TimePicker::make('start_time')
                //     ->native(false)
                //     ->prefix('Start')
                //     ->label('Start Time')
                //     ->displayFormat('H:i')
                //     ->required()
                //     ->minutesStep(30) // 30-minute steps
                //     ->live() // Allows dynamic updates
                //     ->afterStateUpdated(function ($state, Get $get, Set $set) {
                //         $date = date("Y-m-d", strtotime($get('date')));
                //         $state = date("H:i", strtotime($state));
                //         $startDateTime = Carbon::parse("$date $state");

                //         $set('end_time', $startDateTime->clone()
                //             ->addHours((int)$get('duration') ?: 1)->format('H:i'));
                //     }),

                // Forms\Components\TextInput::make('duration')
                //     ->label('Duration (in hours)')
                //     ->numeric()
                //     ->step(0.5) // 30 minutes = 0.5 hour step
                //     ->requiredWith(['start_time']) // Required if start_time is selected
                //     ->live(),
                // // ->afterStateUpdated(function ($state, Get $get, Set $set) {
                // //     $end_time = Carbon::parse($get('start_time'))->addHours($state);

                // //     $set('end_time', $end_time);
                // // }),

                // Forms\Components\TimePicker::make('end_time')
                //     ->native(false)
                //     ->prefix('End')
                //     ->label('End Time')
                //     ->displayFormat('H:i')
                //     ->minutesStep(30)
                //     ->requiredWith(['start_time'])
                //     ->live(),
                // // ->afterStateUpdated(function ($state, Get $get, Set $set) {
                // //     $date = $get('date');
                // //     $start_time = $get('start_time');

                // //     $startDateTime = Carbon::parse("{$date} {$start_time}");
                // //     $endDateTime = Carbon::parse("{$date} {$state}");

                // //     $set('effect_date', $startDateTime);
                // //     $set('end_date', $endDateTime);
                // // }),

                // Forms\Components\Hidden::make('effect_date'), // Auto-filled field
                // Forms\Components\Hidden::make('end_date'), // Auto-filled field


                Forms\Components\Select::make('lab_id')
                    ->relationship('lab', 'lab_name')
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('created_by')
                    ->relationship('user', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('subject_id')
                    ->relationship('subject', 'name')
                    ->preload()
                    ->searchable()
                    ->default(1)
                    ->required(),
                Forms\Components\DateTimePicker::make('Mulai')
                    ->id('effect_date')
                    ->default(now())
                    ->required(),
                Forms\Components\DateTimePicker::make('end_date')
                    ->default(now()->addHour())
                    ->minDate(function (Get $get) {
                        return $get('effect_date') ?: now()->addHour();
                    })
                    ->required(),
                Forms\Components\Toggle::make('is_repeat')
                    ->label('Berulang')
                    ->inline(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('lab.lab_name')
                    ->label('Nama Lab'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Peminjam'),
                Tables\Columns\TextColumn::make('subject.name'),
                Tables\Columns\TextColumn::make("Waktu")
                    ->getStateUsing(function (Loan $record) {
                        $formatted = Carbon::parse($record->effect_date)->translatedFormat('l, d F');

                        // Parsing tanggal menggunakan Carbon
                        $startDate = Carbon::parse($record->effect_date);
                        $endDate = Carbon::parse($record->end_date);

                        // Mengambil bagian waktu saja (jam:menit:detik)
                        $startTime = $startDate->format('H:i');
                        $endTime = $endDate->format('H:i');

                        $time = "{$startTime} - {$endTime}";

                        return compact('formatted', 'time');
                    })
                    ->alignCenter()
                    ->listWithLineBreaks()
                    ->sortable(query: fn($query, $direction) => $query->orderBy('effect_date', $direction)),
                Tables\Columns\TextColumn::make("Durasi")
                    ->getStateUsing(function (Loan $record) {
                        $startDate = Carbon::parse($record->effect_date);
                        $endDate = Carbon::parse($record->end_date);

                        $hoursDifference = $startDate->diffInHours($endDate);

                        return "{$hoursDifference} Jam";
                    }),
                Tables\Columns\IconColumn::make('is_repeat')
                    ->boolean()
                    ->label('Berulang')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('approval.approval_status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Approved' => 'success',
                        'Rejected' => 'danger'
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('reject')
                    ->label('Reject')
                    ->button()
                    ->outlined()
                    ->color('danger')
                    ->size(ActionSize::Small)
                    ->visible(fn(Loan $record) => $record->approval->approval_status == 'Pending')
                    ->action(fn(Loan $record) => $record->approval->reject_loan()),
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->button()
                    ->color('success')
                    ->size(ActionSize::Small)
                    ->visible(fn(Loan $record) => $record->approval->approval_status == 'Pending')
                    ->action(fn(Loan $record) => $record->approval->approve_loan()),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('bulk_approve')
                        ->label('Setujui Permintaan')
                        ->deselectRecordsAfterCompletion()
                        ->requiresConfirmation()
                        ->action(fn(Collection $records) => $records->each(
                            fn(Loan $record) => $record->approval->approve_loan()
                        )),
                    Tables\Actions\BulkAction::make('bulk_reject')
                        ->label('Tolak Permintaan')
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion()
                        ->action(fn(Collection $records) => $records->each(
                            fn(Loan $record) => $record->approval->reject_loan()
                        )),
                ])->label('Persetujuan'),
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->checkIfRecordIsSelectableUsing(
                fn(Loan $record): bool => $record->approval->approval_status == 'Pending'
            )
            ->selectCurrentPageOnly();
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoans::route('/'),
            'create' => Pages\CreateLoan::route('/create'),
            'edit' => Pages\EditLoan::route('/{record}/edit'),
        ];
    }
}
