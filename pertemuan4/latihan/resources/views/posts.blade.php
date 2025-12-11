<x-layout>
    <x-slot:title>Daftar Posts</x-slot:title>

    @auth
        <div class="mb-4">
            <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">+ Buat Post Baru</a>
        </div>
    @endauth

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($posts->isEmpty())
        <div class="text-center py-16">Belum ada postingan — coba lagi nanti.</div>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <article class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @endif

                    <div class="p-4">
                        <h2 class="text-lg font-semibold leading-snug">
                            <a href="{{ route('posts.show', $post) }}" class="hover:underline text-gray-900">{{ $post->title }}</a>
                        </h2>

                        <div class="mt-2 text-xs text-gray-600">
                            Oleh: <strong>{{ $post->author->name }}</strong><br>
                            Kategori: <strong>{{ $post->category->name }}</strong>
                        </div>

                        <p class="mt-3 text-sm text-gray-700">{{ $post->excerpt }}</p>
                    </div>

                    <div class="px-4 py-3 border-t border-gray-200 flex items-center justify-between">
                        <span class="text-xs text-gray-500">{{ $post->created_at->format('d M Y') }}</span>
                        <div class="flex gap-2">
                            <a href="{{ route('posts.show', $post) }}" class="text-sm text-purple-600 hover:underline">Lihat</a>
                            @if(auth()->check() && (auth()->id() === $post->user_id || auth()->user()->is_admin))
                                <a href="{{ route('posts.edit', $post) }}" class="text-sm text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:underline">Hapus</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif

</x-layout>