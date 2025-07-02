<x-layout>
    <section class="max-w-lg mx-auto mt-10 p-6 bg-gray-100 border border-gray-300 rounded">
        <h1 class="text-center font-bold text-xl mb-6">Edit POST</h1>
        <form action="/admin/posts/{{$posts->id}}" class="flex flex-col" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <x-form.input name="title" :value="$posts->title" />
            <x-form.input name="excerpt" :value="$posts->excerpt" />
            <div>
                <x-form.input name="thumbnail" type="file" />
                <img src="{{ $posts->thumbnail ? asset('storage/' . $posts->thumbnail) : asset('images/illustration-1.png') }}" alt="Blog Post illustration" class="rounded-xl w-1/3">
            </div>
            <x-form.input name="slug" :value="$posts->slug" />
            <x-form.textarea name="body">{{old('body',$posts->body)}}</x-form.textarea>

            <label for="category_id" class="block my-2 font-bold text-gray-700">Category</label>
            <select name="category_id" class="category w-40 mb-2 p-1" id="category_id">
                {{
                    $categories = App\Models\category::all();
                }}
                <option value="">Select Category</option>
                @foreach($categories as $category){
                <option value="{{ $category->id }}"
                    {{ (old('category_id', $posts->category_id) == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                }
                @endforeach
            </select>

            @error('category_id')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div>
                <x-button class="w-32 mt-5 float-right">
                    UPDATE
                </x-button>
            </div>
        </form>
    </section>
    <x-flash />
</x-layout>