<x-layout>
    @include('images._header')
    
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div>
            WELCOME FOR THE FIRST TIME!
        </div>

       @include ('admin.images._upload-image-form')

        <!-- We have a Images collection --> 
        @if ($images->count())       
           <x-images-grid :images="$images"/>
           {{$images->links()}}
        @else
            <p class="text-center">No images yes. Please check back later.</p>
        @endif   
    </main>
</x-layout>