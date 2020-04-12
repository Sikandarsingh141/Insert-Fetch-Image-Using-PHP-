<h1 align="center">Uploaded Images</h1>

<?php

include('connection.php');

$query = "SELECT * FROM image_table";
$query_run = mysqli_query($connection,$query);

while($image_data = mysqli_fetch_array($query_run))
{
    echo '<center><img src="'.$image_data['image_namee'].'" style="width:30%;height:60%;border:2px solid blueviolet"/></center><br>';
}

?>

<a href="index.php">Go To Main Page</a>