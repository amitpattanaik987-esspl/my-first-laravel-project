@props(['name'])


<label for="{{$name}}" class="block mt-2 font-bold text-gray-700">{{ucwords($name)}}</label>
<textarea
    name="{{$name}}"
    class="w-full mt-2 text-sm ring-1 ring-gray-300 focus:ring-blue-500 rounded-md p-1 mb-2"
    placeholder="Think of something to say..."
    rows="5" required>{{$slot ?? old('$name')}}</textarea>
@error($name)
<p class="text-red-600 text-xs mt-1">{{ $message }}</p>
@enderror