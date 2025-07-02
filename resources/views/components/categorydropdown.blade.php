@if(isset($currentcategory))
<x-dropdown :currentcategory="$currentcategory">
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold">
            {{ isset($currentcategory) ? $currentcategory->name : 'category' }}
        </button>
    </x-slot>
    <x-dropdown-item :route="'/'">
        All
    </x-dropdown-item>
    @foreach($categories as $category)
    <x-dropdown-item class="{{ isset($currentcategory) && $currentcategory->id === $category->id ? 'bg-blue-500 text-white' : '' }}" :route="url()->current() . (request('search') ? '?search=' . request('search') . '&category=' . $category->slug : '?category=' . $category->slug)">
        {{$category->name}}
    </x-dropdown-item>
    @endforeach
</x-dropdown>
@else
<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold">
            {{ isset($currentcategory) ? $currentcategory->name : 'category' }}
        </button>
    </x-slot>
    <x-dropdown-item :route="'/'">
        All
    </x-dropdown-item>
    @foreach($categories as $category)
    <x-dropdown-item class="{{ isset($currentcategory) && $currentcategory->id === $category->id ? 'bg-blue-500 text-white' : '' }}" :route="url()->current() . (request('search') ? '?search=' . request('search') . '&category=' . $category->slug : '?category=' . $category->slug)">
        {{$category->name}}
    </x-dropdown-item>
    @endforeach
</x-dropdown>
@endif