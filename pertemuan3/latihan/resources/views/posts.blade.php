<x-layout>
    <x-slot:title>Daftar Posts</x-slot:title>

    @if($posts->isEmpty())
        <div class="text-center py-16 text-[#ffffffcc]">Belum ada postingan — coba lagi nanti.</div>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <article class="bg-white dark:bg-[#0f0f0f] border border-[#e3e3e0] dark:border-[#222] rounded-lg overflow-hidden shadow-[0px_1px_2px_rgba(0,0,0,0.06)]">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold leading-snug">
                            <a href="/posts/{{ $post->slug }}" class="hover:underline text-white">{{ $post->title }}</a>
                        </h2>

                        <div class="mt-2 text-[13px] text-[#ffffffcc]">
                            By <a href="/?author={{ $post->author->username }}" class="text-[#f53003] hover:underline">{{ $post->author->name }}</a>
                            • <a href="/?category={{ $post->category->slug }}" class="text-[#f53003] hover:underline">{{ $post->category->name }}</a>
                        </div>

                        <p class="mt-3 text-sm text-[#ffffffcc]">{{ $post->excerpt }}</p>
                    </div>

                    <div class="px-4 py-3 border-t border-[#e3e3e0] dark:border-[#222] flex items-center justify-between">
                        <span class="text-xs text-[#ffffffcc]">{{ $post->created_at->format('d M Y') }}</span>
                        <a href="/posts/{{ $post->slug }}" class="text-sm text-[#f53003] hover:underline">Read more →</a>
                    </div>
                </article>
            @endforeach
        </div>
    @endif

</x-layout>