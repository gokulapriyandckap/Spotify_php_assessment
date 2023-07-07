<?php

require 'model/userModel.php';

class userController
{
    public $model;

    public function __construct()
    {
        $this->model = new userModel();
    }
    public function homepage(){
        $fetchedSongs = $this->model->fetchingData();
        $allsongs = $this->model->fetchingData();
        require 'view/homepage.php';
    }
    public function searchSong($search){
        $filteredSong = $this->model->searchSongs($search);
        require 'view/homepage.php';
    }
    public function checkLoginUser($userData){
        $this->model->checkingTheLoginUser($userData['userName'],$userData['password']);
    }
    public function uploadSongs($songs){
            $this->model->uploadSongs($songs);
    }
    public function getpremium($userId){
        $this->model->getPremium($userId);
    }

}