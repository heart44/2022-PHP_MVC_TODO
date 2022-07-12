<?php
namespace application\controllers;

class TodoController extends Controller {
    public function index() {
        switch(getMethod()) {
            case _GET:  //select
                $rs = $this->model->selTodoList();

                return $rs;
            case _POST: //insert
                $json = getJson();
                $this->model->insTodo($json);

                return ["rs" => 1];
            case _DELETE:   //delete
                $param = [ "itodo" => /*$itodo*/ 2 ];
                $this->model->delTodo($param);
                
                return ["rs" => 1];
        }
    }
}