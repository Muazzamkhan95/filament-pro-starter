<?php

namespace App\Filament\Resources\Users\Pages;

use App\Mail\SendUserCredentials;
use Illuminate\Support\Facades\Mail;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Users\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        $record = $this->record;
        $data = $this->form->getState();

        if (isset($data['password'])) {
            $plainPassword = $data['password'];
            Mail::to($record->email)->send(new SendUserCredentials($record, $plainPassword));
        }
    }
}
