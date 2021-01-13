<?php

//signup Functions
function emptyInputSignup($lname,$email,$username,$pwd,$pwdRepeat){
    $result;
    
    if(empty($lname) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat) ){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidUid($username){
    $result;
    
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidEmail($email){
    $result;
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd,$pwdRepeat){
    $result;
    
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function uidExists($conn,$username,$email){
    
    $sql= "SELECT * FROM users WHERE UserName = ? OR Email = ?;" ;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
         exit();
    }

    mysqli_stmt_bind_param($stmt, "ss" ,$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

//For uploading user image
function upload_user_image(){
          
       if(isset($_FILES["user_image"]))
       {
        $extension = explode('.', $_FILES['user_image']['name']);//breaks the image name into an array
        $new_name = rand() . '.' . $extension[1];//generates a new name for the image
        $destination = '../images/Profile_Pictures/' . $new_name;
        move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);//moving file to destination folder
        return $new_name;
       }

       if(isset($_FILES["change_image"]))
       {
        $extension = explode('.', $_FILES['change_image']['name']);//breaks the image name into an array
        $new_name = rand() . '.' . $extension[1];//generates a new name for the image
        $destination = '../images/Profile_Pictures/' . $new_name;
        move_uploaded_file($_FILES['change_image']['tmp_name'], $destination);//moving file to destination folder
        return $new_name;
       }
}

function createUser($conn,$fname,$lname,$email,$username,$pwd,$image){
    
    if(empty($fname)){
      $fname = NULL;
    }

    $sql= "INSERT INTO users(UserName,First_Name,Last_Name,Email,Password,Image) values(?,?,?,?,?,?);" ;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
         exit();
    }

    //encrypting the password
    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss" ,$username,$fname,$lname,$email,$hashedPwd,$image);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

//Login Functions
function emptyInputLogin($username,$pwd){
    $result;
    
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function loginUser($conn,$username,$pwd){
    $uidExists = uidExists($conn,$username,$username);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["Password"];
    $checkPwd  = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userEmail"] = $uidExists ["Email"];
        $_SESSION["useruid"] = $uidExists ["UserName"];
        header("location: ../index.php");
        exit();
    }
}

//google signup functions
function googleUserExists($conn,$email){
       $sql = "SELECT Email FROM google_users 
               WHERE Email = '$email'";

       $result = mysqli_query($conn,$sql);

  if(mysqli_num_rows($result)>0){
    $check = false;
    return $check;
  }
  else{
    $check = true;
    return $check;
  }
}

function createGoogleUser($conn,$First_name,$Last_name,$Email){
    $sql = "INSERT INTO google_users(First_name,Last_name,Email) VALUES ('$First_name','$Last_name','$Email');";

    mysqli_query($conn,$sql);
}



//signup Functions Ends

//Member Page functions Starts

//Add New Member functions
function AddNewMember($conn,$name,$stdId,$clubId,$dept,$email,$phone,$position,$date_joined){

    $sql = "INSERT INTO members(Name,NsuId,ClubId,Dept_Id,Email,PhoneNum,Position,Date_joined) VALUES (?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
         echo  "Error! statement Failed." . mysqli_error($conn);
         exit();
    }

    mysqli_stmt_bind_param($stmt, "siiissss" ,$name,$stdId,$clubId,$dept,$email,$phone,$position,$date_joined);

    if(mysqli_stmt_execute($stmt)){
        echo "Data inserted";
    }
    else{
        echo  "Error! Please insert appropiate values.". mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    
}
//Add new Executive Member
function AddNewExecMember($conn,$stdId,$clubId,$image){

    $sql = "SELECT m_id FROM members 
            WHERE NsuId = '$stdId' AND ClubId='$clubId';";
    $result = mysqli_query($conn,$sql);

    if(!empty($result)){
       echo "";
    }
    else{
        echo "Error1!" . mysqli_error($conn);
    }
    $data = mysqli_fetch_assoc($result);
     
    $m_id = $data["m_id"];

    $sql = "INSERT INTO executive_members(m_id,Photo) VALUES ('$m_id','$image');";
    $result=mysqli_query($conn,$sql);
    if(!empty($result)){
        echo "";
    }
    else{
        echo "Error2!" . mysqli_error($conn);
    }
    

}

//Update a already existing member info
function UpdateMember($conn,$name,$stdId,$clubId,$dept,$email,$phone,$position,$date_joined,$mem_id){
    $sql = "UPDATE members 
            SET Name = ?, NsuId=?, Dept_id=?,Email=?, PhoneNum=?, Position=?, Date_joined=?
            WHERE ClubId = ? AND NsuId = ? ;";

    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt,$sql)) {
         echo  "Error! Statement Failed." . mysqli_error($conn);
         exit();
    }

    mysqli_stmt_bind_param($stmt, "siissssii" ,$name,$stdId,$dept,$email,$phone,$position,$date_joined,$clubId,$mem_id);

    if(mysqli_stmt_execute($stmt)){
        echo "Data Updated";
    }
    else{
        echo  "Error! Please insert appropiate values." . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);

}

//Update Executive Member
function UpdateExecMember($conn,$stdId,$clubId,$image){
     
    $sql = "UPDATE executive_members 
            SET Photo = '$image' 
            WHERE m_id= (SELECT m_id 
                         FROM members 
                         WHERE NsuId = '$stdId' AND ClubId='$clubId')";
    
    mysqli_query($conn,$sql);

}

//For uploading executive member image
function upload_mem_image(){
          
       if(isset($_FILES["mem_image"]))
       {
        $extension = explode('.', $_FILES['mem_image']['name']);//breaks the image name into an array
        $new_name = rand() . '.' . $extension[1];//generates a new name for the image
        $destination = '../images/Executive_Members/' . $new_name;
        move_uploaded_file($_FILES['mem_image']['tmp_name'], $destination);//moving file to destination folder
        return $new_name;
       }
}


//Member Page functions Ends





