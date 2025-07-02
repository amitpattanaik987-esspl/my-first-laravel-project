@props(['trigger','currentcategory'])

<div x-data="{ open: false }" @click.away="open=false" class="w-40">
    <div @click="open=!open">
        {{$trigger}}
    </div>

    <div x-show="open" class="flex-1 flex flex-col gap-2 appearance-none bg-transparent py-2 pl-3 pr-3 text-sm font-semibold absolute bg-gray-100 w-full {{ isset($currentcategory) ? 'top-11' : 'top-9' }} rounded-xl max-h-64 overflow-y-auto">
        {{$slot}}
    </div>
</div>