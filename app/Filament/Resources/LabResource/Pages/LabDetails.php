<?php

namespace App\Filament\Resources\LabResource\Pages;

use App\Filament\Resources\LabResource;
use App\Models\Lab;
use Filament\Resources\Pages\Page;

class LabDetails extends Page
{
    protected static string $resource = LabResource::class;
    protected static string $label = "Detail Laboratorium";
    protected static string $view = 'filament.resources.lab-resource.pages.lab-details';

    public $lab;

    //? record ini berdasarkan route pada 'detail' => Pages\LabDetails::route('/{record}/detail-lab'),
    public function mount($record){
        $this->lab = Lab::findOrFail($record);
    }
}
