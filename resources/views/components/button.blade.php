<button
    {{$attributes->merge(['class'=>"bg-blue-600 text-white uppercase font-semibold text-xs py-2 px-6 rounded hover:bg-blue-700"])}}
    type="submit">
    {{$slot}}
</button>