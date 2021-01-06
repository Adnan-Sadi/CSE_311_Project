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

function createUser($conn,$fname,$lname,$email,$username,$pwd){
    
    if(empty($fname)){
      $fname = NULL;
    }

    $sql= "INSERT INTO users(UserName,First_Name,Last_Name,Email,Password) values(?,?,?,?,?);" ;
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
         exit();
    }

    //encrypting the password
    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss" ,$username,$fname,$lname,$email,$hashedPwd);
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
        $_SESSION["userid"] = $uidExists ["uid"];
        $_SESSION["useruid"] = $uidExists ["UserName"];
        header("location: ../index.php");
        exit();
    }
}

//google signup functions
function googleUserExists($conn,$email){
       $sql = "SELECT Email FROM google_users WHERE Email = '$email'";

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


//Add New Member functions
function AddNewMember($conn,$name,$stdId,$clubId,$dept,$email,$phone,$position,$sem_joined){

    $sql = "INSERT INTO club_members(Name,Id,Dept_name,Club_id,Email,PhoneNum,Position,Semester_joined) VALUES (?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
         echo  "Error! Please insert appropiate values.";
         exit();
    }

    mysqli_stmt_bind_param($stmt, "sisissss" ,$name,$stdId,$dept,$clubId,$email,$phone,$position,$sem_joined);

    if(mysqli_stmt_execute($stmt)){
        echo "Data inserted";
    }
    else{
        echo  "Error! Please insert appropiate values.";
    }

    mysqli_stmt_close($stmt);
    exit();
}

//Update a already existing member info
function UpdateMember($conn,$name,$stdId,$clubId,$dept,$email,$phone,$position,$sem_joined,$mem_id){
    $sql = "UPDATE club_members 
            SET Name = ?, Id=?, Dept_name=?,Email=?, PhoneNum=?, Position=?, Semester_joined=?
            WHERE Club_id = ? AND Id = ? ;";

    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt,$sql)) {
         echo  "Error! Statement Failed.";
         exit();
    }

    mysqli_stmt_bind_param($stmt, "sisssssii" ,$name,$stdId,$dept,$email,$phone,$position,$sem_joined,$clubId,$mem_id);

    if(mysqli_stmt_execute($stmt)){
        echo "Data Updated";
    }
    else{
        echo  "Error! Please insert appropiate values.";
    }

    mysqli_stmt_close($stmt);
    exit();


}





