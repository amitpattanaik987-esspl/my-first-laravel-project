<x-layout>
    <!doctype html>

    <title>Laravel From Scratch Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <body style="font-family: Open Sans, sans-serif">
        <section class="px-6 py-8">
            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                    <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                        <img src="{{ $posts->thumbnail ? asset('storage/' . $posts->thumbnail) : asset('images/illustration-1.png') }}" alt="Blog Post illustration" class="rounded-xl">

                        <p class="mt-4 block text-gray-400 text-xs">
                            Published <time>{{$posts->created_at->diffForHumans()}}</time>
                        </p>

                        <div class="flex items-center lg:justify-center text-sm mt-4">
                            <img src="{{asset('images/lary-avatar.svg')}}" alt="Lary avatar">
                            <a href="/author/{{$posts->author->username}}">
                                <div class="ml-3 text-left">
                                    <h5 class="font-bold">{{$posts->author->name}}</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class=" col-span-8">
                        <div class="hidden lg:flex justify-between mb-6">
                            <a href="/"
                                class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                        </path>
                                        <path class="fill-current"
                                            d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                        </path>
                                    </g>
                                </svg>

                                Back to Posts
                            </a>

                            <div class="space-x-2">
                                <x-category-button :category="$posts->category" />
                            </div>
                        </div>

                        <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                            {{$posts->title}}
                        </h1>

                        <div class=" space-y-4 lg:text-lg leading-loose">
                            <p>{{$posts->excerpt}}</p>

                            <h2 class="font-bold text-lg">Body</h2>
                            <p>{{$posts->body}}</p>
                        </div>
                    </div>
                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @auth
                        <form method="POST" action="/about/{{$posts->id}}/comment" class="border border-gray-200 p-6 rounded-xl">
                            @csrf
                            <div class="border border-gray-200 p-6 rounded-xl flex items-center flex-col">
                                <div class="flex items-center justify-center w-full">
                                    <img src="https://i.pravatar.cc/40?id={{auth()->id()}}" alt="User avatar" class="rounded-full w-12 h-12" />
                                    <h2 class="ml-3">Want to participate?</h2>
                                </div>
                                <textarea
                                    name="body"
                                    class="w-full mt-4 text-sm ring-1 ring-gray-300 focus:ring-blue-500 rounded-md"
                                    placeholder="Think of something to say..."
                                    rows="5" required></textarea>
                                @error('body')
                                <p class="text-xs text-red-500 mt-3">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex justify-end mt-4 border-t border-gray-200 pt-4">
                                <x-button>post</x-button>
                            </div>
                        </form>
                        @else
                        <p class="text-sm text-gray-500">
                            <a href="/login" class="text-blue-500 hover:underline">Log in</a> to leave a comment.
                        </p>
                        @endauth

                        @foreach($posts->comments as $comment)
                        <x-post-comment :comment="$comment" />
                        @endforeach
                    </section>
                </article>
            </main>
        </section>
    </body>
</x-layout>