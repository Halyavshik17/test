<div class="flex flex-wrap">
    @foreach ($tags as $tag)
        <label class="inline-flex items-center mt-3 mr-3">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" wire:model="selectedTags" value="{{ $tag->id }}">
            <span class="ml-2 text-gray-700">{{ $tag->title }}</span>
        </label>
    @endforeach
</div>