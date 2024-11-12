<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoanResource\Pages;
use App\Filament\Resources\LoanResource\RelationManagers;
use App\Models\Lab;
use App\Models\Loan;
use App\Models\Subject;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoanResource extends Resource
{
    protected static ?string $model = Loan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                Forms\Components\DateTimePicker::make('effect_date')
                    ->default(now())
                    ->required(),
                Forms\Components\DateTimePicker::make('end_date')
                    ->default(now()->addHour())
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
                    ->label('ID'),
                Tables\Columns\TextColumn::make('lab.lab_name')
                    ->label('Nama Lab'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Peminjam'),
                Tables\Columns\TextColumn::make('subject.name'),
                Tables\Columns\TextColumn::make('effect_date')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('end_date')
                    ->dateTime(),
                Tables\Columns\IconColumn::make('is_repeat')
                    ->boolean()
                    ->label('Berulang'),
                Tables\Columns\TextColumn::make('approval.approved_by'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
