@admin
    <form method="POST" action="/admin/images/{{ $image->id }}">
    @csrf
    @method('DELETE')
        <button class=" mt-3 transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-red-400 rounded-full py-2 px-8">
        Delete</button>
    </form>
@endadmin