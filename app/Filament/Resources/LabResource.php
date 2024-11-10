<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LabResource\Pages;
use App\Filament\Resources\LabResource\Pages\CreateLab;
use App\Filament\Resources\LabResource\RelationManagers;
use App\Models\Lab;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class LabResource extends Resource
{
    protected static ?string $model = Lab::class;

    // icon navigation
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // url / slug
    protected static ?string $slug = "kelola-laboratorium";
    // title
    protected static ?string $label = "Data Lab";
    protected static ?string $navigationGroup = "Kelola";
    protected static ?string $navigationLabel = 'Kelola Laboratorium';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("lab_name")
                    ->label("Nama Laboratorium")
                    ->columnSpan(2),
                RichEditor::make("lab_desc")->label("Kode Laboratorium")
                    ->columnSpan(2),
                TextInput::make("location")->label("Lokasi Laboratorium"),
                TextInput::make("capacity")->numeric()->label("Kapasitas Laboratorium"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("lab_name")->label("Nama Laboratorium")
                    ->sortable()
                    ->searchable(),
                TextColumn::make("location")
                    ->label("Lokasi Laboratorium"),
                TextColumn::make("capacity")
                    ->label("kapasitas Laboratorium"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make("view")
                    // ->label("View")
                    ->url(fn($record) => route("data.lab.show", $record->id))
                    ->color("ghost")
                    ->icon('heroicon-o-chevron-right'),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListLabs::route('/'),
            'create' => Pages\CreateLab::route('/create'),
            'edit' => Pages\EditLab::route('/{record}/edit'),
        ];
    }
}
