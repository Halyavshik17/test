<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Теги') }}
        </h2>
    </x-slot>
    @livewire('admin.action-tags')
</x-admin-layout>