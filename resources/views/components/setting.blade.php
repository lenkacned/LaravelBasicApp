@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-6 pb-2 border-b">
         {{ $heading }}
    </h1>
    <div class="flex">
        <aside class="w-48 flex-shrink-0" >
            <h4 class="font-semibold mb-4"> Links </h4>
            <ul>
                <li>
                    <a href="/admin/images" class="{{request()->is('admin/images') ? 'text-blue-500' : ''}}">All pictures</a>
                </li>
                <li>
                    <a href="/admin/images/upload" class="{{request()->is('admin/images/upload') ? 'text-blue-500' : ''}}">Upload Image</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>