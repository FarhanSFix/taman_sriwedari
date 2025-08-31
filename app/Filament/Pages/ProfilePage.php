<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ProfilePage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $title = 'Profil Saya';
    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(Auth::user()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
                FileUpload::make('profile_photo_path')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('profile-photos')
                    ->disk('public')
                    ->avatar(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $user = Auth::user();
        $state = $this->form->getState();

        $payload = [
            'name' => $state['name'],
            'email' => $state['email'],
        ];

        if (!empty($state['profile_photo_path'])) {
            $payload['profile_photo_path'] = $state['profile_photo_path'];
        }

        $user->update($payload);

        Notification::make()
            ->title('Profil berhasil diperbarui')
            ->success()
            ->send();

        $this->form->fill($user->fresh()->toArray());
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan')
                ->action('save'),
        ];
    }
}
