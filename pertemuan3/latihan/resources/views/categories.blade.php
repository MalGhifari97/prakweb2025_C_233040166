<x-layout>
    <x-slot:title>Categories</x-slot:title>

    <p class="mb-4 text-sm text-[#ffffffcc]">Pilih kategori untuk melihat postingan terkait.</p>

    @if($categories->isEmpty())
        <div class="py-10 text-center text-[#ffffffcc]">Belum ada kategori.</div>
    @else
        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($categories as $category)
                <a href="/categories/{{ $category->slug }}" class="block p-4 bg-white dark:bg-[#0f0f0f] border border-[#e3e3e0] dark:border-[#222] rounded-lg hover:shadow-md transition-shadow">
                    <div class="font-semibold text-white">{{ $category->name }}</div>
                    <div class="text-xs text-[#ffffffcc] mt-2">{{ $category->posts->count() }} posts</div>
                </a>
            @endforeach
        </div>
    @endif

</x-layout>