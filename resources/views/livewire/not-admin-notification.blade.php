@php
if (session('not_admin')) {
    \Filament\Notifications\Notification::make()
        ->title('Anda bukan Admin')
        ->body('Hanya Admin Utama yang dapat mengakses panel admin.')
        ->danger()
        ->send();

    session()->forget('not_admin');
}
@endphp
