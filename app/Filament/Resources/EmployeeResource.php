<?php

namespace App\Filament\Resources;

use App\Enums\Localization;
use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getModelLabel(): string
    {
        return __(Localization::Employee->value . '.employee');
    }

    public static function getPluralModelLabel(): string
    {
        return __(Localization::Employee->value . '.title');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__(Localization::Employee->value . '.employee'))->schema([
                    Grid::make(2)->schema([
                        TextInput::make('full_name')
                            ->required()
                            ->label(Localization::Employee->value . '.full_name')
                            ->translateLabel()
                            ->maxLength(255),
                        TextInput::make('first_name')
                            ->required()
                            ->label(Localization::Employee->value . '.first_name')
                            ->translateLabel()
                            ->maxLength(255),
                        TextInput::make('second_name')
                            ->required()
                            ->label(Localization::Employee->value . '.second_name')
                            ->translateLabel()
                            ->maxLength(255),
                        TextInput::make('third_name')
                            ->required()
                            ->label(Localization::Employee->value . '.third_name')
                            ->translateLabel()
                            ->maxLength(255),
                        TextInput::make('fourth_name')
                            ->required()
                            ->label(Localization::Employee->value . '.fourth_name')
                            ->translateLabel()
                            ->maxLength(255),
                        TextInput::make('age')
                            ->required()
                            ->minValue(0)
                            ->label(Localization::Employee->value . '.age')
                            ->translateLabel()
                            ->maxValue(200)
                            ->numeric(),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchable()
            ->striped()
            ->columns([
                TextColumn::make('full_name')
                    ->label(Localization::Employee->value . '.full_name')
                    ->toggleable()
                    ->translateLabel()
                    ->sortable(),
                TextColumn::make('first_name')
                    ->label(Localization::Employee->value . '.first_name')
                    ->translateLabel()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('second_name')
                    ->label(Localization::Employee->value . '.second_name')
                    ->toggleable()
                    ->translateLabel()
                    ->sortable(),
                TextColumn::make('third_name')
                    ->label(Localization::Employee->value . '.third_name')
                    ->translateLabel()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('fourth_name')
                    ->label(Localization::Employee->value . '.fourth_name')
                    ->translateLabel()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('age')
                    ->label(Localization::Employee->value . '.age')
                    ->translateLabel()
                    ->toggleable()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
