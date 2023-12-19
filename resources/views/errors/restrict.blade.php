<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Not found</title>
    @vite(['resources/css/app.css','resources/js/app.js'])</head>
<body class="bg-light">
<div class="d-flex justify-content-center flex-column" style="margin-top: 15%">
    <h1 class="text-center text-8xl">404</h1>
    <h5 class="text-center">Not Found</h5>
    <div class="flex justify-center">
        @if (Auth::user()->role == 'staff')
            <a href="{{ route('staff.stfHome') }}" class="mt-10 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Back</a>
        @else
            <a href="{{ route('teacher.tchHome') }}" class="mt-10 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Back</a>
        @endif
    </div>
</div>
</body>
</html>
