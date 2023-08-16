<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Log::channel('abuse')->info('API endpoint abuse', [
        'user_id' => 1
    ]);
    return view('welcome');
});



Auth::routes();

//Route user
Route::middleware(['auth','user-role:user'])->group(function() // add two middleware in [], aliase name user-role separated by role with colon
{
    Route::get("/home",[HomeController::class, 'userHome'])->name("home");
});
// Route Editor
Route::middleware(['auth','user-role:editor'])->group(function()
{
    Route::get("editor/home",[HomeController::class, 'editorHome'])->name("editor.home");
});
// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("admin/home",[HomeController::class, 'adminHome'])->name("admin.home");
});