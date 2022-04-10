<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            body > div > div > div.grid.grid-cols-1.md\:grid-cols-2 > div > nav > div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between > div:nth-child(1) > p{
                color:white;
                margin-right: 20px;
            }
        </style>
    </head>
    <body class="antialiased overflow-hidden">
        <nav class="flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-pink-900 shadow sm:items-baseline w-full text-white">
            <div class="mb-2 sm:mb-0">
              <a href="/" class="text-2xl">Mini Blog</a>
            </div>
            <div class="mr-4">
              @if (Route::has('login'))
                  @auth
                      <a href="{{ url('/dashboard') }}" class="text-sm">Dashboard</a>
                    <!-- Settings Dropdown -->
                    <div class="inline-block ml-5">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-white hover:text-gray-200 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                  @else
                      <a href="{{ route('login') }}" class="text-sm">Log in</a>
                      @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="ml-4 text-sm">Register</a>
                      @endif
                  @endauth
                @endif
            </div>
        </nav>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-900 sm:items-center py-4 sm:pt-0 ">   
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-2 bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    @foreach ($posts as $post)
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <h1><a href="" class="text-white">{{$post->title}}</a></h1>
                            <div class="mt-2 text-gray-400 text-sm">{{$post->body}}</div>
                        </div>
                    </div>
                    <hr class="border-gray-500">
                    @endforeach
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="py-6 text-white">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
      
    </body>
</html>
