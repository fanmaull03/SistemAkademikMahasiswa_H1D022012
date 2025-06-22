<?php

namespace App\Livewire\Krs;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Livewire\Component;

class KrsIndex extends Component
{
    public $mahasiswa_id, $semester;
    public $selectedMatakuliahs = [];
    public $totalSks = 0;

    public function updatedSelectedMatakuliahs()
    {
        $this->totalSks = Matakuliah::whereIn('id', $this->selectedMatakuliahs)->sum('sks');
    }

   public function render()
{
    return view('livewire.krs.krs-index', [
        'mahasiswas' => Mahasiswa::all(),
        'matakuliahs' => Matakuliah::all(),
        'totalSks' => $this->totalSks, // Gunakan properti yang sudah dihitung Livewire
    ]);
}
public function mount()
{
    $this->totalSks = 0;
}


    public function submit()
    {
        $this->validate([
            'mahasiswa_id' => 'required',
            'semester' => 'required',
            'selectedMatakuliahs' => 'required|array|min:1',
        ]);

        if ($this->totalSks > 24) {
            $this->addError('sks', 'Total SKS melebihi batas maksimal 24.');
            return;
        }

        foreach ($this->selectedMatakuliahs as $mk_id) {
            Krs::create([
                'mahasiswa_id' => $this->mahasiswa_id,
                'matakuliah_id' => $mk_id,
                'semester' => $this->semester,
            ]);
        }

        session()->flash('message', 'KRS berhasil disimpan.');
        $this->reset(['mahasiswa_id', 'semester', 'selectedMatakuliahs', 'totalSks']);
    }
}