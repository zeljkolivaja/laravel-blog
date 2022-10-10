@auth
    <x-panel>

        <form action="/posts/{{ $post->slug }}/comments" method='POST'>
            @csrf
            <header class='flex items-center'>
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-full">
                <h2 class="ml-3">Participate</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                    placeholder="Leave your comment" required></textarea>
            </div>

            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

            <div class="mt-6 flex justify-end border-t border-gray-200 pt-6">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>

    </x-panel>
@else
    <p class="font-semibold">
        <span>
            To leave a comment please <a href="/login" class="hover:underline">login</a>
            or <a href="/register" class="hover:underline">register</a>
        </span>
    </p>
@endauth
