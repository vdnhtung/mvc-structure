<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\TaskModel;
use MVC\Models\TaskRepository;

class tasksController extends Controller
{

    private $taskRepo;

    public function __construct()
    {
        $this->taskRepo = new TaskRepository();
    }

    function index()
    {
        $tasks = new TaskModel();
        $data['tasks'] = $this->taskRepo->getAll($tasks);
        $this->set($data);
        $this->render("index");
    }

    function create()
    {
        extract($_POST);

        if (isset($_POST["title"]) || isset($_POST["description"]))
        {
            $task= new TaskModel();
            $task->setTitle($title);
            $task->setDescription($description);

            if ($this->taskRepo->add($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        extract($_POST);
        $task= new TaskModel();
        $data["task"] = $this->taskRepo->get($id);

        if (isset($title))
        {
            $task->setId($id);
            $task->setTitle($title);
            $task->setDescription($description);

            if ($this->taskRepo->update($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($data);
        $this->render("edit");
    }

    function delete($id)
    {
        extract($_POST);
        $task = new TaskModel();
        $task->setId($id);
        if ($this->taskRepo->delete($task))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>