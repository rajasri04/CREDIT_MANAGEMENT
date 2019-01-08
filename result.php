<?php
     include('connect.php');
?>
<?php
$sender = $_POST["uname"];
$receiver = $_POST["rname"];
$amt = $_POST["amt"];
$user_table = "user_details";
$sql = "SELECT credit FROM $user_table WHERE name ='$sender'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
$usrcrd = $row["credit"];
$ressql = "SELECT credit FROM $user_table WHERE name ='$receiver'";
$res = mysqli_query($conn, $ressql);
$rrow = mysqli_fetch_assoc($res); 
$recvcrd = $rrow["credit"];

if($usrcrd > $amt){
	$usrcrd = $usrcrd - $amt;
	$sql = "UPDATE  $user_table SET credit='$usrcrd' WHERE name ='$sender'";
	$ress = mysqli_query($conn, $sql);
    $recvcrd = $recvcrd + $amt;
	$sqli = "UPDATE  $user_table SET credit='$recvcrd' WHERE name ='$receiver'";
	if (mysqli_query($conn, $sqli)) {
			echo "<h4>TRANSACTION SUCCESSFULLY</h4>";
			$status = "passed";
	} else {
			echo "<h4>Error updating record: </h4>" . mysqli_error($conn);
			$status =  "failed - transaction error";
	}
}
    
else{
echo "<h4>INSUFFICIENT BALANCE</h4>";
$status =  "failed - insufficient balance";
}
$usql = "INSERT INTO `transfer_details` (`trans_id`, `sender`, `receiver`, `credit`, `status`) VALUES (NULL, '$sender', '$receiver', '$amt', '$status')";
mysqli_query($conn, $usql);
mysqli_close($conn);
?>