<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ITI Blog</title>
</head>
<body class="bg-gray-100">

    <nav class="bg-slate-800 text-white p-4">
        <div class="container mx-auto flex gap-6 items-center">
            <span class="font-bold text-lg">ITI Blog</span>
            <a href="{{ route('posts.index') }}" class="hover:text-gray-300">Home</a>
           
            <span class="ml-auto text-sm text-gray-400">{{ $navTitle }}</span>
        </div>
    </nav>


   {{$slot}}


    </body>
</html>