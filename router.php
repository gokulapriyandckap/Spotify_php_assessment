<?php

require 'controller/userController.php';

class router
{
    public $controller;

    public $routerDetails =  [];

    public function __construct()
    {
        $this->controller = new userController();
    }
    public function get($uri,$action)
    {
        $this->routerDetails[] = [
            'uri' => $uri,
            'action' => $action,
            'method' =>"GET"
        ];
    }

    public function post($uri,$action)
    {
        $this->routerDetails[] = [
            'uri' => $uri,
            'action' => $action,
            'method' =>"POST"
        ];
    }

    public function routerConnection($serverUri,$serverMethod){
        foreach ($this->routerDetails as $routerValue){
            if($routerValue['uri'] == $serverUri && $routerValue['method'] == $serverMethod){
                $action = $routerValue['action'];
                switch ($action)
                {
                    case 'homepage':
                        $this->controller->homepage();
                        break;
                    case "searchSong":
                        $this->controller->searchSong($_POST);
                        break;
                    case "login":
                        $this->controller->checkLoginUser($_POST);
                        break;
                    case "uploadsong":
                        $this->controller->uploadSongs($_FILES);
                        break;
                    case "getPremium":
                        $this->controller->getpremium($_POST);
                        break;
                }
            }
        }
    }
}