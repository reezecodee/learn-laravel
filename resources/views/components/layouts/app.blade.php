<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.23/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-navigation.navbar/>
    <div class="px-16 mb-32">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold mb-7">Belajar Service Repository</h1>
            @if(session('success'))
                <x-alert.success :message="session('success')"/>
            @endif
        </div>
        {{ $slot }}
    </div>
</body>

</html>