@extends('layouts.app')

@section('title', __('Siswa'))

@section('header')
    <h2 class="text-xl font-semibold text-gray-800">{{ __('Siswa') }}</h2>
@endsection

@section('content')
    @push('styles')
        <style>
            /* --- Input & Select --- */
            .dt-input, 
            .dt-search input,
            select.dt-input {
                background-color: white !important;
                color: #1f2937 !important; /* text-gray-800 */
                border: 1px solid #d1d5db !important; /* border-gray-300 */
                padding: 6px 10px !important;
                border-radius: 6px !important;
            }

            /* Hover input */
            .dt-input:hover,
            .dt-search input:hover {
                background-color: #f9fafb !important; /* gray-50 */
            }

            /* --- Pagination Button --- */
            .dt-paging button {
                background-color: white !important;
                color: #1f2937 !important;
                border: 1px solid #d1d5db !important;
                border-radius: 6px !important;
                padding: 6px 12px !important;
            }

            .dt-paging button:hover {
                background-color: #f3f4f6 !important; /* gray-100 */
            }

            /* Button aktif (halaman yang dipilih) */
            .dt-paging .dt-paging-button.current {
                background-color: #2563eb !important; /* biru */
                color: white !important;
                border-color: #2563eb !important;
            }

            /* --- Info text (Showing 0 to ...) --- */
            .dt-info {
                color: #374151 !important; /* text-gray-700 */
            }

            /* --- Header Table --- */
            table.dataTable thead th {
                background-color: #f3f4f6 !important; /* gray-100 */
                color: #374151 !important;
            }

            /* --- Dropdown Length ("Tampilkan X data") --- */
            .dt-length select {
                background-color: white !important;
                color: #1f2937 !important;
                border: 1px solid #d1d5db !important;
                border-radius: 6px !important;
                padding: 6px 10px !important;
            }

            /* Hover dropdown */
            .dt-length select:hover {
                background-color: #f9fafb !important;
            }

            /* --- Pagination Button --- */
            .dt-paging .dt-paging-button {
                background-color: white !important;
                color: #1f2937 !important;
                border: 1px solid #d1d5db !important;
                padding: 6px 12px !important;
                border-radius: 6px !important;
            }

            /* Pagination hover */
            .dt-paging .dt-paging-button:hover {
                background-color: #f3f4f6 !important;
            }

            /* Pagination aktif (current page) */
            .dt-paging .dt-paging-button.current {
                background-color: #2563eb !important;
                color: white !important;
                border-color: #2563eb !important;
            }

            /* Pagination disabled */
            .dt-paging .dt-paging-button.disabled {
                background-color: #e5e7eb !important;
                color: #9ca3af !important;
                border-color: #d1d5db !important;
            }

            /* Pagination container */
            .dataTables_wrapper .dt-paging .dt-paging-button {
                background-color: #ffffff !important;
                color: #1f2937 !important; /* gray-800 */
                border: 1px solid #d1d5db !important; /* gray-300 */
                border-radius: 6px !important;
                padding: 6px 14px !important;
                margin: 0 3px !important;
            }

            /* Hover */
            .dataTables_wrapper .dt-paging .dt-paging-button:hover:not(.disabled):not(.current) {
                background-color: #f3f4f6 !important; /* gray-100 */
            }

            /* Current (active page) */
            .dataTables_wrapper .dt-paging .dt-paging-button.current {
                background-color: #2563eb !important; /* blue-600 */
                color: white !important;
                border-color: #2563eb !important;
            }

            /* Disabled buttons */
            .dataTables_wrapper .dt-paging .dt-paging-button.disabled {
                background-color: #e5e7eb !important; /* gray-200 */
                color: #9ca3af !important; /* gray-400 */
                border-color: #d1d5db !important;
                cursor: not-allowed !important;
            }

        </style>
    @endpush
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-auto">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="mb-4">{{ __('Siswa') }}</h3>
                        <a href="{{ route('siswa.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            + Tambah Siswa
                        </a>
                    </div>
                    <table id="dataSiswa" class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Foto</th>
                                <th class="px-4 py-2 border">NIS</th>
                                <th class="px-4 py-2 border">Nama Siswa</th>
                                <th class="px-4 py-2 border">Lembaga</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($siswas as $siswa)
                                <tr class="text-center hover:bg-gray-50">
                                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>

                                    <td class="px-4 py-2 border">
                                        @if($siswa->foto)
                                            <img src="{{ asset('storage/' . $siswa->foto) }}"
                                                class="w-16 h-16 object-cover mx-auto rounded-full">
                                        @else
                                            <div class="w-16 h-16 bg-gray-200 flex items-center justify-center mx-auto rounded-full">
                                                <span class="text-gray-500">No Image</span>
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-4 py-2 border">{{ $siswa->nis }}</td>
                                    <td class="px-4 py-2 border">{{ $siswa->nama }}</td>
                                    <td class="px-4 py-2 border">{{ $siswa->lembaga->nama_lembaga ?? 'N/A' }}</td>

                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="text-blue-600 hover:underline">Edit</a>

                                        <form action="{{ route('siswa.destroy', $siswa->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:underline ms-4">Hapus</button>
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
    @push('scripts')
        <script>
            new DataTable('#dataSiswa', {
                responsive: true,
                pageLength: 10,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                }
            });
        </script>
    @endpush
@endsection