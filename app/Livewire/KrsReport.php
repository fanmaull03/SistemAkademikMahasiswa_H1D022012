<?php

namespace App\Livewire;

use App\Models\Fakultas;
use App\Models\Krs;
use App\Models\Mahasiswa;
use Livewire\Component;

class KrsReport extends Component
{
    public $fakultas_id, $semester;

    public function render()
    {
        $query = Mahasiswa::with(['prodi.fakultas', 'krs.matakuliah']);

        if ($this->fakultas_id) {
            $query->whereHas('prodi', function ($q) {
                $q->where('fakultas_id', $this->fakultas_id);
            });
        }

        if ($this->semester) {
            $query->whereHas('krs', function ($q) {
                $q->where('semester', $this->semester);
            });
        }

        return view('livewire.krs-report', [
            'mahasiswas' => $query->get(),
            'fakultasList' => Fakultas::all()
        ]);
    }
}
