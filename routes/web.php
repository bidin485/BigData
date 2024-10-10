<?php
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\PatronController; 
use App\Http\Controllers\ResearchAssistantController; 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[TemplateController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin route
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
});
//patron route
Route::middleware(['auth','role:patron'])->group(function () {
    Route::get('/patron/dashboard',[PatronController::class,'dashboard'])->name('patron.dashboard');
});
//research_assistant route
Route::middleware(['auth','role:research_assistant'])->group(function () {
    Route::get('/research_assistant/dashboard',[ResearchAssistantController::class,'dashboard'])->name('research_assistant.dashboard');
});

require __DIR__.'/auth.php';
