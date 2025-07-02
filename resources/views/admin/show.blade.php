<x-layout>
    <div class="py-20 px-28">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Post Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="/about/{{$post->id}}">{{$post->title}}</a>
                        </th>
                        <td class="px-6 py-4">
                            {{$post->category->name}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="/admin/posts/{{$post->id}}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="/admin/posts/{{$post->id}}" method="POST">
                                @csrf
                                <button type="submit" class="">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="mt-16">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>