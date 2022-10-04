<x-layout>

    <section class="px-6 py-8">
        <main class="mx-auto max-w-lg">

            <form method="POST" action="/register" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label class="mb-2 block text-xs font-bold uppercase text-gray-700" for="name">
                        Name
                    </label>

                    <input class="w-full border border-gray-400 p-2" type="text" name="name" id="name"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="mb-2 block text-xs font-bold uppercase text-gray-700" for="username">
                        Username
                    </label>

                    <input class="w-full border border-gray-400 p-2" type="text" name="username" id="username"
                        value="{{ old('username') }}" required>
                    @error('username')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>



                <div class="mb-6">
                    <label class="mb-2 block text-xs font-bold uppercase text-gray-700" for="email">
                        Email
                    </label>

                    <input class="w-full border border-gray-400 p-2" type="email" name="email" id="email"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>



                <div class="mb-6">
                    <label class="mb-2 block text-xs font-bold uppercase text-gray-700" for="password">
                        Password
                    </label>

                    <input class="w-full border border-gray-400 p-2" type="password" name="password" id="password"
                        required>
                    @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror

                </div>


                <div class="mb-6">
                    <button type="submit" class="rounded bg-blue-400 py-2 px-4 text-white hover:bg-blue-500">
                        Submit
                    </button>
                </div>
            </form>

        </main>
    </section>

</x-layout>
