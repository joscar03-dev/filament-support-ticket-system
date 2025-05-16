<x-filament::section icon="heroicon-o-rectangle-stack" icon-color="info" class="max-w-7xl mx-auto items-center justify-center">
    <x-slot name="heading">
        {{ __('Lista de Tickets') }}
    </x-slot>

    <x-slot name="description">

    </x-slot>

    <x-slot name="headerEnd">
        headerEnd
    </x-slot>



    {{ $this->table }}
</x-filament::section>
