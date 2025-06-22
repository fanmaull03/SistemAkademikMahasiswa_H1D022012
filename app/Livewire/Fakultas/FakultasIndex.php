<?php

namespace App\Livewire\Fakultas;

use Livewire\Component;
use App\Models\Fakultas;

class FakultasIndex extends Component
{
    public $nama_fakultas, $fakultasId;
    public $isEdit = false;

    public function render()
    {
        return view('livewire.fakultas.fakultas-index', [
            'fakultas' => Fakultas::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'nama_fakultas' => 'required'
        ]);

        Fakultas::create([
            'nama_fakultas' => $this->nama_fakultas
        ]);

        $this->resetForm();
    }

    public function edit($id)
    {
        $fakultas = Fakultas::find($id);
        $this->fakultasId = $id;
        $this->nama_fakultas = $fakultas->nama_fakultas;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nama_fakultas' => 'required'
        ]);

        Fakultas::find($this->fakultasId)->update([
            'nama_fakultas' => $this->nama_fakultas
        ]);

        $this->resetForm();
    }

    public function delete($id)
    {
        Fakultas::find($id)->delete();
    }

    private function resetForm()
    {
        $this->nama_fakultas = '';
        $this->isEdit = false;
        $this->fakultasId = null;
    }
}
