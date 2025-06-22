<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded-lg mt-8">
    <h2 class="text-2xl font-semibold mb-4">Data Prodi</h2>

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4">
        <div>
            <label class="block text-sm">Nama Prodi</label>
            <input wire:model="nama_prodi" type="text" class="w-full border px-3 py-2 rounded" />
            @error('nama_prodi') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm">Fakultas</label>
            <select wire:model="fakultas_id" class="w-full border px-3 py-2 rounded">
                <option value="">-- Pilih Fakultas --</option>
                @foreach($fakultas as $f)
                    <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                @endforeach
            </select>
            @error('fakultas_id') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ $isEdit ? 'Update' : 'Simpan' }}</button>
    </form>

    <table class="w-full mt-6 table-auto border-collapse">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Nama Prodi</th>
                <th class="px-4 py-2 text-left">Fakultas</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prodis as $index => $prodi)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $prodi->nama_prodi }}</td>
                    <td class="px-4 py-2">{{ $prodi->fakultas->nama_fakultas }}</td>
                    <td class="px-4 py-2">
                        <button wire:click="edit({{ $prodi->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                        <button wire:click="delete({{ $prodi->id }})" class="bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
