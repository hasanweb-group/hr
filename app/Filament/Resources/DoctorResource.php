<?php

namespace App\Filament\Resources;

use App\Enums\Localization;
use App\Filament\Resources\DoctorResource\Pages;
use App\Models\Doctor;
use App\Models\SpecificSpecialization;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return __(Localization::Doctor->value . '.doctor');
    }


    public static function getPluralModelLabel(): string
    {
        return __(Localization::Doctor->value . '.title');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('employee_id')
                    ->relationship('employee', 'full_name')
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->label(Localization::Employee->value . '.employee')
                    ->translateLabel()
                    ->required(),

                Select::make('general_specialization_id')
                    ->relationship('generalSpecialization', 'name')
                    ->label(Localization::GeneralSpecialization->value . '.general_specialization')
                    ->native(false)
                    ->reactive()
                    ->searchable()
                    ->preload()
                    ->translateLabel()
                    ->required(),

                Select::make('specific_specialization_id')
                    ->relationship('specificSpecialization', 'name')
                    ->reactive()
                    ->label(Localization::SpecificSpecialization->value . '.specific_specialization')
                    ->options(fn(Get $get) => self::getSpecificSpecializations($get('general_specialization_id')))
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->translateLabel()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchable()
            ->striped()
            ->columns([

                TextColumn::make('employee.full_name')
                    ->label(Localization::Employee->value . '.employee')
                    ->translateLabel()
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('generalSpecialization.name')
                    ->label(Localization::GeneralSpecialization->value . '.general_specialization')
                    ->translateLabel()
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('specificSpecialization.name')
                    ->label(Localization::SpecificSpecialization->value . '.specific_specialization')
                    ->translateLabel()
                    ->toggleable()
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
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }

    public static function getSpecificSpecializations($generalSpecializationId)
    {
        return SpecificSpecialization::where('general_specialization_id', $generalSpecializationId)->pluck('name', 'id');
    }
}
