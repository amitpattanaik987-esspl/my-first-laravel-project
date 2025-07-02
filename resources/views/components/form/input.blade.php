@props(['name', 'type' => 'text', 'value' => ''])

<label for="{{ $name }}" class="block mb-2 font-bold text-gray-700">{{ ucwords($name) }}</label>
<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $name }}"
    class="border border-gray-400 p-2 w-full rounded"
    value="{{ old($name, $value) }}"
    {{ $attributes }} />

@error($name)
<p class="text-red-600 text-xs mt-1">{{ $message }}</p>
@enderror