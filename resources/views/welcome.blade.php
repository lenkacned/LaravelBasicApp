<x-layout>
    @include('_header')
    
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div>
            WELCOME FOR THE FIRST TIME!
        </div>

        @admin
            <form method="POST" action="/admin/images/" enctype="multipart/form-data">
                @csrf
                <x-form.input name="image" type="file" required />
                <x-form.button>Upload</x-form.button>
            </form>
        @endadmin
    </main>
</x-layout>