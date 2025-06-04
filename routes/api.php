<?php

declare(strict_types=1);

use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Users\App\Controllers\{
    DeleteUserController,
    GetUserController,
    ListUserController,
    StoreUserController,
    UpdateUserController
};
use Lightit\Backoffice\Employees\App\Controllers\{
    ListEmployeesController,
    CreateEmployeesController
};
use Lightit\Backoffice\Tasks\App\Controllers\{
    ListTaskController,
    UpsertTaskController
};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')
    ->get('/me', function (#[CurrentUser] $user) {
        return response()->json([
            'data' => $user,
        ]);
    });

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::prefix('users')
    ->middleware([])
    ->group(static function (): void {
        Route::get('/', ListUserController::class);
        Route::get('/{user}', GetUserController::class)
            ->withTrashed()
            ->whereNumber('user');
        Route::post('/', StoreUserController::class);
        Route::put('/{user}', UpdateUserController::class)
            ->whereNumber('user');
        Route::delete('/{user}', DeleteUserController::class)
            ->whereNumber('user');
    });

Route::prefix('employees')
    ->name('employees.')
    ->group(static function (): void {
        Route::get('/', ListEmployeesController::class)->name('list');
        Route::post('/', CreateEmployeesController::class)->name('store');
    });

Route::prefix('tasks')
    ->name('tasks.')
    ->group(static function (): void {
        Route::get('/', ListTaskController::class)->name('list');
        Route::post('/', UpsertTaskController::class)->name('upsert');
    });
