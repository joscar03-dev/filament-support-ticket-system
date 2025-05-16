<x-filament::section icon="heroicon-o-rectangle-stack" icon-color="info" class="max-w-7xl mx-auto items-center justify-center">

    <x-slot name="heading">
        User Login
    </x-slot>
    <form wire:submit="authenticate" class="max-w-7xl mx-auto items-center justify-center">
        {{ $this->form }}

        <x-filament::button type="submit" style="margin-top:30px">
            Login
        </x-filament::button>
    </form>

    <x-filament-actions::modals />
</x-filament::section>
