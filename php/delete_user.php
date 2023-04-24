<?php

include("connection.php");
$con = connection();

$id_autor=$_GET["id_autor"];

$sql="DELETE FROM autores WHERE id_autor='$id_autor'";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: ../index.php");
}else{

}

?>