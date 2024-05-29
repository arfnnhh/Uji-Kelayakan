@extends('layouts.template')
@section('content')
    @php
        $counter = 1;
    @endphp

    <h2 class="font-semibold text-2xl">Data Surat</h2>
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse mt-1">
            <li class="inline-flex items-center">
                <p class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-400 dark:hover:text-white">
                    Dashboard
                </p>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <p class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Surat</p>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-blue-600 md:ms-2 dark:text-gray-400">Data Surat</span>
                </div>
            </li>
        </ol>
    </nav>
    <br>
    <hr>

    <div>
        <div class="h-full">
            @if (auth()->user()->role == 'staff')
            <a href="{{ route('staff.surat.tambah') }}" type="button" class="float-right mt-1 mb-1 h-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</a>
            @endif
            <div class="flex justify-items-start h-full">
                @if (auth()->user()->role == 'staff')
                    <a href="{{ route('staff.surat.exportSurat') }}" type="button" class="float-left mt-1 mb-1 h-full text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Export</a>
                @elseif (auth()->user()->role == 'teacher')
                    <a href="{{ route('teacher.surat.exportExcelTch') }}" type="button" class="float-left mt-1 mb-1 h-full text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Export</a>
                @endif
                    @if (auth()->user()->role == 'staff')
                        <form action="{{ route('staff.surat.data') }}" method="GET" class="mt-1 flex h-full">
                    @else
                                <form action="{{ route('teacher.surat.data') }}" method="GET" class="mt-1 flex h-full">
                    @endif
                    <input type="text" name="query" class="h-full float-left bg-gray-50 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="float-right ml-1 h-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </button>
                    @if (auth()->user()->role == 'staff')
                        <a href="{{ route('staff.surat.data') }}" type="button" class="float-right ml-1 h-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97"/>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('teacher.surat.data') }}" type="button" class="float-right ml-1 h-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97"/>
                            </svg>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>

    {{--    Table    --}}
    <div class="relative overflow-x-auto clear-both">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nomor Surat
                </th>
                <th scope="col" class="px-6 py-3">
                    Perihal
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Keluar
                </th>
                <th scope="col" class="px-6 py-3">
                    Penerima Surat
                </th>
                <th scope="col" class="px-6 py-3">
                    Notulis
                </th>
                @if(auth()->user()->role == 'teacher')
                    <th scope="col" class="px-6 py-3">
                        Hasil Rapat
                    </th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($data as $w)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $counter++ }}
                    </th>
                    <td class="px-6 py-4">
                        {{ App\Models\Letter_type::find($w->letter_type_id)->letter_code }}/{{ $w->id }}/SMK Wikrama/2023
                    </td>
                    <td class="px-6 py-4">
                        {{ $w->letter_perihal }}
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($w->created_at)->format('d F Y') }}
                    </td>
                    <td class="px-6 py-4">
                        @foreach($w->recipient as $m)
                            <ol>
                                <li>
                                    {{ App\Models\User::find($m)->name }}
                                </li>
                            </ol>
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        {{ App\Models\User::find($w->notulis)->name }}

                    @if(auth()->user()->role == 'teacher')
                        <td class="px-6 py-4">
                            @if (App\Models\Result::where('letter_id', $w->id)->exists())
                                <a href="{{ route('teacher.surat.hasil.viewHasil', $w->id) }}" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Lihat</a>
                            @elseif ($w->notulis == auth()->user()->id)
                                <a href="{{ route('teacher.surat.hasil.view',$w->id) }}" type="button" class="focus:outline-none text-white bg-yellow-200 hover:bg-yellow-300 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Buat</a>
                            @else
                                <p class="text-red-600">Belum Dibuat</p>
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex flex-col items-center mt-2">
        <div class="mx-4 text-gray-600">
            Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} results
        </div>
        {{ $data->links() }}
    </div>
@endsection
