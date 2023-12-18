<!doctype html>

<title>Laravel From Scratch Basics</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    html{
        scroll-behavior: smooth;
    }
</style>


<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/lotos.jpg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center ">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">Welcome, {{auth()->user()->name }}!</button>
                        </x-slot>
                        
                        @admin
                        <x-dropdown-item href="/admin/images" :active="request()->is('admin/images')">Dashboard</x-dropdown-item>
                        @endadmin
                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Logout</x-dropdown-item>
                        
                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                @else
                <a href="/register" class="ml-6 text-xs font-bold uppercase">Register!</a>
                <a href="/login" class="ml-6 text-xs font-bold uppercase">Log in</a>
                @endauth
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <p class="text-sm mt-3">Promise to keep the code clean. No bugs.</p>
        </footer>
    </section>
    <x-flash/>
</body>
