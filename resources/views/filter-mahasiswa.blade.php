<div class="mt-10 bg-white p-6 shadow rounded-lg">
    <h3 class="text-lg font-semibold mb-4">Filter Mahasiswa</h3>

    {{-- Filter Form --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
            <select wire:model="fakultas_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Semua Fakultas --</option>
                @foreach($fakultasList as $fakultas)
                    <option value="{{ $fakultas->id }}">{{ $fakultas->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
            <input type="text" wire:model="semester" placeholder="Misal: 4" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
    </div>

    {{-- Tabel Mahasiswa --}}
    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-gray-200">
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
                @forelse($mahasiswas as $mhs)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $mhs->nama }}</td>
                        <td class="px-4 py-2">{{ $mhs->nim }}</td>
                        <td class="px-4 py-2">{{ $mhs->prodi->fakultas->nama_fakultas ?? '-' }}</td>
                        <td class="px-4 py-2">
                            {{ $mhs->krs->first()?->semester ?? '-' }}
                        </td>
                       <td class="px-4 py-2">
    {{
        $mhs->krs->sum(function($k) {
            return optional($k->matakuliah)->sks ?? 0;
        })
    }} SKS
</td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-500">
                            Tidak ada data mahasiswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
