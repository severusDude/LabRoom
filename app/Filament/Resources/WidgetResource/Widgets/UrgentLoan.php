<?php

namespace App\Filament\Resources\WidgetResource\Widgets;

use App\Filament\Resources\LoanResource;
use App\Models\Loan;
use Carbon\Carbon;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class UrgentLoan extends BaseWidget
{
    protected static ?int $sort = 5;
    protected int | string | array $columnSpan = "full";
    public function table(Table $table): Table
    {
        $now = Carbon::now();
        $tenHoursBefore = $now->copy()->subMinutes(30);
        $tenHoursAfter = $now->copy()->addMinutes(30);

        return $table
            ->query(
                LoanResource::getEloquentQuery()->whereBetween('effect_date', [$tenHoursBefore, $tenHoursAfter])
            )
            ->defaultPaginationPageOption(5)
            ->defaultSort("created_at", 'desc')
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
            ])
            ->filters([
                Filter::make('is_pending')
                    ->label('Pending')
                    ->query(fn(Builder $query): Builder => $query->whereHas('approval', function ($query) {
                        $query->where('approval_status', 'Pending');
                    }))
                    ->default(true)
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
        ;
    }
}
