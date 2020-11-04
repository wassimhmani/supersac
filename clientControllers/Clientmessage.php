<?php
include 'DBconnect/dbconnect.php';
$name = $email = $message = "";

if (isset($_POST['submit'])) {
  $name =test_input($_POST["name"],$conn);
  $email = test_input($_POST["email"],$conn);
  $message = test_input($_POST["message"],$conn);

$sql="INSERT INTO clientmessage VALUES('','$name','$email','$message','')";

if ($conn->query($sql) === TRUE) {
header('Location: ../');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

}
function test_input($data,$conn) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data= mysqli_real_escape_string($conn,$data);
  return $data;
}
 ?>
