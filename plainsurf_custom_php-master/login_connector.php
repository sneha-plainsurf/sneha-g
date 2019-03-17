
<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "sneha";
$dbname = "contact";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}
echo 'connection Successfull ';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT username, password FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    if ($row) {

        if ($row['username' == "$username"]) {
            $cookie_name = "username";
            $cookie_value = "$username";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            $_SESSION['username'] = '$username';
            header("location:/contactdisplay.php", 301);
        }
    } else {
        header("location:/index.php", 301);
    }
}
?>