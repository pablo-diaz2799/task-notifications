<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Lightit\Shared\App\Exceptions\Http\InvalidActionException;

Route::get('invalid', static fn() => throw new InvalidActionException("Is not valid"));

Route::get('/login', static fn() => view('welcome'))->name('login');

Route::get('{unknown}', static fn() => view('layouts.app'))->where('unknown', '^(?!api).*$');


