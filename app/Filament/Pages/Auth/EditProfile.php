<?php

namespace App\Filament\Pages\Auth;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EditProfile extends Page
{
    protected string $view = 'filament.pages.auth.edit-profile';

    protected static bool $shouldRegisterNavigation = false;    protected function getHeaderActions(): array
    {
        return [
            Action::make('resetPassword')
                ->label('Reset Password')
                ->icon('heroicon-o-lock-closed')
                ->color('primary')
                ->modalHeading('Reset Password')
                ->modalDescription('Update your password to keep your account secure.')
                ->modalIcon('heroicon-o-lock-closed')
                ->modalWidth('md')
                ->modalSubmitActionLabel('Update Password')
                ->form([
                    TextInput::make('current_password')
                        ->label('Current Password')
                        ->password()
                        ->required()
                        ->revealable()
                        ->currentPassword()
                        ->validationAttribute('current password'),
                    
                    TextInput::make('password')
                        ->label('New Password')
                        ->password()
                        ->required()
                        ->revealable()
                        ->rule(Password::default())
                        ->different('current_password')
                        ->validationAttribute('new password')
                        ->helperText('Password must be at least 8 characters.'),
                    
                    TextInput::make('password_confirmation')
                        ->label('Confirm New Password')
                        ->password()
                        ->required()
                        ->revealable()
                        ->same('password')
                        ->validationAttribute('password confirmation'),
                ])
                ->action(function (array $data) {
                    // Verify current password
                    if (!Hash::check($data['current_password'], auth()->user()->password)) {
                        Notification::make()
                            ->title('Current password is incorrect')
                            ->danger()
                            ->send();
                        
                        return;
                    }
                    
                    // Update password
                    auth()->user()->update([
                        'password' => Hash::make($data['password']),
                    ]);
                    
                    Notification::make()
                        ->title('Password updated successfully')
                        ->success()
                        ->send();
                }),
        ];
    }
}
