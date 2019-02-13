<?php
class View{
    protected $data;
    protected $path;
    protected static function getDefaultViewPath(){
        $router = App::getRouter();
        if(!$router){
            return false;
        }
        $controller_dir = $router->getController();
        $template_name = $router->getMethodPrefix().$router->getAction.'html';
        return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
    }
    public function __constructor($data = array(), $path = null){
        if(!$path){
                echo '';
        }
        if(!file_exists($path)){
            throw new Exception('Template file is not found in path: ' .$path);
        }
        $this->path = $path;
        $thisdata = $data;
    }
    public function render (){
        $data = $this->data;
        ob_start();
        include($this->path);
        $content = ob_get_clean();
        return $content;
    }
}