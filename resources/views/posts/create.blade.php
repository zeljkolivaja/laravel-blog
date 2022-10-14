<x-layout>
    <section class="mx-auto max-w-md py-8">
        <h1 class="mb-4 text-lg font-bold">Publish New Post</h1>
        <x-panel>
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label class="mb-2 block text-xs font-bold uppercase text-gray-700" for="title">
                        Title
                    </label>

                    <input class="w-full border border-gray-400 p-2" type="text" name="title" id="title"
                        value="{{ old('title') }}" required>

                    @error('title')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="mb-2 block text-xs font-bold uppercase text-gray-700" for="slug">
                        Slug
                    </label>

                    <input class="w-full border border-gray-400 p-2" type="text" name="slug" id="slug"
                        value="{{ old('slug') }}" required>

                    @error('slug')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="mb-2 block text-xs font-bold uppercase text-gray-700" for="thumbnail">
                        Thumbnail
                    </label>

                    <input class="w-full border border-gray-400 p-2" type="file" name="thumbnail" id="thumbnail"
                        value="{{ old('thumbnail') }}" required>

                    @error('thumbnail')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="mb-2 block text-xs font-bold uppercase text-gray-700" for="excerpt">
                        Excerpt
                    </label>

                    <textarea class="w-full border border-gray-400 p-2" name="excerpt" id="excerpt" required>{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="mb-2 block text-xs font-bold uppercase text-gray-700" for="body">
                        Body
                    </label>

                    <textarea class="w-full border border-gray-400 p-2" name="body" id="body" required>{{ old('body') }}</textarea>

                    @error('body')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="mb-2 block text-xs font-bold uppercase text-gray-700" for="category_id">
                        Category
                    </label>

                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <x-submit-button>Publish</x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>
