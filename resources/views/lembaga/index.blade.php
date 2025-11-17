@extends('layouts.app')

@section('title', __('Lembaga'))

@section('header')
    <h2 class="text-xl font-semibold text-gray-800">{{ __('Lembaga') }}</h2>
@endsection

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-auto">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="mb-4">{{ __('Lembaga') }}</h3>
                        <a href="{{ route('lembaga.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            + Tambah Lembaga
                        </a>
                    </div>
                    <table class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Nama Lembaga</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        @if($lembagas->isEmpty())
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-center py-6">Belum Ada Lembaga.</td>
                                </tr>
                            </tbody>
                        @endif
                        <tbody>
                            @foreach ($lembagas as $lembaga)
                                <tr class="text-center hover:bg-gray-50">
                                    <td class="px-4 py-2 border">{{ $lembaga->id }}</td>
                                    <td class="px-4 py-2 border">{{ $lembaga->nama_lembaga }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('lembaga.edit', $lembaga->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('lembaga.destroy', $lembaga->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline ms-4">Hapus</button>
                                        </form>    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection