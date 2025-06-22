<div class="max-w-6xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4 border-b pb-2 text-gray-800">Data Mahasiswa</h2>

    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">NIM</label>
                    <input type="text" wire:model="nim" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                    @error('nim') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" wire:model="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                    @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Prodi</label>
                    <select wire:model="prodi_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Prodi --</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }} ({{ $prodi->fakultas->nama_fakultas }})</option>
                        @endforeach
                    </select>
                    @error('prodi_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    {{ $isEdit ? 'Update' : 'Simpan' }}
                </button>
                @if($isEdit)
                    <button type="button" wire:click="resetForm" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
                @endif
            </div>
        </form>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full table-auto text-left">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">NIM</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Prodi</th>
                    <th class="px-4 py-2">Fakultas</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswas as $index => $mhs)
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $mhs->nim }}</td>
                        <td class="px-4 py-2">{{ $mhs->nama }}</td>
                        <td class="px-4 py-2">{{ $mhs->prodi->nama_prodi }}</td>
                        <td class="px-4 py-2">{{ $mhs->prodi->fakultas->nama_fakultas }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <button wire:click="edit({{ $mhs->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 text-sm">Edit</button>
                            <button wire:click="delete({{ $mhs->id }})" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 text-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center px-4 py-2 text-gray-500">Data belum tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
