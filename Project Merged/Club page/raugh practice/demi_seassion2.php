<?php
   if(isset($_POST['ok'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $arrayVar = explode('.',$_FILES['image']['name']);
      $extension = end($arrayVar);
      $file_ext=strtolower($extension);
      $file_name = base64_encode($_FILES['image']['name']).".jpg";
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"./uploads/".$file_name);
         echo "Success";
         echo $file_name;
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input name="ok" type="submit"/>
      </form>
      
   </body>
</html>