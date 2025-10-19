<?php

namespace App\Filament\Resources\Users\Schemas;


use Illuminate\Support\Str;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;


class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(1)
                    ->schema([
                        Fieldset::make('User Information')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->columnSpanFull(),
                                TextInput::make('email')
                                    ->label('Email address')
                                    ->email()
                                    ->required()
                                    ->helperText('Enter a valid email address.'),
                                DateTimePicker::make('email_verified_at')
                                    ->label('Email Verified At'),
                            ]),
                        Fieldset::make('Security')
                            ->schema([
                                TextInput::make('password')
                                    ->password()
                                    ->required()
                                    ->helperText('Set or reset the user password.')
                                    ->suffixAction(
                                        Action::make('generatePassword')
                                            ->icon('heroicon-o-key')
                                            ->tooltip('Generate random password')
                                            ->action(function ($state, callable $set) {
                                                $generated = Str::random(12);
                                                $set('password', $generated);
                                            })
                                    )
                                    ->revealable(), // Adds show/hide password toggle
                                Checkbox::make('must_change_password')
                                    ->label('Require password change on first login')
                                    ->helperText('User will be prompted to change password after first login.'),
                            ]),
                    ]),
                Fieldset::make('Roles')
                    ->schema([
                        CheckboxList::make('roles')
                            ->relationship('roles', 'name')
                            ->searchable()
                            ->columns(2)
                            ->helperText('Assign one or more roles to the user.'),
                    ]),
            ]);
    }
}
