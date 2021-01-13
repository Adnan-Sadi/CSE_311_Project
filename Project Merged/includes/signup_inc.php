<?php 
require_once 'db_inc.php';
require_once 'functions_inc.php';

if(isset($_POST["submit"])){
      
     $fname = $_POST["fname"];
     $lname = $_POST["lname"];
     $email = $_POST["email"];
     $username = $_POST["userid"];
     $pwd = $_POST["pwd"];
     $pwdRepeat = $_POST["pwdrepeat"];
     $path = $_FILES["user_image"]["name"];
     $extension = strtolower(pathinfo($path,PATHINFO_EXTENSION));
     $image = '';
     
     if($extension == 'gif' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){      
         $image = upload_user_image();
     }
     else{
         header("location: ../signup.php?error=invlaidimage&extentsion=$extension");
         exit();
     }
     


     //checks if any field is empty
     if (emptyInputSignup($lname,$email,$username,$pwd,$pwdRepeat) !== false) {
         header("location: ../signup.php?error=emptyinput");
         exit();
     }

     //Checks if username is valid
     if (invalidUid($username) !== false) {
         header("location: ../signup.php?error=invaliduid");
         exit();
     }
     //Checks if email is valid
     if (invalidEmail($email) !== false) {
         header("location: ../signup.php?error=invalidemail");
         exit();
     }
     //Matches password
     if (pwdMatch($pwd,$pwdRepeat) !== false) {
         header("location: ../signup.php?error=pwdsdontmatch");
         exit();
     }
     //check if user with the same name or email exists
     if (uidExists($conn,$username,$email) !== false) {
         header("location: ../signup.php?error=usernametaken");
         exit();
     }

     createUser($conn,$fname,$lname,$email,$username,$pwd,$image);

}
else {
    header("location: ../signup.php");
    exit();
}