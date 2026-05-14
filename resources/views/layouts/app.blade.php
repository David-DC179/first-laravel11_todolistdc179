<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laravel 11 Task List App</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine JS -->
    <script src="//unpkg.com/alpinejs" defer></script>

    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">

    <h1 class="mb-4 text-2xl font-bold">
        @yield('title')
    </h1>

    <!-- Flash Message -->
    <div x-data="{ flash: true }">
         {{--  x-init="setTimeout(() => flash = false, 3000)"> --}}

        @if (session()->has('success'))

            <div x-show="flash"
                 x-transition
                 class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700"
                 role="alert">

                <strong class="font-bold">
                    Success!
                </strong>

                <div>
                    {{ session('success') }}
                </div>

                <!-- Close Button -->
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         class="w-6 h-6 cursor-pointer"
                         @click="flash = false">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </span>

            </div>

        @endif

        <!-- Page Content -->
        @yield('content')

    </div>

</body>

</html>
