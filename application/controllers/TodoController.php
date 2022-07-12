<?php
namespace application\controllers;

class TodoController extends Controller {
    public function index() {
        switch(getMethod()) {
            case _GET:      //select
                return $this->model->selTodoList();
            case _POST:     //insert
                $json = getJson();

                return [_RESULT => $this->model->insTodo($json)];
            case _DELETE:   //delete
                $url = getUrlPaths();

                $param = [ "itodo" => 0 ];
                if(isset($url[2])) { 
                    $param["itodo"] = intval($url[2]);
                }

                return [_RESULT => $this->model->delTodo($param)];
        }
    }
}