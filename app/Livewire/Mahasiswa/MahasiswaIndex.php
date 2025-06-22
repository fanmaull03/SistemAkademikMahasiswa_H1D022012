<?php

namespace App\Livewire\Mahasiswa;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class MahasiswaIndex extends Component
{
    public $nim, $nama, $prodi_id, $mahasiswaId;
    public $isEdit = false;

    public function render()
    {
        return view('livewire.mahasiswa.mahasiswa-index', [
            'mahasiswas' => Mahasiswa::with('prodi.fakultas')->get(),
            'prodis' => Prodi::with('fakultas')->get(),
        ]);
    }

    public function store()
    {
        $this->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'prodi_id' => 'required'
        ]);

        Mahasiswa::create([
            'nim' => $this->nim,
            'nama' => $this->nama,
            'prodi_id' => $this->prodi_id
        ]);

        $this->resetForm();
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        $this->mahasiswaId = $id;
        $this->nim = $mhs->nim;
        $this->nama = $mhs->nama;
        $this->prodi_id = $mhs->prodi_id;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required'
        ]);

        Mahasiswa::find($this->mahasiswaId)->update([
            'nim' => $this->nim,
            'nama' => $this->nama,
            'prodi_id' => $this->prodi_id
        ]);

        $this->resetForm();
    }

    public function delete($id)
    {
        Mahasiswa::find($id)->delete();
    }

    private function resetForm()
    {
        $this->nim = '';
        $this->nama = '';
        $this->prodi_id = '';
        $this->mahasiswaId = null;
        $this->isEdit = false;
    }
}
