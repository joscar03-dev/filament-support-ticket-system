<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Filament\Resources\TicketResource\RelationManagers\CategoriasRelationManager;
use App\Models\Rol;
use App\Models\Ticket;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListTickets extends Component implements HasTable, HasForms
{
    protected static ?string $model = Ticket::class;
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Ticket::query())
            ->columns([
                TextColumn::make('titulo')
                    ->description(fn(Ticket $record): ?string => $record?->descripcion ?? null)
                    ->label('Título')
                    ->searchable()
                    ->sortable(),
                SelectColumn::make('estado')
                    ->options(self::$model::ESTADOS)
                    ->label('Estado'),
                TextColumn::make('prioridad')
                    ->badge()
                    ->colors ([
                        'warning' => self::$model::PRIORIDAD['Alta'],
                        'info' => self::$model::PRIORIDAD['Media'],
                        'danger' => self::$model::PRIORIDAD['Baja'],
                    ])
                    ->label('Prioridad'),
                TextColumn::make('asignadoA.name')
                    ->label('Asignado a')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('asignadoPor.name')
                    ->label('Asignado por')
                    ->searchable()
                    ->sortable(),
                TextInputColumn::make('comentario')
                    ->label('Comentario')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Creado en')
                    ->sortable()



            ])
            ->filters([

                SelectFilter::make('estado')
                    ->options(self::$model::ESTADOS)
                    ->label('Estado')
                    ->placeholder('Filtro por estado'),
                SelectFilter::make('prioridad')
                    ->options(self::$model::PRIORIDAD)
                    ->label('Prioridad')
                    ->placeholder('Filtro por prioridad'),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public function render()
    {
        return view('livewire.list-tickets');
    }
}
