<x-layout>
    <x-slot:title>Create Category</x-slot:title>

    <h2 class="text-xl font-semibold mb-4">Buat Kategori Baru</h2>

    @if($errors->any())
        <div class="text-red-500 bg-red-50 border border-red-200 rounded p-3 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-4 max-w-md">
        @csrf

        <div>
            <label class="block text-sm font-semibold mb-2">Nama Kategori</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded border px-3 py-2 text-black" />
        </div>

        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">Simpan</button>
            <a href="/categories" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</x-layout>
