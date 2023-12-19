@extends('layouts.template')
@section('content')
    <h2 class="font-semibold text-2xl">Detil Klasifikasi Surat</h2>
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
                    <span class="ms-1 text-sm font-medium text-blue-600 md:ms-2 dark:text-gray-400">Detil Klasifikasi Surat</span>
                </div>
            </li>
        </ol>
    </nav>
    <br>
    <hr>
    <br>
    <h2 class="font-bold text-blue-600 text-3xl">{{ $data->letter_code }} | {{ $data->name_type}}</h2>
    <br>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">

        @foreach($letters as $letter)
            @php $counter = 1; @endphp
            <a href="{{ route('staff.surat.klasifikasi.viewpdf', $letter->id) }}"
               class="block col-span-1 md:col-span-1 max-w-full p-6 mr-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{$letter->letter_perihal}}</h5>
                <h5 class="mb-2 text-l font-semibold tracking-tight text-gray-900 dark:text-white">
                    {{ \Carbon\Carbon::parse($letter->created_at)->format('d F Y') }}
                </h5>
                @foreach($letter->recipient as $w)
                    <ol>
                        <li>
                            {{ $counter++ }}. {{ App\Models\User::find($w)->name }}
                        </li>
                    </ol>
                @endforeach
            </a>
        @endforeach
    </div>
@endsection
