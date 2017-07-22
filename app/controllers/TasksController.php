<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
class TasksController extends BaseController {

	protected $tasks;

	public function __construct(Mytasks $tasks)
	{
		$this->tasks = $tasks;
	}

	public function index()
	{
		$tasks = $this->tasks->all()->toArray();
		return Response::json(compact('tasks'));
	}

	public function store()
	{
		$data = Input::get('task');
		$tasks = $this->tasks->create($data);
		$tasks = $tasks->toArray();
		return Response::json(compact('tasks'), 201);
	}

	public function destroy($id)
	{
		$this->tasks->destroy($id);
		return Response::make(null, 204);
	}

	public function update($id)
	{
		$data = Input::get('task');
		$task = $this->tasks->find($id);
		$task ->update($data);
		$task = $task->toArray();
		return Response::json(compact('task'));
	}


}
