<?php
$conn = new mysqli('localhost', 'root', 'sneha', 'contact');
//check connection

if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
echo "connected successfully";
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$opt = $_POST['opt'];

//upload file in folder
$currentDir = getcwd();
$uploadDirectory = "/uploads/" .$filename;

$errors = []; // Store all foreseen and unforseen errors here

$fileExtensions = ['pdf', 'doc', 'png', 'jpg']; // Get all the file extensions

$fileName = time(). mt_rand(0, 1000).basename($_FILES['myfile']['name']);
$fileSize = $_FILES['myfile']['size'];
$fileTmpName = $_FILES['myfile']['tmp_name'];
$fileType = $_FILES['myfile']['type'];
$fileExtension = strtolower(end(explode('.', $fileName)));

$uploadPath = $currentDir . $uploadDirectory . basename($fileName);

if (isset($_POST['submit'])) {

    if (!in_array($fileExtension, $fileExtensions)) {
        $errors[] = "This file extension is not allowed. Please upload a PDF or DOC file";
    }

    if ($fileSize > 2000000) {
        $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            echo "The file " . basename($fileName) . " has been uploaded";
            $query = "INSERT INTO contacttab (firstname,lastname,email,phone,message,opt,myfile) VALUES ('$firstname','$lastname','$email','$phone','$message','$opt','$fileName')";

            if (mysqli_query($conn, $query)) {
                echo "records saved";
            } else {
                echo'not saved';
            }
            header("location:/contact.php", 301);
        } else {
            echo "An error occurred somewhere. Try again or contact the admin";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }
}
//file upload ends
//data insert into databases

//insert data ends
?>
mysqli_close();