<?php

use App\Models\Resume;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/resume/print', function () {
    return view('resume-print', [
        'resume' => Resume::first(),
    ]);
})->name('resume.print');
