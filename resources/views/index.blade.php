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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        input[type="radio"] + label span {
            transition: background .2s,
            transform .2s;
        }

        input[type="radio"] + label span:hover,
        input[type="radio"] + label:hover span {
            transform: scale(1.2);
        }

        input[type="radio"]:checked + label span {
            background-color: #3490DC;
        / / bg-blue box-shadow: 0 px 0 px 0 px 2 px white inset;
        }

        input[type="radio"]:checked + label {
            color: #3490DC;
        / / text-blue
        }
    </style>
</head>
<body class="antialiased">
<div class="bg-slate-100 min-h-screen flex items-center">
    <div class="bg-white p-10 rounded-lg shadow-xl md:w-3/4 mx-auto lg:w-[450px]">
        <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Spreadsheet file translate</h2>
        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="source" class="block mb-2 font-bold text-gray-600">Source</label>
                <input type="text" id="source" name="source" placeholder="Leave blank if wanna auto detect language" class="border border-gray-300 shadow p-3 w-full rounded mb-">
            </div>

            <div class="mb-5">
                <label for="target" class="block mb-2 font-bold text-gray-600">Target</label>
                <div class="flex">
                    <div class="flex items-center mr-10 mb-4">
                        <input id="target1" type="radio" name="target" class="hidden" value="vi" checked/>
                        <label for="target1" class="flex items-center cursor-pointer">
                            <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"> </span>
                            VI
                        </label>
                    </div>
                    <div class="flex items-center mr-4 mb-4">
                        <input id="target2" type="radio" name="target" class="hidden" value="en"/>
                        <label for="target2" class="flex items-center cursor-pointer">
                            <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                            EN
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <input type="file" name="file">
            </div>

            <div class="flex justify-center">
                <button class="block w-[150px] bg-blue-500 hover:bg-blue-600 transition text-white font-bold p-4 rounded-lg">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
