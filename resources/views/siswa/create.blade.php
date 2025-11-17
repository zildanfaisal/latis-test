@extends('layouts.app')

@section('title', __('Siswa'))

@section('header')
    <h2 class="text-xl font-semibold text-gray-800">{{ __('Siswa') }}</h2>
@endsection

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="mb-4">{{ __('Tambah Siswa') }}</h3>
                    <form method="POST" action="{{ route('siswa.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="foto" class="block text-sm font-medium text-gray-700">{{ __('Foto Siswa') }}</label>
                            <input type="file" name="foto" id="foto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm" accept="image/*">
                        </div>
                        <div class="mb-4">
                            <label for="nis" class="block text-sm font-medium text-gray-700">{{ __('NIS') }}</label>
                            <input type="number" name="nis" id="nis" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">{{ __('Nama Siswa') }}</label>
                            <input type="text" name="nama" id="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="lembaga_id" class="block text-sm font-medium text-gray-700">{{ __('Lembaga') }}</label>
                            <select name="lembaga_id" id="lembaga_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                                <option value="">{{ __('Pilih Lembaga') }}</option>
                                @foreach($lembagas as $lembaga)
                                    <option value="{{ $lembaga->id }}">{{ $lembaga->nama_lembaga }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">{{ __('Simpan') }}</button>
                            <a href="{{ route('siswa.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">{{ __('Batal') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection