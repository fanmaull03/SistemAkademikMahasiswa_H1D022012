<?php

namespace App\Livewire\Matakuliah;

use Livewire\Component;
use App\Models\Matakuliah;

class MatakuliahIndex extends Component
{
    public $kode, $nama_matakuliah, $sks, $matakuliahId;
    public $isEdit = false;

    public function render()
    {
        return view('livewire.matakuliah.matakuliah-index', [
            'matakuliahs' => Matakuliah::all()
        ]);
    }

    public function store()
{
    $this->validate([
        'kode' => 'required|unique:matakuliahs,kode',
        'nama_matakuliah' => 'required',
        'sks' => 'required|numeric|min:1'
    ]);

    Matakuliah::create([
        'kode' => $this->kode,
        'nama_matakuliah' => $this->nama_matakuliah,
        'sks' => $this->sks
    ]);

    session()->flash('message', 'Mata kuliah berhasil disimpan!');
    $this->resetForm();
}


    public function edit($id)
    {
        $mk = Matakuliah::find($id);
        $this->matakuliahId = $id;
        $this->kode = $mk->kode;
        $this->nama_matakuliah = $mk->nama_matakuliah;
        $this->sks = $mk->sks;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'kode' => 'required',
            'nama_matakuliah' => 'required',
            'sks' => 'required|numeric|min:1'
        ]);

        Matakuliah::find($this->matakuliahId)->update([
            'kode' => $this->kode,
            'nama_matakuliah' => $this->nama_matakuliah,
            'sks' => $this->sks
        ]);

        $this->resetForm();
    }

    public function delete($id)
    {
        Matakuliah::find($id)->delete();
    }

    private function resetForm()
    {
        $this->kode = '';
        $this->nama_matakuliah = '';
        $this->sks = '';
        $this->isEdit = false;
        $this->matakuliahId = null;
    }
}
