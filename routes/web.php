<?php
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\PatronController; 
use App\Http\Controllers\ResearchAssistantController; 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
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
    Route::get('/admin/create', [CategoryController::class, 'create'])->name('create-category');
    Route::post('/admin/store', [CategoryController::class, 'store'])->name('store-category');

});

// Patron route
Route::middleware(['auth', 'role:patron'])->group(function () {
    Route::get('/patron/dashboard', [PatronController::class, 'dashboard'])->name('patron.dashboard');

    // Task Routes
    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index'); // List all tasks
        Route::get('/create', [TaskController::class, 'create'])->name('tasks.create'); // Show create task form
        Route::post('/store', [TaskController::class, 'store'])->name('tasks.store'); // Store new task
        Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit'); // Show edit task form
        Route::post('/update/{id}', [TaskController::class, 'update'])->name('tasks.update'); // Update existing task
        Route::get('/delete/{id}', [TaskController::class, 'destroy'])->name('tasks.delete'); // Delete task
    });
});

//research_assistant route
Route::middleware(['auth','role:research_assistant'])->group(function () {
    Route::get('/research_assistant/dashboard',[ResearchAssistantController::class,'dashboard'])->name('research_assistant.dashboard');
});


Route::group([
    'prefix' => 'categories'
], function() {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/create', [CategoryController::class, 'create'])->name('create-category');
    Route::post('/store', [CategoryController::class, 'store'])->name('store-category');
    Route::get('/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/update/{id}', [CategoryController::class, 'update']);
    Route::get('/delete/{id}', [CategoryController::class, 'destroy']);
});

  

require __DIR__.'/auth.php';
