@php $counter = 1 @endphp

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">
            No
        </th>
        <th scope="col" class="px-6 py-3">
            Nama
        </th>
        <th scope="col" class="px-6 py-3">
            Email
        </th>
        <th scope="col" class="px-6 py-3">
            Role
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
                {{ $w->name }}
            </td>
            <td class="px-6 py-4">
                {{ $w->email}}
            </td>
            <td class="px-6 py-4">
                {{ $w->role}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
