<?php
require 'connection.php';

class userModel extends database
{
    public function fetchingData()
    {
        $fetch = $this->db->query("SELECT * FROM songs");
        $fetchData = $fetch->fetchAll(PDO::FETCH_OBJ);
        return $fetchData;
//        var_dump($fetchData[0]->song_name);
    }

    public function searchSongs($searchedWord)
    {
        $word = $searchedWord['searchSong'];
      $filteredSong =  $this->db->query("SELECT * FROM songs WHERE song_name LIKE '%$word%'");
        $filteredSongs = $filteredSong->fetchAll(PDO::FETCH_OBJ);
        return $filteredSongs;
    }

    public function checkingTheLoginUser($userName, $password)
    {
        $loginUser = $this->db->query("SELECT * from users WHERE name = '$userName' and password = '$password'");
        $loginUserData = $loginUser->fetchAll(PDO::FETCH_OBJ);
        $count = count($loginUserData);

        if ($count == 1) {
            $username = $loginUserData[0]->name;
            $userId = $loginUserData[0]->id;
            require 'view/homepage.php';
        } else {
            header("location:view/loginpage.php");
        }
    }

    public function uploadSongs($song)
    {
        $songs = $song['audioFile'];
        $imgs = $song['audioImg'];


        foreach ($_FILES['audioImg']['tmp_name'] as $key => $value) {
            $img_tmpname = $song['audioImg']['tmp_name'][$key];
            $img_name = $song['audioImg']['name'][$key];
            $img_path = "image/".$img_name;
            move_uploaded_file($img_tmpname,$img_path);
            $this->db->query("INSERT INTO songs(songsimgs) values('$img_path')");
        }

//        foreach ($_FILES['audioFile']['tmp_name'] as $k => $value) {
//            $song_tmpname = $_FILES['audioFile']['tmp_name'][$k];
//            $song_name = $_FILES['audioFile']['name'][$k];
//            $songpath = "songs/".$song_name;
//            move_uploaded_file($song_tmpname, $songpath);
//        }
        }
}


