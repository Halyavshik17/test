<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

    {{-- <x-jet-button type="button" wire:click="showModalCreate" wire:loading.attr="disabled"> --}}
        <x-jet-button type="button" wire:click="showModalCreate" wire:loading.attr="disabled">
            {{ __('Добавить пост') }}
        </x-jet-button>

        {{-- Show modal create  --}}
        <x-jet-dialog-modal wire:model="showingModalCreate" maxWidth="4xl">
            <x-slot name="title">
                {{-- Добавление поста --}}
            </x-slot>

            <x-slot name="content">
                <div class="mt-2">
                    {{-- <label class="block text-sm font-medium text-gray-700">Категория</label> --}}
                    <select wire:model.defer="category_id" name="category_id"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option>Выберите категорию</option>
                        @foreach ($categories as $category)
                            <option id="category_id" value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <livewire:admin.action-tag-selector wire:model="selectedTags" :slug="[]" />

                <div class="col-span-6 sm:col-span-4 mt-4">
                    <input wire:model.defer="title" rows="1" placeholder="Заголовок" default="default" maxlength="120"
                    class="editor_header"
                    style="height: 47px; overflow-y: hidden;" data-processed="true" autocomplete="title"></input>

                    @livewire('custom-editor', [
                        'editorId' => 'editor_create',
                        'value' => $content,
                        'uploadDisk' => 'public',
                        'downloadDisk' => 'public',
                        'class' => '...',
                        'style' => '...',
                        'readOnly' => false,
                        'placeholder' => 'Нажмите TAB для выбора инструмента',
                ] )
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:click="save" wire:target="save" wire:loading.attr="disabled">
                {{-- <x-jet-button wire:click="create" wire:loading.attr="disabled"> --}}
                    {{ __('Сохранить') }}
                </x-jet-button>

                <x-jet-secondary-button class="ml-2" wire:click="resetModal" wire:loading.attr="disabled">
                    {{ __('Отмена') }}
                </x-jet-secondary-button>
                </span>
            </x-slot>
        </x-jet-dialog-modal>

    <div class="overflow-x-auto">
        <div class="mt-2 w-full">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">#</th>
                            <th class="py-3 px-6 text-left">Название</th>
                            <th class="py-3 px-6 text-left">Категория</th>
                            <th class="py-3 px-6 text-center">Действия</th>
                        </tr>
                    </thead>
                    @foreach ($posts as $post)
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $post->id }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ $post->title }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        {{-- Избегаем ошибочку отсутствия title  --}}
                                        <span>{{ optional($post->category)->title }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a href="{{ route('admin.post.edit', $post->slug) }}"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <button type="submit" wire:click="delete({{ $post->id }})"
                                            wire:loading.attr="disabled"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
