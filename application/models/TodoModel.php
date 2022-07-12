<?php
namespace application\models;
use PDO;

class TodoModel extends Model {
    public function insTodo(&$param) {
        $sql = "INSERT INTO t_todo (todo)
                VALUES (:todo)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':todo', $param["todo"]);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function selTodoList() {
        $sql = "SELECT *
                FROM t_todo
                ORDER BY itodo";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delTodo(&$param) {
        $sql = "DELETE FROM t_todo
                WHERE itodo = :itodo";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':itodo', $param["itodo"]);
        $stmt->execute();

        return $stmt->rowCount();
    }
}