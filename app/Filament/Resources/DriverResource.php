<?php

namespace App\Filament\Resources;

use App\Enums\DriverStatus;
use App\Enums\UserType;
use App\Filament\Resources\DriverResource\Pages;
use App\Filament\Resources\DriverResource\RelationManagers;
use App\Models\Driver;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use function Laravel\Prompts\warning;

class DriverResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $label = 'Drivers';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereRole(UserType::Driver->name); // TODO: Change the autogenerated stub
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('verificationStatus')
                    ->default(DriverStatus::Pending->name)
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        DriverStatus::Approved->name => 'success',
                        DriverStatus::Pending->name => 'primary',
                        DriverStatus::Rejected->name => 'danger',
                    })

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('verify')
                    ->color(Color::Green)
                    ->icon('heroicon-o-check-circle')
                    ->action(function () {
                        dd('action');
                    })
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
            'index' => Pages\ListDrivers::route('/'),
            'create' => Pages\CreateDriver::route('/create'),
            'edit' => Pages\EditDriver::route('/{record}/edit'),
        ];
    }
}
