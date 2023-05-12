{{-- <div class="flex flex-wrap">
    @foreach ($tags as $tag)
        <label class="inline-flex items-center mt-3 mr-3">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" wire:model="selectedTags" value="{{ $tag->id }}">
            <span class="ml-2 text-gray-700">{{ $tag->title }}</span>
        </label>
    @endforeach
</div> --}}

{{-- <select wire:model="selectedTags"
    multiple>
    <option disabled>Выберите теги</option>
    @foreach ($tags as $tag)
        <option id="{{ $tag->id }}">{{ $tag->title }}</option>
    @endforeach
</select> --}}
    <div>
        <div class="form-group w-50 mt-4" wire:ignore>
            <select class="select2" id="select2-dropdown" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                <option value="">Select Option</option>
                @foreach($tags as $tag)
                    @if($state)
                        <option {{ is_array( $post->tags->pluck('id')->toArray() ) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''  }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @else
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    {{-- @push('scripts') --}}
    <script>
        $(document).ready(function () {
            $('#select2-dropdown').select2();
            $('#select2-dropdown').on('change', function (e) {
                var data = $('#select2-dropdown').select2("val");
                @this.set('selectedTags', data);
            });
        });
    </script>
