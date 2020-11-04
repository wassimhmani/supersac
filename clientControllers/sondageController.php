<?php
include '../../../DBconnect/dbconnect.php';
$response = $lastValue = $id = "";
if (isset($_GET['response'])||isset($_GET['lastValue'])||isset($_GET['id'])) {
  $response =test_input($_GET["response"],$conn);
  $lastValue = test_input($_GET["lastValue"],$conn);
  $id = test_input($_GET["id"],$conn);
  $newVal=(int)$lastValue+1;

  switch ($response) {
  case "response1":
     $sql="update sondage set resultat_reponse1='$newVal' where id_sondage='$id'";
     break;
  case "response2":
     $sql="update sondage set resultat_reponse2='$newVal' where id_sondage='$id'";
     break;
  case "response3":
     $sql="update sondage set resultat_reponse3='$newVal' where id_sondage='$id'";
     break;
   }

echo $sql;
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
