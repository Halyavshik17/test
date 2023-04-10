<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <x-jet-button type="button" wire:click="showModalCreate" wire:loading.attr="disabled">
        {{ __('Добавить категорию') }}
    </x-jet-button>

    {{-- Show modal create  --}}
    <x-jet-dialog-modal wire:model="showingModalCreate" maxWidth="md">
        <x-slot name="title">
            Добавление категории
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mt-4" >
                <x-jet-label for="title" value="{{ __('Название категории') }}" />
                <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" autocomplete="title" />
                <x-jet-input-error for="title" class="mt-2" />
            </div>
        </x-slot>    
        <x-slot name="footer">  
            <x-jet-button wire:click="create" wire:loading.attr="disabled">
                {{ __('Сохранить')  }}
            </x-jet-button>

            <x-jet-secondary-button class="ml-2" wire:click="resetModal" wire:loading.attr="disabled">
                {{ __('Отмена')  }}
            </x-jet-secondary-button>
            </span>
        </x-slot>  
    </x-jet-dialog-modal>
    {{-- Show modal edit  --}}
    <x-jet-dialog-modal wire:model="showingModalEdit" maxWidth="md">
        <x-slot name="title">
            Редактирование категории
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mt-4" >
                <x-jet-label for="title" value="{{ __('Название категории') }}" />
                <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" autocomplete="title" />
                <x-jet-input-error for="title" class="mt-2" />
            </div>
        </x-slot>    
        <x-slot name="footer">  
            <x-jet-button wire:click="update" wire:loading.attr="disabled">
                {{ __('Сохранить')  }}
            </x-jet-button>

            <x-jet-secondary-button class="ml-2" wire:click="resetModal" wire:loading.attr="disabled">
                {{ __('Отмена')  }}
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
                            <th class="py-3 px-6 text-center">Действия</th>
                        </tr>
                    </thead>
                    @foreach ($categories as $category)
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $category->id }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $category->title }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <button type="submit" wire:click="#" wire:loading.attr="disabled" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button type="submit" wire:click="edit({{ $category->id }})" wire:loading.attr="disabled" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button type="submit" wire:click="delete({{ $category->id }})" wire:loading.attr="disabled" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
