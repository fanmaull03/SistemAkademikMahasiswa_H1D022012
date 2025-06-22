<div class="bg-white p-6 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Daftar Mahasiswa dan Total SKS</h3>

    <table class="w-full table-auto">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">NIM</th>
                <th class="px-4 py-2 text-left">Prodi</th>
                <th class="px-4 py-2 text-left">Fakultas</th>
                <th class="px-4 py-2 text-left">Total SKS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $mhs)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $mhs->nama }}</td>
                    <td class="px-4 py-2">{{ $mhs->nim }}</td>
                    <td class="px-4 py-2">{{ $mhs->prodi->nama_prodi ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $mhs->prodi->fakultas->nama_fakultas ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $mhs->krs->sum(fn($k) => $k->matakuliah->sks ?? 0) }} SKS</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>