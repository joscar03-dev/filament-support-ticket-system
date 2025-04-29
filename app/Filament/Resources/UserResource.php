<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\RolsRelationManager;
use App\Models\User;
use App\Services\ServicioMensajeTexto;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;


    protected static ?string $navigationIcon = 'heroicon-o-user-group';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->autofocus(),
                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->label('Contraseña')
                    ->required()
                    ->hiddenOn(['edit']), //ocultar en el edit

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rols.nombre')
                    ->label('Roles')
                    ->badge()
                    ->searchable()
            ])
            ->filters([
                SelectFilter::make('rol')
                    ->relationship('rols', 'nombre')
                    ->label('Rol')
                    ->preload(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    BulkAction::make('enviarSms')
                        ->modalButton('Enviar SMS')
                        ->icon('heroicon-o-chat-bubble-left-ellipsis')
                        ->deselectRecordsAfterCompletion()
                        ->form([
                            Textarea::make('mensaje')
                                ->placeholder('Ingresa tu Mensaje aquí')
                                ->required()
                                ->rows(3),
                            Textarea::make('comentarios')
                        ])
                        ->action(function (array $data, Collection $collection) {
                            ServicioMensajeTexto::enviarMensaje($data, $collection);
                            Notification::make()
                                ->title('Mensaje enviado')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RolsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
