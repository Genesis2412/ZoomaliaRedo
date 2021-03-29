<?php
  
  session_start();

  /* Getting file name */
  $filename = $_FILES['file']['name'];

  /* Location */
  $location = "./img/".$filename;
  $uploadOk = 1;
  $imageFileType = pathinfo($location,PATHINFO_EXTENSION);

  if($location != 0)
  {
    $_SESSION["locator"]= $location;
  }

  /* Valid Extensions */
  $valid_extensions = array("jpg","jpeg","png");

  /* Check file extension */
  if( in_array(strtolower($imageFileType),$valid_extensions) ) 
  {
    /* Upload file */
    if(move_uploaded_file($_FILES['file']['tmp_name'],$location))
    {
        $_SESSION['filename'] = $filename;
    }
  }
?>