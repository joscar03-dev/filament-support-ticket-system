<div>
    <x-slot name="heading">
        Editar Ticket
    </x-slot>
    <form wire:submit="update" class="max-w-7xl mx-auto items-center justify-center">
        {{ $this->form }}

        <x-filament::button type="submit" style="margin-top:30px">
            Enviar
        </x-filament::button>
    </form>

    <x-filament-actions::modals />
</div>
