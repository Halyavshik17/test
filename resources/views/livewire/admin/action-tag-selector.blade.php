<div class="form-group w-50 mt-4" wire:ignore>
    <select class="select2" id="select2-dropdown" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
        <option value="">Select Option</option>
        @foreach ($tags as $tag)
            @if ($state)
                <option
                    {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                    value="{{ $tag->id }}">{{ $tag->title }}</option>
            @else
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endif
        @endforeach
    </select>
</div>
{{-- @push('scripts') --}}
<script>
    $(document).ready(function() {
        $('#select2-dropdown').select2();
        $('#select2-dropdown').on('change', function(e) {
            var data = $('#select2-dropdown').select2("val");
            @this.set('selectedTags', data);
        });
    });
</script>
