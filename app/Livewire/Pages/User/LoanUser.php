<?php

namespace App\Livewire\Pages\User;

use App\Models\Lab;
use App\Models\Loan;
use App\Models\Subject;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoanUser extends Component
{
    public $isSubmitting = false;
    public $lab;
    public $labs;
    public $id;
    public $mata_kuliah;
    public $jam;
    public $user;

    public $labInput;
    public $mataKuliahInput;
    public $tanggalInput;
    public $jamMulaiInput = null;
    public $jamBerakhirInput = null;
    public $formattedJamMulai;
    public $formattedJamBerakhir;

    public function mount($id = null)
    {
        $this->id = $id;
        $this->lab = Lab::find($id);
        $this->labs = Lab::all();
        $this->mata_kuliah = Subject::all();


        $this->jam = [
            [
                'value' => '07:00'
            ],
            [
                'value' => '08:00'
            ],
            [
                'value' => '09:00'
            ],
            [
                'value' => '10:00'
            ],
            [
                'value' => '11:00'
            ],
            [
                'value' => '12:00'
            ],
            [
                'value' => '13:00'
            ],
            [
                'value' => '14:00'
            ],
            [
                'value' => '15:00'
            ],
            [
                'value' => '16:00'
            ],
            [
                'value' => '17:00'
            ]
        ];

        $this->user = Auth::id();
    }

    public function onSubmit()
    {
        $this->isSubmitting = true;
        $dateMulai = $this->tanggalInput . " " . $this->jamMulaiInput;
        $dateBerakhir = $this->tanggalInput . " " . $this->jamBerakhirInput;

        $this->formattedJamMulai = Carbon::parse($dateMulai)->toDateTimeString();
        $this->formattedJamBerakhir = Carbon::parse($dateBerakhir)->toDateTimeString();

        try {

            Loan::create([
                'lab_id' => $this->labInput,
                'created_by' => $this->user,
                'subject_id' => $this->mataKuliahInput,
                'effect_date' => $this->formattedJamMulai,
                'end_date' => $this->formattedJamBerakhir,
            ]);
            session()->flash('message', 'Permohonan Peminjaman Berhasil di kirim!');
        } catch (Exception $e) {
            session()->flash('error', 'Pengajuan Gagal, Harap Masukan Input Yang Benar!');
        } finally {

            $this->isSubmitting = false; // Setelah selesai submit
        }
    }

    public function render()
    {
        return view('livewire.pages.user.loan-user',);
    }
}
