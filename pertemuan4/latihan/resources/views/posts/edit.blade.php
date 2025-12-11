<x-layout>
    <x-slot:title>Edit Post</x-slot:title>

    <h2 class="text-xl font-semibold mb-4">Edit Post</h2>

    @if($errors->any())
        <div class="text-red-500 bg-red-50 border border-red-200 rounded p-3 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-2xl">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold mb-2">Judul</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" required class="w-full rounded border px-3 py-2 text-black" />
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Ringkasan</label>
            <textarea name="excerpt" rows="2" required class="w-full rounded border px-3 py-2 text-black">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Isi Post</label>
            <textarea name="body" rows="6" required class="w-full rounded border px-3 py-2 text-black">{{ old('body', $post->body) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Kategori</label>
            <select name="category_id" required class="w-full rounded border px-3 py-2 text-black">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Gambar</label>
            @if($post->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-32 h-32 object-cover rounded">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full rounded border px-3 py-2 text-black" />
        </div>

        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">Update</button>
            <a href="/posts" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</x-layout>
