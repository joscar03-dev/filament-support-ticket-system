<x-filament::section icon="heroicon-o-rectangle-stack" icon-color="info" class="max-w-7xl mx-auto items-center justify-center">
    <x-slot name="heading">
        Crear Ticket
    </x-slot>
    <form wire:submit="create" class="max-w-7xl mx-auto items-center justify-center">
        {{ $this->form }}

        <x-filament::button type="submit" style="margin-top:30px">
            Enviar
        </x-filament::button>
    </form>

    <x-filament-actions::modals />
</x-filament::section>
