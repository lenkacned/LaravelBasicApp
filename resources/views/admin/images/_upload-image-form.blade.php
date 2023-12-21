@admin
    <form method="POST" action="/admin/images" enctype="multipart/form-data">
        @csrf
        <x-form.input name="title" type="string" required />
        <x-form.input name="slug" type="string" required />
        <x-form.input name="image" type="file" required />
        <x-form.button>Upload</x-form.button>
    </form>
@endadmin