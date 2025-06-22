<div class="p-6 bg-white rounded shadow max-w-5xl mx-auto">
    <h2 class="text-lg font-semibold mb-4">Filter Mahasiswa</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium">Fakultas</label>
            <select wire:model="fakultas_id" class="w-full mt-1 border-gray-300 rounded">
                <option value="">-- Semua Fakultas --</option>
                @foreach($fakultasList as $f)
                    <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium">Semester</label>
            <input type="number" wire:model="semester" min="1" class="w-full mt-1 border-gray-300 rounded" placeholder="Misal: 4">
        </div>
    </div>

    <table class="w-full table-auto bg-white border mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">NIM</th>
                <th class="px-4 py-2 text-left">Fakultas</th>
                <th class="px-4 py-2 text-left">Semester</th>
                <th class="px-4 py-2 text-left">Total SKS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $mhs)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $mhs->nama }}</td>
                    <td class="px-4 py-2">{{ $mhs->nim }}</td>
                    <td class="px-4 py-2">{{ $mhs->prodi->fakultas->nama_fakultas ?? '-' }}</td>
                    <td class="px-4 py-2">
                        {{ $semester ?: '-' }}
                    </td>
                    <td class="px-4 py-2">
                        {{ $mhs->krs->where('semester', $semester)->sum(fn($k) => $k->matakuliah->sks ?? 0) }} SKS
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
