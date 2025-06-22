<?php

namespace App\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;
use App\Models\Fakultas;

class ProdiIndex extends Component
{
    public $nama_prodi, $fakultas_id, $prodiId;
    public $isEdit = false;

    public function render()
    {
        return view('livewire.prodi.prodi-index', [
            'prodis' => Prodi::with('fakultas')->get(),
            'fakultas' => Fakultas::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'nama_prodi' => 'required',
            'fakultas_id' => 'required'
        ]);

        Prodi::create([
            'nama_prodi' => $this->nama_prodi,
            'fakultas_id' => $this->fakultas_id
        ]);

        $this->resetForm();
    }

    public function edit($id)
    {
        $prodi = Prodi::find($id);
        $this->prodiId = $id;
        $this->nama_prodi = $prodi->nama_prodi;
        $this->fakultas_id = $prodi->fakultas_id;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nama_prodi' => 'required',
            'fakultas_id' => 'required'
        ]);

        Prodi::find($this->prodiId)->update([
            'nama_prodi' => $this->nama_prodi,
            'fakultas_id' => $this->fakultas_id
        ]);

        $this->resetForm();
    }

    public function delete($id)
    {
        Prodi::find($id)->delete();
    }

    private function resetForm()
    {
        $this->nama_prodi = '';
        $this->fakultas_id = '';
        $this->isEdit = false;
        $this->prodiId = null;
    }
}
