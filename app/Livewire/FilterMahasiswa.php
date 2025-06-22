<?php

namespace App\Livewire;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use Livewire\Component;

class FilterMahasiswa extends Component
{
    public $fakultas_id = '';
    public $semester = '';

    public function render()
    {
        $query = Mahasiswa::query()->with('prodi.fakultas', 'krs.matakuliah');

        if ($this->fakultas_id) {
            $query->whereHas('prodi', fn($q) => $q->where('fakultas_id', $this->fakultas_id));
        }

        if ($this->semester) {
            $query->whereHas('krs', fn($q) => $q->where('semester', $this->semester));
        }

        return view('livewire.filter-mahasiswa', [
            'fakultasList' => \App\Models\Fakultas::all(),
            'mahasiswas' => $query->get()
        ]);
    }
}
