@props(['route'])

<a href="{{$route}}" {{$attributes->merge(['class'=>'block text-left px-2 hover:bg-blue-500 hover:text-white'])}}>
    {{$slot}}
</a>