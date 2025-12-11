<x-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <div class="max-w-2xl">
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-96 object-cover rounded mb-4">
        @endif

        <h2 class="text-3xl font-bold mb-2">{{ $post->title }}</h2>
        
        <div class="text-sm text-gray-600 mb-4 flex gap-4">
            <span>Oleh: <strong>{{ $post->author->name }}</strong></span>
            <span>Kategori: <strong>{{ $post->category->name }}</strong></span>
            <span>Tanggal: <strong>{{ $post->created_at->format('d M Y') }}</strong></span>
        </div>

        <hr class="mb-4">

        <p class="text-gray-700 mb-6">{{ $post->body }}</p>

        @if(auth()->check() && (auth()->id() === $post->user_id || auth()->user()->is_admin))
            <div class="flex gap-2">
                <a href="{{ route('posts.edit', $post) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                </form>
            </div>
        @endif

        <a href="/posts" class="mt-4 inline-block text-purple-600 hover:underline">&larr; Kembali ke Posts</a>
    </div>
</x-layout>
