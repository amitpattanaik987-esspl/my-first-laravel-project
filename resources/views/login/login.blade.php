<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 p-6 bg-gray-100 border border-gray-300 rounded">
            <h1 class="text-center font-bold text-xl mb-6">Register</h1>

            <form action="/login" method="post">
                @csrf
                <label for="email" class="block mb-2 font-bold text-gray-700 mt-4">Email</label>
                <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full rounded" value="{{old('email')}}" />
                @error('email')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="password" class="block mb-2 font-bold text-gray-700 mt-4">Password</label>
                <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full rounded" />
                @error('password')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror

                <button type="submit" class="mt-6 bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">Register</button>
            </form>
        </main>
    </section>
</x-layout>