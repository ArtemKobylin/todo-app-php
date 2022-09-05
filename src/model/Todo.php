<?php

class Todo
{
    public function __construct($id, $username, $email, $title, $isDone, $editedByAdmin)
    {
        $this->tid = $id;
        $this->username = $username;
        $this->email = $email;
        $this->title = $title;
        $this->isDone = $isDone;
        $this->editedByAdmin = $editedByAdmin;
    }
    public $tid;
    public $username;
    public $email;
    public $title;
    public $isDone;
    public $editedByAdmin;
}
