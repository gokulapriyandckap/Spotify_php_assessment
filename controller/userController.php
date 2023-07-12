<?php

require 'model/userModel.php';

class userController
{
    public $model;

    public function __construct()
    {
        $this->model = new userModel();
    }

    // This Function was used to Fetch the all databases from Server using fetchingData function in userModel class and render it to the view/homepage.php File.
    public function homepage(){
        $fetchedSongs = $this->model->fetchingData();
        $allsongs = $this->model->fetchingData();
        require 'view/homepage.php';
    }

    // This Function is used to get the Input from the Search Bar and send the input to the searchSongs Function in userModel class to fetch the according results for the input and render to the view/homepage.php file.
    public function searchSong($search){
        $filteredSong = $this->model->searchSongs($search);
        require 'view/homepage.php';
    }
    
    // This Function is used to get the Input from the Inputs and send the input to the checkingTheLoginUser Function in userModel class to to ckeck the user is existing or not  then according results.
    public function checkLoginUser($userData){
        $this->model->checkingTheLoginUser($userData['userName'],$userData['password']);
    }

    // This Function is used to get the Input from the users and insert into the db by using uploadSongs Function in userModel class.
    public function uploadSongs($songs){
        $this->model->uploadSongs($songs);
    }

    // This Function is used to request premium user by userid using getPremium Function in userModel class.
    public function getpremium($userId){
        $this->model->getPremium($userId);
    }

}