<?php

require_once 'db_inc.php';
session_start();

$query= '';
$output= array();
$clubNum = $_SESSION["club_number"];
$query .= "SELECT Name,NsuId,(SELECT Dept_name FROM departments d WHERE d.dept_id = m.dept_id) AS Department,
           Position FROM members m WHERE ClubId ='$clubNum' "; //using correlated subquery 

//taking values from search box inside the table
if(isset($_POST["search"]["value"])){
    $query .= 'AND (Name Like "%' . $_POST["search"]["value"] . '%" ';//searching by name
    $query .= 'OR NsuId LIKE  "%' . $_POST["search"]["value"] . '%") ';//searching by id
}

//Ordering of columns
/*if(isset($_POST["order"])){
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else{
    $query .= 'ORDER BY Id ASC ';
}*/

//selecting table length
if($_POST["length"] != -1){
    $query .= "LIMIT ". $_POST['start'] . ", ". $_POST['length'];
}

$stmt = mysqli_query($conn,$query);


$data = array();

$filtered_rows = mysqli_num_rows($stmt);//getting number of rows returned


while($row=mysqli_fetch_assoc($stmt)){
    $sub_array = array();

    $sub_array[] = $row["Name"];
    $sub_array[] = $row["NsuId"];
    $sub_array[] = $row["Department"];
    $sub_array[] = $row["Position"];
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