@props(['images'])        
 
    <div class="lg:grid lg:grid-cols-4">
        @foreach ($images as $image)
            <x-image-card 
            :image="$image" 
            />
        @endforeach
    </div>
