@extends('layouts.template')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
        <!-- First Column Card (2:3) -->
        <a href="{{ route('teacher.surat.data') }}" class="block col-span-1 md:col-span-1 max-w-full p-6 mr-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Surat Masuk</h5>
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5h1v12a2 2 0 0 1-2 2m0 0a2 2 0 0 1-2-2V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v15a2 2 0 0 0 2 2h14ZM10 4h2m-2 3h2m-8 3h8m-8 3h8m-8 3h8M4 4h3v3H4V4Z"/>
                </svg>
                <h1 class="text-l font-semibold flex items-center justify-center w-8 h-8 rounded-full bg-gray-300 text-black">{{ $suratCount }}</h1>
            </div>
        </a>
    </div>
@endsection
