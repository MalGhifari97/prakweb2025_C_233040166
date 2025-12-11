<x-layout>
    <x-slot:title>Login</x-slot:title>

    <h2 class="text-xl font-semibold">Login</h2>

    @if($errors->any())
        <div class="text-red-500 mt-2">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="mt-4 space-y-4 max-w-md">
        @csrf
        <div>
            <label class="block text-sm">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded border px-3 py-2 text-black" />
        </div>
        <div>
            <label class="block text-sm">Password</label>
            <input type="password" name="password" required class="w-full rounded border px-3 py-2 text-black" />
        </div>
        <div>
            <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded">Login</button>
            <a href="/register" class="ml-4 text-sm">Register here</a>
        </div>
    </form>
</x-layout>
