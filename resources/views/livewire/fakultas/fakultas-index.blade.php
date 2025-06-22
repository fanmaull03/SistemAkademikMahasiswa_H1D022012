<div class="max-w-3xl mx-auto mt-8 p-4 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Data Fakultas</h2>

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4">
        <div>
            <label class="block font-medium mb-1">Nama Fakultas</label>
            <input type="text" wire:model="nama_fakultas" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('nama_fakultas') 
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                {{ $isEdit ? 'Update' : 'Simpan' }}
            </button>

            @if($isEdit)
                <button type="button" wire:click="resetForm" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                    Batal
                </button>
            @endif
        </div>
    </form>

    <table class="min-w-full mt-6 border border-gray-300 rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">#</th>
                <th class="border px-4 py-2 text-left">Nama Fakultas</th>
                <th class="border px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fakultas as $index => $row)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $row->nama_fakultas }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <button wire:click="edit({{ $row->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 text-sm">Edit</button>
                        <button wire:click="delete({{ $row->id }})" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 text-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
