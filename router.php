t
<?php


// This require is used for to access the functions in controller/userController.php file.
require 'controller/userController.php';


class router
{
    // Declared Public Variable to make the object of the userController class in controller/userController.php file.
    public $controller;

    // Declared Public empty array for assign the keys and values.
    public $routerDetails =  [];

    // This public function is used to make the object of the userController class in controller/userController.php file.
    public function __construct()
    {
        $this->controller = new userController();
    }

    // This public function get the parameter and set the new keys and values in the public $routerDetails array from the index.php file by called the get function.
    public function get($uri,$action)
    {
        $this->routerDetails[] = [
            'uri' => $uri,
            'action' => $action,
            'method' =>"GET"
        ];
    }

    // This public function post the parameter and set the new keys and values in the public $routerDetails array from the index.php file by called the post function.
    public function post($uri,$action)
    {
        $this->routerDetails[] = [
            'uri' => $uri,
            'action' => $action,
            'method' =>"POST"
        ];
    }

    // This function is get the parameter form the index.php by calling the function to send the two arguments one is $serverUri which was url of the page and the another one is $serverMethod which is the  method from the web page.
    public function routerConnection($serverUri,$serverMethod){
        foreach ($this->routerDetails as $routerValue){
            if($routerValue['uri'] == $serverUri && $routerValue['method'] == $serverMethod){
                $action = $routerValue['action'];
                switch ($action)
                {
                    // Redirect to the Homepage.
                    case 'homepage':
                        $this->controller->homepage();
                        break;
                    // Redirect to the Search Filter Function.
                    case "searchSong":
                        $this->controller->searchSong($_POST);
                        break;
                    // Redirect to checking the user is existing Filter Function.
                    case "login":
                        $this->controller->checkLoginUser($_POST);
                        break;
                    // Redirect to the  upload song  Function.
                    case "uploadsong":
                        $this->controller->uploadSongs($_FILES);
                        break;
                    // Redirect to the get premium Function.
                    case "getPremium":
                        $this->controller->getpremium($_POST);
                        break;
                }
            }
        }
    }
}