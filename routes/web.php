<?php

// use GuzzleHttp\Psr7\Request;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Requests\TaskRequest;


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



route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function() {
    $tasks = Task::latest()->paginate(10);

    return view('index', [
        'tasks' => $tasks ]);

})->name('tasks.index');

Route::view('/tasks/create', 'create')
->name('tasks.create');


Route::get('/tasks/{task}/edit', function (Task $task ) {

    return view('edit', [ 'task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
    $tasks = \App\Models\Task::findOrFail($id);
    return view('show', [ 'task' => $tasks]);
})->name('tasks.show');



Route::post('/tasks', function (Task $task, TaskRequest $request) {
//$data = $request->validated();
// $task->title = $data['title'];
// $task->description = $data['description'];
// $task->long_description = $data['long_description'];
$task = Task::create($request->validated());

return redirect()->route('tasks.show', ['id' => $task->id])
->with('success', 'Task created successfully!') ;

})->name('tasks.store');


Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

// $data = $request->validated();
// $task->title = $data['title'];
// $task->description = $data['description'];
// $task->long_description = $data['long_description'];
// $task->save();

 $task->update($request->validated());

return redirect()->route('tasks.show', ['id' => $task->id])
->with('success', 'Task updated successfully!') ;

})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
    ->with('success', 'Task deleted successfully!') ;
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task status updated successfully!') ;
})->name('tasks.toggle-complete');


Route::fallback(function () {
    return 'Still got somewhere!';
});

