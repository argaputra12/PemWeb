<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Style  -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/0b736e1e36.js" crossorigin="anonymous"></script>
</head>

<body class="antialiased">
  <!-- Navbar -->
  @include('components.navbar')

  <div class="relative max-w-3xl flex flex-col items-center justify-center mx-auto">
    <div class="rounded-lg border border-black w-full my-8 h-20 p-4 flex items-center font-semibold text-xl">
        Welcome Page
    </div>

  </div>
</body>

</html>
