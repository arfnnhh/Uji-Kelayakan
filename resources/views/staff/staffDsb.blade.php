@extends('layouts.template')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
        <!-- First Column Card (2:3) -->
        <a href="#" class="block col-span-2 md:col-span-2 max-w-full p-6 mr-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Surat Keluar</h5>
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5h1v12a2 2 0 0 1-2 2m0 0a2 2 0 0 1-2-2V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v15a2 2 0 0 0 2 2h14ZM10 4h2m-2 3h2m-8 3h8m-8 3h8m-8 3h8M4 4h3v3H4V4Z"/>
                </svg>
                <h1 class="text-l font-semibold flex items-center justify-center w-8 h-8 rounded-full bg-gray-300 text-black">{{ $letterCount }}</h1>
            </div>
        </a>

        <!-- Second Column Card (1:3) -->
        <a href="{{ route('staff.surat.klasifikasi.data') }}" class="block col-span-1 md:col-span-1 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Klasifikasi Surat</h5>
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5h1v12a2 2 0 0 1-2 2m0 0a2 2 0 0 1-2-2V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v15a2 2 0 0 0 2 2h14ZM10 4h2m-2 3h2m-8 3h8m-8 3h8m-8 3h8M4 4h3v3H4V4Z"/>
                </svg>
                <h1 class="text-l font-semibold flex items-center justify-center w-8 h-8 rounded-full bg-gray-300 text-black">{{ $letterTypeCount }}</h1>
            </div>
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 mt-3.5 gap-2">
        <!-- First Column Card (2:3) -->
        <a href="#" class="block col-span-1 md:col-span-1 max-w-full p-6 mr-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Staff Tata Usaha</h5>
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                </svg>
                <h1 class="text-l font-semibold flex items-center justify-center w-8 h-8 rounded-full bg-gray-300 text-black">{{ $staffCount }}</h1>
            </div>
        </a>

        <!-- Second Column Card (1:3) -->
        <a href="#" class="block col-span-2 md:col-span-2 max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Guru</h5>
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                </svg>
                <h1 class="text-l font-semibold flex items-center justify-center w-8 h-8 rounded-full bg-gray-300 text-black">{{ $teacherCount }}</h1>
            </div>
        </a>
    </div>
@endsection
