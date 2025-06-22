<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Data Mata Kuliah</h2>

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="bg-white p-6 rounded shadow space-y-4">
        
        <div>
    <label class="block mb-1 font-medium">Kode Mata Kuliah</label>
    <input type="text" wire:model="kode" class="w-full border-gray-300 rounded shadow-sm">
    @error('kode') <small class="text-red-500">{{ $message }}</small> @enderror
</div>

        <div>
            <label class="block mb-1 font-medium">Nama Mata Kuliah</label>
            <input type="text" wire:model="nama_matakuliah" class="w-full border-gray-300 rounded shadow-sm">
        </div>

        <div>
            <label class="block mb-1 font-medium">SKS</label>
            <input type="number" wire:model="sks" class="w-full border-gray-300 rounded shadow-sm">
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">{{ $isEdit ? 'Update' : 'Simpan' }}</button>
    </form>

    <table class="table-auto w-full mt-6 bg-white shadow rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">#</th>
                 <th class="px-4 py-2">Kode</th>
                <th class="px-4 py-2">Mata Kuliah</th>
                <th class="px-4 py-2">SKS</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matakuliahs as $index => $mk)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $index+1 }}</td>
                <td class="px-4 py-2">{{ $mk->kode }}</td>
                <td class="px-4 py-2">{{ $mk->nama_matakuliah }}</td>
                <td class="px-4 py-2">{{ $mk->sks }}</td>
                <td class="px-4 py-2">
                    <button wire:click="edit({{ $mk->id }})" class="text-yellow-600 hover:underline">Edit</button>
                    <button wire:click="delete({{ $mk->id }})" class="text-red-600 hover:underline ml-2">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
