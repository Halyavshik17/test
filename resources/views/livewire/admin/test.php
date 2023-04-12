<div class="ce-example-popup">
        <div class="ce-example-popup__overlay"></div>
        <div class="ce-example-popup__popup">
            <form wire:submit.prevent="save">
                <textarea wire:model.defer="title" rows="1" placeholder="Заголовок" default="default" maxlength="120"
                    class="writing-title" style="height: 47px; overflow-y: hidden;" data-processed="true"></textarea>

                @livewire('editorjs', [
                    'editorId' => 'myEditor',
                    // 'value' => $value,
                    'uploadDisk' => 'public',
                    'downloadDisk' => 'public',
                    'class' => '...',
                    'style' => '...',
                    'readOnly' => false,
                    'placeholder' => 'Нажмите TAB для выбора инструмента',
                ])


                {{-- Кнопка "сохранить" --}}
                <x-jet-button type="submit" x-on:click="saveEditor()">
                    {{ __('Сохранить') }}
                </x-jet-button>
            </form>
        </div>
    </div>

    <div x-data="{ isOpen: false }">
        <button @click="isOpen = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Редактировать
        </button>

        <div x-show="isOpen" class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="isOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="isOpen" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">Редактировать пост
                        </h3>

                        <div class="mt-2">
                            <label for="category" class="block text-sm font-medium text-gray-700">Категория</label>
                            <select id="category" name="category"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option>Выберите категорию</option>
                                <option>Категория 1</option>
                                <option>Категория 2</option>
                                <option>Категория 3</option>
                            </select>
                        </div>

                        <div class="mt-2">
                            <label for="tags" class="block text-sm font-medium text-gray-700">Теги</label>
                            <input type="text" name="tags" id="tags"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Введите теги через запятую">
                        </div>

                        <div class="mt-2">
                            @livewire('editorjs', [
                                'editorId' => 'myEditor',
                                // 'value' => $value,
                                'uploadDisk' => 'public',
                                'downloadDisk' => 'public',
                                'class' => '...',
                                'style' => '...',
                                'readOnly' => false,
                                'placeholder' => 'Нажмите TAB для выбора инструмента',
                            ])

                            {{-- @livewire('validation-errors', ['fieldName' => 'post']) --}}

                            <div class="mt-2">
                                <button @click="isOpen = false"
                                    class="mr-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Отмена
                                </button>

                                <button @click="savePost"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Сохранить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function savePost() {
            let category = document.getElementById('category').value;
            let tags = document.getElementById('tags').value;
            let post = window.editorjs.save();

            Livewire.emit('savePost', category, tags, post);
        }

        function validatePost() {
            let post = window.editorjs.save();
            if (!post.blocks || post.blocks.length === 0) {
                Livewire.emit('validationError', 'post', 'Пост не может быть пустым.');
            } else {
                Livewire.emit('validationSuccess', 'post');
            }
        }
    </script>
