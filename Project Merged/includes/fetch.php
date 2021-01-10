<?php

require_once 'db_inc.php';
session_start();

$query= '';
$output= array();
$column = array('Name', 'NsuId','Dept_Name','Position', 'Date_Joined');
$clubNum = $_SESSION["club_number"];
$query .= "SELECT Name,NsuId,Dept_Name,
            Position,Date_Joined 
            FROM members m 
            INNER JOIN departments d
            ON m.dept_id = d.dept_id
            WHERE ClubId ='$clubNum' "; //using INNER JOIN

//taking values from search box inside the table
if(isset($_POST["search"]["value"])){
    $query .= 'AND (Name Like "%' . $_POST["search"]["value"] . '%" ';//searching by name
    $query .= 'OR NsuId LIKE  "%' . $_POST["search"]["value"] . '%" ';//searching by id
    $query .= 'OR Dept_Name LIKE  "%' . $_POST["search"]["value"] . '%" ';//searching by Department
    $query .= 'OR Position LIKE  "%' . $_POST["search"]["value"] . '%") ';//searching by Position
    
}

//Ordering of columns
if(isset($_POST["order"])){
    $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' '; //$_POST['order']['0']['column'] returns column number starting from 0...n
}
else{
    $query .= 'ORDER BY NsuId ASC ';
}

//selecting table length
if($_POST["length"] != -1){
    $query .= "LIMIT ". $_POST['start'] . ", ". $_POST['length'];
}

$stmt = mysqli_query($conn,$query);


$data = array();

$filtered_rows = mysqli_num_rows($stmt);//getting number of rows returned


while($row=mysqli_fetch_assoc($stmt)){
    $sub_array = array();

    $sub_array[] = "<a href='Full_mem_info.php?NsuId=". $row["NsuId"] ."' id='".$row["NsuId"]."'>".$row["Name"]."</a>";
    $sub_array[] = $row["NsuId"];
    $sub_array[] = $row["Dept_Name"];
    $sub_array[] = $row["Position"];
    $sub_array[] = $row["Date_Joined"];
    $sub_array[] = "<button type = 'button' name ='update' id='".$row["NsuId"]."' class='btn btn-warning btn-xs update'>Update</button>";
    $sub_array[] = "<button type = 'button' name ='delete' id='".$row["NsuId"]."' class='btn btn-danger btn-xs delete'>Delete</button>";

    $data[] = $sub_array;

}

$output = array(
    "draw"   => intval($_POST["draw"]),//drawing the table
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => $_SESSION["mem_rows"],
    "data"   => $data
);

echo json_encode($output);

?>