<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaggableResource\Pages;
use App\Filament\Resources\TaggableResource\RelationManagers;
use App\Models\Taggable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaggableResource extends Resource
{
    protected static ?string $model = Taggable::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tag_id')->relationship('tags', 'name')->required(),
                Forms\Components\Select::make('card_id')->relationship('cards', 'name')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tag_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('card_id')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListTaggables::route('/'),
            'create' => Pages\CreateTaggable::route('/create'),
            'edit' => Pages\EditTaggable::route('/{record}/edit'),
        ];
    }
}
