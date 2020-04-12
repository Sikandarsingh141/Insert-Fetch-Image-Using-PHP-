<?php

include('connection.php');

if(isset($_POST['sub']))
{
    $name = $_POST['name'];
    // echo $image = $_FILES['imagee'];
    // print_r($_FILES['imagee']);
    $image_name = $_FILES['imagee']['name'];
    $image_tmp = $_FILES['imagee']['tmp_name'];
    $image_size = $_FILES['imagee']['size'];
    $image_extension = explode('.',$image_name);
    $image_extension = strtolower(end($image_extension));
    $new_file_name = uniqid().'.'.$image_extension;
    $location = "images/".$new_file_name;
    if($image_extension == 'jpg' || $image_extension == 'png' || $image_extension == 'jpeg' || $image_extension == 'gif')
    {
        if($image_size >= 2000000)
        {
            echo "<script>
            alert('Max File Size Is 2 MB');
            window.location='index.php';
            </script>";
        }
        else
        {
            if(move_uploaded_file($image_tmp,$location))
            {
               $query = "INSERT INTO `image_table`(`name`,`image_namee`) VALUES('$name','$location')";
               
               $query_run = mysqli_query($connection,$query);

               if($query_run)
               {
                echo "<script>
                alert('File Uploaded');
                window.location='fetch.php';
                </script>";
               }
               else
               {
                echo "<script>
                alert('Error in file upload');
                window.location='index.php';
                </script>";
               }
            }
        }
    }
}


?>