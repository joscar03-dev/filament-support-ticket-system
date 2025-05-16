<x-filament::section icon="heroicon-o-rectangle-stack" icon-color="info"
    class="max-w-7xl mx-auto items-center justify-center">
    <x-slot name="heading">
        {{ __('Lista de Tickets') }}
    </x-slot>

    <x-slot name="description">

    </x-slot>

    <x-slot name="headerEnd">
        <x-filament::button href="{{ route('tickets.create') }}" tag="a">
            Nuevo Ticket
        </x-filament::button>

        {{-- <x-filament::dropdown>
            <x-slot name="trigger">
                <x-filament::button>
                    More actions
                </x-filament::button>
            </x-slot>

            <x-filament::dropdown.list>
                <x-filament::dropdown.list.item wire:click="openViewModal">
                    View
                </x-filament::dropdown.list.item>

                <x-filament::dropdown.list.item wire:click="openEditModal">
                    Edit
                </x-filament::dropdown.list.item>

                <x-filament::dropdown.list.item wire:click="openDeleteModal">
                    Delete
                </x-filament::dropdown.list.item>
            </x-filament::dropdown.list>
        </x-filament::dropdown> --}}


    </x-slot>



    {{ $this->table }}
</x-filament::section>
