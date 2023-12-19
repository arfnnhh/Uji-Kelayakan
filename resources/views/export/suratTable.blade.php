@php
    $counter = 1
@endphp
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
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
