<?php

namespace App\Livewire;

use App\Models\Ticket;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class EditTicket extends Component implements HasForms
{
    protected static ?string $model = Ticket::class;

    use InteractsWithForms;

    public Ticket $ticket;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill( $this->ticket->attributesToArray());
    }
    public function render()
    {
        return view('livewire.edit-ticket');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                    ->label('Título')
                    ->required()
                    ->autofocus(),
                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->rows(3),
                Select::make('estado')
                    ->label('Estado')
                    ->options(self::$model::ESTADOS)
                    ->required()
                    ->in(array_keys(self::$model::ESTADOS)),
                FileUpload::make('attachment')
                    ->label('Archivo')
                    ->preserveFilenames()
                    ->downloadable()
                    ->uploadingMessage('Subiendo archivo...')
                    ->directory('tickets')
                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                    ->maxSize(1024),
                Select::make('prioridad')
                    ->label('Prioridad')
                    ->options(self::$model::PRIORIDAD)
                    ->required()
                    ->in(array_keys(self::$model::PRIORIDAD)),
                Select::make('asignado_a')
                    ->label('Asignado a')

                    ->options(
                        User::whereHas('rols', function (Builder $query) {
                            $query->where('nombre', 'Moderador');
                        })->pluck('name', 'id')->toArray()
                    ),

                Textarea::make('comentario')
                    ->label('Comentarios')
                    ->rows(3),
            ])
            ->statePath('data');
    }

    public function update()
    {
        $this->ticket->update($this->form->getState());

        Notification::make()
            ->title('Ticket editado con éxito')
            ->icon('heroicon-o-check-circle')
            ->success()
            ->send();

        return redirect()->route('tickets.index');
    }
}
