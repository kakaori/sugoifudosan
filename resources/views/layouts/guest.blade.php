<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="https://cdn.tailwindcss.com"></script>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans text-gray-900 antialiased">
        <div class="bg-white">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <header class="flex items-center justify-between py-4 md:py-8">
                <!-- logo - start -->
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 text-2xl font-bold text-black md:text-3xl" aria-label="logo">
                    すごい不動産
                </a>
                <!-- logo - end -->
            
                <!-- nav - start -->
                <nav class="hidden gap-12 lg:flex">
                    <a href="{{ url('/search') }}" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">収益物件を探す</a>

                    @if (Route::has('partner.login'))
                        @auth('partner')
                            <a href="{{ url('/partner/dashboard') }}" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">不動産会社マイページ</a>
                        @else
                        <a href="{{ route('partner.login') }}" class="text-lg text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">不動産会社ログイン</a>
                        @endauth
                    @endif
                </nav>
                <!-- nav - end -->
            
                <!-- buttons - start -->
                @if (Route::has('login'))
                <div class="-ml-8 hidden flex-col gap-2.5 sm:flex-row sm:justify-center lg:flex lg:justify-start">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">マイページ</a>
                        @else

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-block rounded-lg px-4 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:text-indigo-500 focus-visible:ring active:text-indigo-600 md:text-base">新規登録</a>
                        @endif

                        <a href="{{ route('login') }}" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">ログイン</a>
                    @endauth
                </div>
                @endif
            
                <button type="button" class="inline-flex items-center gap-2 rounded-lg bg-gray-200 px-2.5 py-2 text-sm font-semibold text-gray-500 ring-indigo-300 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
            
                    Menu
                </button>
                <!-- buttons - end -->
                </header>
            </div>
        </div>

        <div class="py-48 px-4 flex flex-col sm:justify-center items-center bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        
    <footer class="bg-white border-t">
        <p class="text-center text-sm text-gray-400 my-6"> © 2024 - kadai. </p>
    </footer>
</body>
</html>
