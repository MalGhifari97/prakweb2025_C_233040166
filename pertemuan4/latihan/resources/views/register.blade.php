<x-layout>
    <x-slot:title>Register</x-slot:title>

    <h2 class="text-xl font-semibold">Register</h2>

    @if($errors->any())
        <div class="text-red-500 mt-2">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="mt-4 space-y-4 max-w-md">
        @csrf
        <div>
            <label class="block text-sm">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded border px-3 py-2 text-black" />
        </div>
        <div>
            <label class="block text-sm">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" required class="w-full rounded border px-3 py-2 text-black" />
        </div>
        <div>
            <label class="block text-sm">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded border px-3 py-2 text-black" />
        </div>
        <div>
            <label class="block text-sm">Password</label>
            <input type="password" name="password" required class="w-full rounded border px-3 py-2 text-black" />
        </div>
        <div>
            <label class="block text-sm">Confirm Password</label>
            <input type="password" name="password_confirmation" required class="w-full rounded border px-3 py-2 text-black" />
        </div>
        <div>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Register</button>
            <a href="/admin" class="ml-4 text-sm">Admin register / login</a>
        </div>
    </form>
</x-layout>