<x-layout>
    <x-setting heading="Upload New Image">
        <form method="POST" action="/admin/images/" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="image" type="file" required />

            <x-form.button>Upload</x-form.button>
        </form>
    </x-setting>
</x-layout>