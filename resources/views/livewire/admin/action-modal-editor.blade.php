<div>
{{-- Show modal edit  --}}
<x-jet-dialog-modal wire:model="showingModalEdit" maxWidth="4xl">
    <x-slot name="title">
        Редактирование поста
    </x-slot>

    <x-slot name="content">
        <div class="mt-2">
            {{-- <label class="block text-sm font-medium text-gray-700">Категория</label> --}}
            <select wire:model.defer="category_id" name="category_id"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option>Выберите категорию</option>
                {{-- @foreach ($categories as $category)
                    <option id="category_id" value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach --}}
            </select>
        </div>

        {{-- <div class="mt-2">
            <label for="tags" class="block text-sm font-medium text-gray-700">Теги</label>
            <input type="text" name="tags" id="tags"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                placeholder="Введите теги через запятую">
        </div> --}}

        <livewire:admin.action-tag-selector wire:model="selectedTags" />

        {{-- @livewire('admin.action-tag-selector') --}}

        <div class="col-span-6 sm:col-span-4 mt-4">
            {{-- <x-jet-label for="title" value="{{ __('Название поста') }}" /> --}}
            {{-- <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" --}}
                {{-- autocomplete="title" /> --}}
            {{-- <x-jet-input-error for="title" class="mt-2" /> --}}

            <textarea id="title" wire:model.defer="title" rows="1" placeholder="Заголовок" default="default" maxlength="120"
            class="editor_header"
            style="height: 47px; overflow-y: hidden;" data-processed="true" autocomplete="title"></textarea>

            @livewire('custom-editor', [
                'editorId' => 'editor_edit',
                'value' => '',
                'uploadDisk' => 'public',
                'downloadDisk' => 'public',
                'class' => '...',
                'style' => '...',
                'readOnly' => false,
                'placeholder' => 'Нажмите TAB для выбора инструмента',
            ])
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-button wire:click="update" wire:loading.attr="disabled">
            {{ __('Сохранить') }}
        </x-jet-button>

        <x-jet-secondary-button class="ml-2" wire:click="resetModal" wire:loading.attr="disabled">
            {{ __('Отмена') }}
        </x-jet-secondary-button>
        </span>
    </x-slot>
</x-jet-dialog-modal>
</div>