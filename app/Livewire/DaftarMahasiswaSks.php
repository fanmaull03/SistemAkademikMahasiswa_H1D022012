<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mahasiswa;

class DaftarMahasiswaSks extends Component
{
    public function render()
    {
        $mahasiswas = Mahasiswa::with(['prodi.fakultas', 'krs.matakuliah'])->get();

        return view('livewire.daftar-mahasiswa-sks', [
            'mahasiswas' => $mahasiswas,
        ]);
    }
}