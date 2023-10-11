<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/owner.js'])
    </head>
    <body>
        <div class="min-h-screen">
            <div class="">
                {{-- Page Heading --}}
                <header class="flex justify-between">
                    @include('layouts.owner.navigation')
                </header>

                <div class="flex">
                    <div class="" id="container" >
                        {{-- パンくず --}}
                        @if (View::hasSection('breadcrumb'))
                            <div class="breadcrumb" >
                                @yield('breadcrumb')
                            </div>
                        @endif

                        {{-- 画面名 --}}
                        <div class="page-title" >
                            @yield('pageTitle')
                        </div>

                        {{-- フラッシュメッセージ --}}
                        <div class="flashArea" >
                            @include('layouts.admin.flash-message')
                        </div>

                        {{-- ページコンテンツ --}}
                        <main>
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
