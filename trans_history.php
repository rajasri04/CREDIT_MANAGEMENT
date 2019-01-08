<?php
     include('connect.php');
?>
<table class="table table-hover">
<thead>
<tr>
<th>id</th>
<th>sender</th>
<th>receiver</th>
<th>credit</th>
<th>status</th>
</tr>
</thead>
<?php
   $sql = "SELECT * FROM `transfer_details`";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result))    
   {
?>
<tbody>
        <tr>
        <td><?php   echo  $row["trans_id"]?></td>
		<td><?php   echo  $row["sender"]?></td>
		<td><?php   echo $row["receiver"]?></td>
		<td><?php   echo $row["credit"]?></td>
		<td><?php   echo $row["status"]?></td>
        </tr>
</tbody>		
<?php
   }
 }
?>