<x-layout>
    <x-slot:title>Categories</x-slot:title>

    @auth
        <div class="mb-4">
            <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">+ Buat Kategori Baru</a>
        </div>
    @endauth

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <p class="mb-4 text-sm text-gray-600">Pilih kategori untuk melihat postingan terkait.</p>

    @if($categories->isEmpty())
        <div class="py-10 text-center text-gray-500">Belum ada kategori.</div>
    @else
        <div class="space-y-3">
            @foreach($categories as $category)
                <div class="p-4 bg-white border border-gray-200 rounded-lg flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <div class="font-semibold text-gray-900">{{ $category->name }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ $category->posts->count() }} posts</div>
                    </div>
                    <div class="flex gap-2">
                        @auth
                            <a href="{{ route('categories.edit', $category) }}" class="text-sm text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 hover:underline">Hapus</button>
                            </form>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</x-layout>