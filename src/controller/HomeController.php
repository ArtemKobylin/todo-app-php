<?php

require_once "BaseController.php";
require dirname(__DIR__) . "../service/TodoService.php";

class HomeController extends BaseController
{

    private $todoService;
    public function __construct()
    {
        parent::__construct();
        $this->todoService = new TodoService();
    }

    public function index()
    {
        $pagination = $this->getPagination();
        $result = $this->todoService->getAll($pagination);
        $hasNext = $result['hasNext'];

        $nextIndex = (int)$pagination['start'] + 1;
        $previousIndex = (int)$pagination['start'] - 1;
        $this->view('index', [
            'todos' => $result['todos'],
            'next' => $hasNext === true ? "/home?start={$nextIndex}?size={$pagination['size']}" : null,
            'previous' => $previousIndex > -1 ? "/home?start={$previousIndex}?size={$pagination['size']}" : null
        ]);
    }

    public function add()
    {
        if ($this->isPost()) {
            $variables = $this->getVariables();
            $username = $variables->username;
            $email = $variables->email;
            $title = $variables->title;
            if (
                !$username
                || !$email
                || !$title
            ) {
                $this->view('add-todo', [
                    'errorMessage' => 'all values must be provided!'
                ]);
            } else {
                $this->todoService->add($username, $email, $title);
                $this->redirect('/home');
            }
        }
        $this->view('add-todo', []);
    }

    public function edit()
    {
        if (!$this->isAuthenticated()) {
            $this->redirect('/home');
        }
        $pathVariable = $this->getPathVariable();
        if ($pathVariable == null) {
            $this->redirect('/home');
        }

        if ($this->isPost()) {
            $variables = $this->getVariables();
            $tid = $variables->tid;            
            $title = $variables->title;
            $isDone = $variables->isDone;
            if (!$title
            ) {
                $this->view('edit-todo', [
                    'errorMessage' => 'all values must be provided!'
                ]);
            } else {
                $this->todoService->editTodoById(
                    $tid,                    
                    $title,
                    $isDone
                );
                $this->redirect('/home');
            }
        }
        $todo = $this->todoService->getById($pathVariable);
        //to handle the view select
        $todo->isDone = $todo->isDone == 1 ? $todo->isDone : null;        
        $this->view('edit-todo', (array)$todo);
    }
}
