@php
    $counter = 1;
@endphp
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">
            No
        </th>
        <th scope="col" class="px-6 py-3">
            Kode Surat
        </th>
        <th scope="col" class="px-6 py-3">
            Klasifikasi Surat
        </th>
        <th scope="col" class="px-6 py-3">
            Surat Tertaut
        </th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $w)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $counter++ }}
            </th>
            <td class="px-6 py-4">
                {{ $w->letter_code }}
            </td>
            <td class="px-6 py-4">
                {{ $w->name_type }}
            </td>
            <td class="px-6 py-4">
                {{ \App\Models\Letter::where('letter_type_id', $w->id)->count() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
