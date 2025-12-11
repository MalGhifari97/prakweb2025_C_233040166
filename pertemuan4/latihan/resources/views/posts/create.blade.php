<x-layout>
    <x-slot:title>Create Post</x-slot:title>

    <h2 class="text-xl font-semibold mb-4">Buat Post Baru</h2>

    @if($errors->any())
        <div class="text-red-500 bg-red-50 border border-red-200 rounded p-3 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-2xl">
        @csrf

        <div>
            <label class="block text-sm font-semibold mb-2">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded border border-gray-300 px-3 py-2 text-black @error('title') border-red-500 @enderror" />
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Ringkasan</label>
            <textarea name="excerpt" rows="2" required class="w-full rounded border border-gray-300 px-3 py-2 text-black @error('excerpt') border-red-500 @enderror">{{ old('excerpt') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Isi Post</label>
            <textarea name="body" rows="6" required class="w-full rounded border border-gray-300 px-3 py-2 text-black @error('body') border-red-500 @enderror">{{ old('body') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Kategori</label>
            <select name="category_id" required class="w-full rounded border border-gray-300 px-3 py-2 text-black @error('category_id') border-red-500 @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Gambar</label>
            <input type="file" name="image" accept="image/*" class="w-full rounded border border-gray-300 px-3 py-2 text-black @error('image') border-red-500 @enderror" />
        </div>

        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">Simpan</button>
            <a href="/posts" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</x-layout>
