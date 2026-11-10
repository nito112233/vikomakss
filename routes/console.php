<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;

Artisan::command('app:grant-admin {email : The email address of an existing user}', function () {
    $user = User::where('email', $this->argument('email'))->first();

    if (! $user) {
        $this->error('User not found. Create the account with php artisan make:filament-user first.');

        return 1;
    }

    $user->forceFill(['is_admin' => true])->save();

    $this->info("Admin access granted to {$user->email}.");

    return 0;
})->purpose('Grant an existing user access to the Filament admin panel');
