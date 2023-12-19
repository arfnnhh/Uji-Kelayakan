@extends('layouts.template');
@section('content')
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
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <p class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white">Data Surat</p>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-blue-600 md:ms-2 dark:text-gray-400">Hasil</span>
                </div>
            </li>
        </ol>
    </nav>
    <br>
    <hr>

    <div>
        <div class="container">
            <div class="header-container">
                <div class="header-title">
                    <img src="{{ public_path('logo-wk.png') }}" alt="">
                    <div class="title-container">
                        <h2 class="title"><strong>SMK WIKRAMA BOGOR</strong></h2>
                        <ul class="deret">
                            <li class="sub-title"><h3>Bisnis dan Manajemen</h3></li>
                            <li class="sub-title"><h3>Teknologi Informasi dan Komunikasi</h3></li>
                            <li class="sub-title"><h3>Pariwisata</h3></li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="header-sub-title">
                    <ul>
                        <li><p>Jl. Ray Wangun kel. Sindangsari Bogor</p></li>
                        <li><p>Telp/Faks: (0251) 8242411</p></li>
                        <li><p>e-mail: prohumasi@smkwikrama.sch.id</p></li>
                        <li><p>website: www.smkwikrama.sch.id</p></li>
                    </ul>
                </div>
            </div>
            <br>
            <hr>
            <br>
            <div class="content-container">
                <div class="heading-container">
                    <ul class="first-heading">
                        <li><p>Kepada</p></li>
                        <li><p>Yth. Bapa/Ibu Terlampir</p></li>
                        <li><p>Di tempat</p></li>
                    </ul>
                    <ul class="second-heading">
                        <li><p>No: {{ App\Models\Letter_type::find($dataS->letter_type_id)->letter_code }}/{{ $dataS->id }}/SMK Wikrama/2023</p></li>
                        <li><p>Hal: <strong>{{ $dataS->letter_perihal }}</strong> </p></li>
                        <li><p>Tanggal: {{ \Carbon\Carbon::parse($dataS->created_at)->format('d F Y') }}</p></li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <br>
                {!!  $dataS->content !!}
                <br>
                <ol>
                    @foreach($dataS->recipient as $w)
                        <li>{{ App\Models\User::find($w)->name }}</li>
                    @endforeach
                </ol>
            </div>

            <div class="footer">
                <p>Hormat kami,</p>
                <p>Kepala SMK Wikrama Bogor</p>
                <p>(........................)</p>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <form>
        @csrf
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Peserta <b>(Checklist jika "ya")</b>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataR->presence_recipients as $w)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ App\Models\User::find(intval($w))->name }}
                        </th>
                        <td class="px-6 py-4">
                            <input disabled
                                type="checkbox"
                                name="presence_recipients[]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                placeholder=""
                                {{ in_array($w, $dataR->presence_recipients) ? 'checked' : '' }}
                            >
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <br>
        <div class="mb-5">
            <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ringkasan</label>
            <textarea disabled id="notes" name="notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ $dataR->notes }}</textarea>
        </div>
    </form>
@endsection
