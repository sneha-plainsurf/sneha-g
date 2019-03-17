<?php
$servername="localhost";
$username="root";
$password="sneha";
$dbname="contact";
$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("connection failed:" .$conn->connect_error);
}

echo 'connected successfully';
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$message=$_POST["message"];
$opt=$_POST["opt"];

$sql="INSERT INTO contacttab(firstname,lastname,email,phone,message,opt) VALUES ('$firstname','$lastname','$email','$phone','$message','$opt')";
if ()
if (!mysqli_query($conn,$sql)){

    echo 'inserted';
}
else{
    echo'not inserted';
 
}

header('location:/contact.php');

?>

