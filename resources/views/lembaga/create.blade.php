@extends('layouts.app')

@section('title', __('Lembaga'))

@section('header')
    <h2 class="text-xl font-semibold text-gray-800">{{ __('Lembaga') }}</h2>
@endsection

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="mb-4">{{ __('Tambah Lembaga') }}</h3>
                    <form method="POST" action="{{ route('lembaga.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_lembaga" class="block text-sm font-medium text-gray-700">{{ __('Nama Lembaga') }}</label>
                            <input type="text" name="nama_lembaga" id="nama_lembaga" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm" required>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">{{ __('Simpan') }}</button>
                            <a href="{{ route('lembaga.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">{{ __('Batal') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection