<div class="container mt-4">
    <h2>Laporan KRS Mahasiswa</h2>

    <div class="row mb-3">
        <div class="col-md-4">
            <label>Fakultas</label>
            <select wire:model="fakultas_id" class="form-control">
                <option value="">Semua Fakultas</option>
                @foreach($fakultasList as $fakultas)
                    <option value="{{ $fakultas->id }}">{{ $fakultas->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label>Semester</label>
            <input type="text" wire:model="semester" class="form-control" placeholder="Contoh: Ganjil 2024">
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Fakultas</th>
                <th>Semester</th>
                <th>Total SKS</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswas as $mhs)
                @php
                    $krsSemester = $mhs->krs->where('semester', $semester ?: $mhs->krs->pluck('semester')->first());
                    $totalSKS = $krsSemester->sum(fn($krs) => $krs->matakuliah->sks);
                    $semesterLabel = $semester ?: ($krsSemester->first()->semester ?? '-');
                @endphp
                <tr>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->prodi->nama_prodi }}</td>
                    <td>{{ $mhs->prodi->fakultas->nama_fakultas }}</td>
                    <td>{{ $semesterLabel }}</td>
                    <td>{{ $totalSKS }}</td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Data tidak ditemukan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
