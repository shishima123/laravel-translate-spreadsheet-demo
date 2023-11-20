<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Spreadsheet file translate</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased">
<div class="bg-sky-200 min-h-screen flex items-center">
    <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/3">
        <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Spreadsheet file translate</h2>
        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="source" class="block mb-2 font-bold text-gray-600">Source</label>
                <input type="text" id="source" name="source" placeholder="Leave blank if wanna use auto detective" class="border border-gray-300 shadow p-3 w-full rounded mb-">
            </div>

            <div class="mb-5">
                <label for="target" class="block mb-2 font-bold text-gray-600">Target</label>
                <input type="text" id="target" name="target" value="vi" class="border shadow p-3 w-full rounded mb-">
            </div>

            <div class="mb-5">
                <input type="file" name="file">
            </div>

            <button class="block w-full bg-blue-500 hover:bg-blue-600 transition text-white font-bold p-4 rounded-lg">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
