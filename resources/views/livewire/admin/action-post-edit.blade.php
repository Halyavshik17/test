<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        {{-- <x-slot name="content"> --}}
            <div class="mt-2">
                {{-- <label class="block text-sm font-medium text-gray-700">Категория</label> --}}
                <select wire:model.defer="category_id" name="category_id"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option disabled>Выберите категорию</option>
                    @foreach ($categories as $category)
                        <option id="category_id" value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="mt-2">
                <label for="tags" class="block text-sm font-medium text-gray-700">Теги</label>
                <input type="text" name="tags" id="tags"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Введите теги через запятую">
            </div> --}}

            {{-- <livewire:admin.action-tag-selector wire:model="selectedTags" /> --}}

            <div class="col-span-6 sm:col-span-4 mt-4 bg-white">
                {{-- <x-jet-label for="title" value="{{ __('Название поста') }}" /> --}}
                {{-- <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" --}}
                    {{-- autocomplete="title" /> --}}
                {{-- <x-jet-input-error for="title" class="mt-2" /> --}}

                <input wire:model.defer="title" rows="1" placeholder="Заголовок" default="default" maxlength="120"
                class="editor_header"
                style="height: 47px; overflow-y: hidden;" data-processed="true" autocomplete="title"></input>

                @livewire('custom-editor', [
                    'editorId' => 'editor_edit',
                    'value' => $post->content,
                    'uploadDisk' => 'public',
                    'downloadDisk' => 'public',
                    'class' => '...',
                    'style' => '...',
                    'readOnly' => false,
                    'placeholder' => 'Нажмите TAB для выбора инструмента',
                ])
            </div>
        {{-- </x-slot> --}}
        {{-- <x-slot name="footer"> --}}
            <x-jet-button wire:click="update({{ $post->id }})" wire:loading.attr="disabled">
                {{ __('Сохранить') }}
            </x-jet-button>

            {{-- <x-jet-secondary-button class="ml-2" wire:click="resetModal" wire:loading.attr="disabled"> --}}
            <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition ml-2"
             href="{{ route('admin.post.show') }}">
                {{ __('Назад') }}
            </a>
            </span>
        {{-- </x-slot> --}}
    </div>
