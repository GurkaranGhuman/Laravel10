<?php
use Illuminate\Support\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}


Route::get('/', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->where('completed',true)->get()
    ]);
})->name('task.index');

Route::view('/tasks/create', 'create')->name('task.create');

Route::get('/tasks/{id}', function ($id)  {
  return view('show', ['task' => \App\Models\Task::findorFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function(){
  dd('We have reached the create post');
})->name('tasks.create');

Route::fallback(function(){
    return 'Pages does not exist';
});
