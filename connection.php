<?php

$connection = mysqli_connect("localhost","root","","image");

if(!$connection)
{
    echo "<script>alert('Not Connected')</script>";
}

?>