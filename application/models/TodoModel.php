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

        return intval($this->pdo->lastInsertID());
    }

    public function selTodoList() {
        $sql = "SELECT *
                FROM t_todo
                ORDER BY itodo asc";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function delTodo(&$param) {
        $itodo = $param["itodo"];

        $sql = "DELETE FROM t_todo";    //전체삭제
        if(!empty($itodo)) {            //부분삭제
            $sql .= " WHERE itodo = {$itodo}";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount();
    }
}