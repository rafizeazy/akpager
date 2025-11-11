<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ResetPasswordPage extends Page implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    protected string $view = 'filament.pages.reset-password-page';

    protected static bool $shouldRegisterNavigation = false;
    
    public static function getNavigationLabel(): string
    {
        return 'Reset Password';
    }
    
    public function getTitle(): string
    {
        return 'Reset Password';
    }

    public function resetPasswordAction(): Action
    {
        return Action::make('resetPassword')
            ->label('Reset Password')
            ->icon('heroicon-o-lock-closed')
            ->color('primary')
            ->modalHeading('Reset Password')
            ->modalDescription('Update your password to keep your account secure.')
            ->modalIcon('heroicon-o-lock-closed')
            ->modalWidth('md')
            ->modalSubmitActionLabel('Update Password')
            ->modalCancelAction(fn () => Action::make('cancel')->url('/admin'))
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
                        ->title('Error!')
                        ->body('Current password is incorrect. Please try again.')
                        ->danger()
                        ->duration(5000)
                        ->send();
                    
                    return;
                }
                
                // Update password
                auth()->user()->update([
                    'password' => Hash::make($data['password']),
                ]);
                
                Notification::make()
                    ->title('Success!')
                    ->body('Your password has been updated successfully.')
                    ->success()
                    ->duration(5000)
                    ->icon('heroicon-o-check-circle')
                    ->send();
                
                // Redirect back to dashboard after 1 second
                $this->js('setTimeout(() => window.location.href = "/admin", 1000)');
            });
    }
}
