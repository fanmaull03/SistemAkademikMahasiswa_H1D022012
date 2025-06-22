{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Akademik') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="alert alert-success bg-green-100 p-3 mb-4 rounded">
                    Selamat datang, {{ Auth::user()->name }}
                </div>

                <div class="mt-6 text-gray-800">
                    <p>Sistem Informasi Akademik sederhana menggunakan Laravel + Livewire</p>
                    <p>Platform ini dirancang untuk memudahkan pengelolaan data mahasiswa, program studi, mata kuliah, dan KRS secara efisien dan terintegrasi.</p>
                </div>
            </div>

            @livewire('filter-mahasiswa')


        </div>
    </div>
</x-app-layout>
