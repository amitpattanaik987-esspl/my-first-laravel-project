@props(['comment'])

<article class="flex bg-gray-100 p-6 rounded-xl border border-gray-200">
    <img
        src="https://i.pravatar.cc/60?id={{$comment->id}}"
        alt="User avatar"
        class="rounded-full flex-shrink-0 w-15 h-15" />
    <div class="ml-4">
        <h3 class="font-bold mb-1">{{$comment->author->name}}</h3>
        <time class="text-xs text-gray-600">Posted {{$comment->created_at->diffForHumans()}}</time>
        <p class="mt-2">{{$comment->body}}</p>
    </div>
</article>