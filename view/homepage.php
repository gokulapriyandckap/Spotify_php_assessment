<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
<a id="login" href="../view/loginpage.php">Login</a>
<br>
<br>


<?php
$_SESSION['username'] = $username;

$_SESSION['userId'] = $userId;

//echo
echo "Hello "." ".$_SESSION['username']." Let's Vibe✨";
echo '<br>';

$userIds = $_SESSION['userId'];
echo $userIds;
echo '<html>
<form action="getPremium" method="post">
<button value="$userIds">Get Premium</button>
</form>
</html>';

if (isset($username)){
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo '<a href="../view/logout.php">logout</a>';
    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo '<html>
<body>
<form action="/uploadsong" method="post" enctype="multipart/form-data">
<label>Add Songs</label>
<input type="file" name="audioFile[]" multiple accept="audio/*" placeholder="Add Songs">
<br>
<br>
<label>Add Image for the Songs</label>
<input type="file" name="audioImg[]" multiple  placeholder="Add Images">
<br>
<br>
<button>Submit</button>
</form>

 <br>
 <br>
 <br>
 

<form action="/search" method="post">
    <input type="search" name="searchSong" placeholder="Search Songs">
    <input type="submit">
</form>';


    echo '<script>loginbtn = document.querySelector("#login")
         loginbtn.classList.add("add");
</script>';


}

?>

<br>
<br>
<html>
<body>
<form action="/search" method="post">
    <input type="search" name="searchSong" placeholder="Search Songs">
    <input type="submit">
</form>

<br>
<br>
<table>
    <tr>
        <th>Song Name</th>
        <th>Song Image</th>
    </tr>
    <?php foreach ($filteredSong as $fetchedsongs =>$values): ?>
        <tr>
            <td><?php echo $values->song_name?></td>
            <td><img src="<?php echo $values->songsimgs?>"> </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>


<br>
<br>
<br>
<br>
<br>
<table>
    <tr>
        <th>Song Name</th>
        <th>Song Image</th>
    </tr>
    <?php foreach ($fetchedSongs as $fetchedsong =>$values): ?>
    <tr>
        <td><?php echo $values->song_name?></td>
        <td><img src="<?php echo $values->songsimgs?>"> </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>




<style>
    .add{
        visibility: hidden;
    }
</style>