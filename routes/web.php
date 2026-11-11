<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

foreach (['lv' => ['', 'pakalpojumi', 'projekti', 'par-mums', 'kontakti'], 'en' => ['en', 'services', 'projects', 'about', 'contact']] as $locale => $paths) {
    Route::prefix($paths[0])->name($locale.'.')->middleware(SetLocale::class.':'.$locale)->group(function () use ($paths): void {
        Route::get('/', [PageController::class, 'home'])->name('home');
        Route::get($paths[1], [PageController::class, 'services'])->name('services');
        Route::get($paths[2], [ProjectController::class, 'index'])->name('projects');
        Route::get($paths[3], [PageController::class, 'about'])->name('about');
        Route::get($paths[4], [PageController::class, 'contact'])->name('contact');
    });
}
