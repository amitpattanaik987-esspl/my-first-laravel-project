<x-layout>
    @include("posts._header")

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
        <x-post-grid :posts="$posts" />

        {{$posts->links()}}
        @else
        <p class="test-center">NO POSTS TO BE SHOWN</p>

        @endif
    </main>
</x-layout>

<!-- @foreach ($posts as $post)
    <a href="about/{{$post->id}}"> {{ $post->title}}</a>
        <br>
        <p>
            By <a href="author/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/about/category/{{ $post->category->id }}">{{$post->category->name}}</a>
        </p>
        <div class=" text-body">
            {!!$post->body!!}
        </div>
        <hr>
        @endforeach -->
