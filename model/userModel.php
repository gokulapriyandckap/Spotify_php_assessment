<?php
require 'connection.php';

class userModel extends database
{
    
    // This function is used to fetch the all songs to show in the homepage when user enter as a guest.
    public function fetchingData()
    {
        $fetch = $this->db->query("SELECT * FROM songs");
        $fetchData = $fetch->fetchAll(PDO::FETCH_OBJ);
        return $fetchData;
    }

    //This function is used to filter the songs by search.
    public function searchSongs($searchedWord)
    {
        $word = $searchedWord['searchSong'];
      $filteredSong =  $this->db->query("SELECT * FROM songs WHERE song_name LIKE '%$word%'");
        $filteredSongs = $filteredSong->fetchAll(PDO::FETCH_OBJ);
        return $filteredSongs;
    }

    //This function is used to check the user is a logined and exisiting  user or not.
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

    //This function is used to upload the songs when the login user can upload.
    public function uploadSongs($song)
    {
        $songs = $song['audioFile'];
        $imgs = $song['audioImg'];
        $songName = ($songs['name'][0]);
        foreach ($_FILES['audioImg']['tmp_name'] as $key => $value) {
            $img_tmpname = $song['audioImg']['tmp_name'][$key];
            $img_name = $song['audioImg']['name'][$key];
            $img_path = "image/".$img_name;
            move_uploaded_file($img_tmpname,$img_path);
            $this->db->query("INSERT INTO songs(songsimgs) values('$img_path')");
        }
        header('location:/');
        }

        // This Function is used to request the premium for the user by id to the admin. These data are inserted into the user_request_premium table.
        public function getPremium($userid){
            $this->db->query("INSERT INTO user_request_premium(user_id,request,approval) values ('$userid','I want to user premium','yes')");
            $this->db->query('UPDATE users set is_premium ="yes" where users.id =$userid');
            header('location:/');
    }
}


