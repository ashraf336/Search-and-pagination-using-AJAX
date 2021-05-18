<?php
include "config.php" ;
$return_arr = array();

//
$record_per_page = 5;  
$page = '';  
$output = '';  
if(isset($_POST["page"]))  
{  
     $page = $_POST["page"];  
}  
else  
{  
     $page = 1;  
}  
$start_from = ($page - 1)*$record_per_page;  
//
$query = "SELECT  course_name ,course_description , department_name ,professor_name FROM course AS c INNER JOIN department AS d ON c.department_id = d.department_id INNER JOIN professor AS p ON c.professor_id = p.professor_id LIMIT $start_from, $record_per_page";
$result= mysqli_query($conn , $query);

while($row=mysqli_fetch_array($result)){
    $course_name = $row ['course_name'];
    $course_description = $row ['course_description'];
    $department_name = $row ['department_name'];
    $professor_name = $row ['professor_name'];
    
    $return_arr[]=array(
                        "course_name" =>$course_name,
                        "course_description" =>$course_description,
                        "department_name" =>$department_name,
                        "professor_name" =>$professor_name);

}

//Encoding array in JSON format
echo json_encode($return_arr);
exit;


?>