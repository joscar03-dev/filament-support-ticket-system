<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MensajeTextoResource\Pages;
use App\Filament\Resources\MensajeTextoResource\RelationManagers;
use App\Models\MensajeTexto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MensajeTextoResource extends Resource
{
    //recursos para el envio de mensajes de texto
    protected static ?string $model = MensajeTexto::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('enviadoPor.name')
                    ->sortable()
                    ->searchable()
                    ->default('-')
                    ->label('Mensaje enviado por'),
                TextColumn::make('enviarA.name')
                    ->sortable()
                    ->label('Enviado a')
                    ->searchable(),
                TextColumn::make('mensaje')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('estado')
                    ->badge(),
                TextColumn::make('comentarios')
                    ->default('-')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->sortable()
                    ->date(),
            ])
            ->filters([
                SelectFilter::make('estado')
                    ->options(MensajeTexto::ESTADOS),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMensajeTextos::route('/'),/*
            'create' => Pages\CreateMensajeTexto::route('/create'),
            'edit' => Pages\EditMensajeTexto::route('/{record}/edit'), */
        ];
    }
}
