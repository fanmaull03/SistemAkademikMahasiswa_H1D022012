<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-2">Pengisian KRS</h2>

    {{-- Mahasiswa --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-1">Mahasiswa</label>
        <select wire:model="mahasiswa_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="">-- Pilih Mahasiswa --</option>
            @foreach($mahasiswas as $mhs)
                <option value="{{ $mhs->id }}">{{ $mhs->nama }} ({{ $mhs->nim }})</option>
            @endforeach
        </select>
        @error('mahasiswa_id') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Semester --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
        <input type="text" wire:model="semester" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        @error('semester') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Mata Kuliah --}}
    <div class="mb-5">
        <label class="block text-sm font-medium text-gray-700 mb-2">Mata Kuliah</label>
        <div class="space-y-2">
            @foreach($matakuliahs as $mk)
                <div class="flex items-center">
                    <input type="checkbox" wire:model="selectedMatakuliahs" value="{{ $mk->id }}" class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label class="ml-2 text-gray-700">{{ $mk->kode }} - {{ $mk->nama_matakuliah }} ({{ $mk->sks }} SKS)</label>
                </div>
            @endforeach
        </div>
        @error('selectedMatakuliahs') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Total SKS --}}
    <div class="mb-5">
        <p class="text-sm text-gray-800">Total SKS Dipilih: <span class="font-semibold">{{ $totalSks }}</span></p>
        @if($totalSks > 24)
            <p class="text-sm text-red-600 mt-1">⚠️ Total SKS melebihi batas maksimal (24 SKS)</p>
        @endif
    </div>

    {{-- Tombol Simpan --}}
    <div class="flex justify-end">
        <button
            wire:click="submit"
            class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-700 transition"
            {{ $totalSks > 24 ? 'disabled' : '' }}>
            Simpan
        </button>
    </div>
</div>
