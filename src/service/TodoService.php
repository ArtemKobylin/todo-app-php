<?php


require_once dirname(__DIR__) . "../model/Todo.php";
require_once "BaseService.php";

class TodoService extends BaseService
{
    public function __construct()
    {
    }

    public function getCount() {
        $connection = $this->getConnection();
        $result = $connection->query('SELECT COUNT(*) FROM todos;');
        $row = $result->fetch_row();
        $connection->close();
         return $row[0];
    }

    public function getById($tid)
    {

        $connection = $this->getConnection();
        $statement = "select tid, username, email, title, is_done, edited_by_admin from todos where tid = {$tid};";
        $result = $connection->query($statement);
        $todo = null;
        if ($row = $result->fetch_assoc()) {
            $todo = new Todo(
                $row['tid'],
                $row['username'],
                $row['email'],
                $row['title'],
                $row['is_done'],
                $row['edited_by_admin']
            );
        }
        $connection->close();
        return $todo;
    }

    public function getAll($pagination)
    {
        $start = (int)$pagination['start'];
        $size = (int)$pagination['size'];
    
        $offset = ($start * $size);        

        $connection = $this->getConnection();
        $statement = "select tid, username, email, title, is_done, edited_by_admin from todos order by username asc limit {$offset}, {$size};";
        $result = $connection->query($statement);
        $todos = [];
        while ($row = $result->fetch_assoc()) {
            $todo = new Todo(
                $row['tid'],
                $row['username'],
                $row['email'],
                $row['title'],
                $row['is_done'],
                $row['edited_by_admin']
            );
            array_push($todos, $todo);
        }
        $connection->close();
        $total = $this->getCount();        
        return [
            'todos' => $todos,
            'total' => $total,
            'hasNext' => $total > $offset + $size ? true : false            
        ];
    }


    public function add($username, $email, $title)
    {
        $connection = $this->getConnection();
        $statement = $connection->prepare("INSERT INTO todos (username, email, title) VALUES (?, ?, ?)");
        $statement->bind_param("sss", $username, $email, $title);
        $statement->execute();
        $statement->close();
        $connection->close();
    }

    public function editTodoById($tid, $title, $isDone)
    {
        $todo = $this->getById($tid);
        $isTitleChanged = strcmp($todo->title, $title) === 0 ? false : true;
        
        $isChangedByAdmin = ($todo->isDone == 1 && $isTitleChanged) ? 1 : 0;
        $connection = $this->getConnection();        
        if($todo->isDone == 1) {
            $statement = $connection->prepare("UPDATE todos set title = ?, edited_by_admin = ? where tid = ?");
            $statement->bind_param("ssi", $title, $isChangedByAdmin, $tid);        
        } else {            
            $statement = $connection->prepare("UPDATE todos set title = ?, is_done = ?, edited_by_admin = ? where tid = ?");
            $statement->bind_param("sssi", $title, $isDone, $isChangedByAdmin, $tid);        
        }                
        $statement->execute();
        $statement->close();
        $connection->close();
    }
}
