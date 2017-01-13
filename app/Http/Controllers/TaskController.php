<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use EllipseSynergie\ApiResponse\Contracts\Response;

use App\Task;

use App\TaskTransformer;


class TaskController extends Controller
{
    //
    protected $response;
 
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
    public function index()
    {

    	$tasks = Task::paginate(5);
        // Return a collection of $task with pagination
        $valor = $this->response->withPaginator($tasks, new  TaskTransformer());
        
        return view('tasks', ["data" => $valor->getData()->data,"pagination" => $valor->getData()->meta->pagination ] );
    }
 
    public function show($id)
    {
        //Get the task
        $task = Task::find($id);
        if (!$task) {
            return $this->response->errorNotFound('Task Not Found');
        }
        // Return a single task
        return $this->response->withItem($task, new  TaskTransformer());
    }
 
    public function destroy($id)
    {
        
        //Get the task
        $task = Task::find($id);
        if (!$task) {
            return $this->response->errorNotFound('Task Not Found');
        }
 
        if($task->delete()) {
             return $this->response->withItem($task, new  TaskTransformer());
        } else {
            return $this->response->errorInternalError('Could not delete a task');
        }
        
 
    }
 
    public function store(Request $request)  {
        
        if ($request->isMethod('put')) {
            
            //Get the task
            $task = Task::find($request->task_id);
            
            if (!$task) {
                return $this->response->errorNotFound('Task Not Found');
            }
          
        } else {
            $task = new Task;
            $task->created_at = date("Y-m-d H:i:s");    
        }
        
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->completed = $request->input('completed');
        $task->updated_at = date("Y-m-d H:i:s");

 
        if($task->save()) {
            return $this->response->withItem($task, new  TaskTransformer());
        } else {
             return $this->response->errorInternalError('Could not updated/created a task');
        }
    }
}