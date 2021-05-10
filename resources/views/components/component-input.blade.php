<div class="mr-2 mb-3">
    <div>
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
        <input id="{{ $name }}" wire:model="{{ $name }}" type="{{ $type }}"
            placeholder="{{ $placeholder }}"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    @if ($errors->has($name))
        <small class="text-red-600">{{ $errors->first($name) }}</small>
    @endif


</div>
