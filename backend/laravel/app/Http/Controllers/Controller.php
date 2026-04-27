<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function  __construct()
    {
        //
    }
    protected function render($view, $data = [])
    {
        extract($data);
        ob_start();
        require "../Views/$view" . ".php";
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    protected function redirect($url)
    {
        header("Location: $url");
        exit;
    }
    protected function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
