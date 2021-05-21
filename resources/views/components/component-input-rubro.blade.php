<div class="mr-2 mb-3">
<div>
  <label for="{{$name}}" class="block text-sm font-medium text-gray-700">{{$label}}</label>
  <div class="mt-1 relative rounded-md shadow-sm">


    <input wire:model="{{$name}} "id="{{$name}}" type="{{$type}}"  class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="{{$placeholder}}">
  </div>
</div>
</div>
