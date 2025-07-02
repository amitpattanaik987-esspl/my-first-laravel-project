<x-layout>
    <section class="max-w-lg mx-auto mt-10 p-6 bg-gray-100 border border-gray-300 rounded">
        <h1 class="text-center font-bold text-xl mb-6">CREATE POST</h1>
        <form action="/admin/posts/create" class="flex flex-col" method="POST" enctype="multipart/form-data" x-data="{ category: '' }">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="excerpt" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.input name="slug" />
            <x-form.textarea name="body" />

            <label for="category_id" class="block my-2 font-bold text-gray-700">Category</label>
            <select name="category_id" class="category w-40 mb-2 p-1" id="category_id" x-model="category">
                {{
                    $categories = App\Models\category::all();
                }}
                <option value="">Select Category</option>
                @foreach($categories as $category){
                <option value="{{$category->id}}">{{$category->name}}</option>
                }
                @endforeach
                <option value="other">Others</option>
            </select>

            @error('category_id')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div x-show="category === 'other'">
                <label for="Other_Category" class="block mb-2 font-bold text-gray-700">Give your Category here</label>
                <input type="text" name="Other_Category" id="Other_Category" class="border border-gray-400 p-2 w-full rounded" value="{{old('Other_Category')}}" />
                @error("Other_Category")
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror

                <x-form.input name="category_slug" />
            </div>
            <div>
                <x-button class="w-32 mt-5 float-right">
                    POST
                </x-button>
            </div>
        </form>
    </section>
    @if(session()->has('error')){
    <div x-data="{show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show" x-transition
        class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{ session('error') }}</p>
    </div>
    }
    @endif
</x-layout>