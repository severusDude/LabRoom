<?php

namespace App\Livewire;

use App\Models\Lab;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowDataLab extends Component
{

    public $data;

    public function mount($id)
    {
        Log::info("Mounting ShowDataLab with ID: " . $id);
        $this->data = Lab::findOrFail($id);
        // dd(view()->exists('vendor.filament.components.layout.index')); // Harus return true
    }

    public function goBack()
    {
        Log::info("Mounting ShowDataLab with ID: ");
        dd("Njir");
        return redirect()->back();  // Mengarahkan kembali ke halaman sebelumnya
    }

    public function render()
    {
        // return view('livewire.show-data-lab')
        //     ->layout("vendor.filament.components.layout.index", [
        //         'livewire' => $this
        //     ]);
        // return view(
        //     'livewire.show-data-lab'
        // )->layout("vendor.filament.components.layout.index", [
        //     'title' => 'Detail Data',
        //     'content' => $this->data,
        //     'livewire' => $this,  // Menambahkan komponen Livewire
        // ]);


        return view('livewire.show-data-lab')
            ->layout('components.layouts.app', [
                'title' => 'Detail Data Lab',
                'content' => $this->data,
            ]);
    }
}
