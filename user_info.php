<div style="margin:20px;" align="center" >
 <form class="navbar-form navbar-left" action="index.php?PageName=user_info" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
       <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button>
</form>
<table class="table table-hover" id = "example">
<thead>
<tr>
<th></th>
<th>id</th>
<th>name</th>
<th>credit</th>
</tr>
</thead>
<?php
     include('connect.php');
?>
<script>
$(document).ready(function(){
  $('#example tr td a').hide();
  $('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});
</script>
<?php
    if(isset($_POST['search']))
   {
    $valueToSearch = $_POST['search'];
    $query = "SELECT * FROM `user_details` WHERE `name` LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
   }
   else {
    $query = "SELECT * FROM `user_details`";
    $search_result = filterTable($query);
   }
	function filterTable($query)
	{
		$connect = mysqli_connect("localhost", "root", "", "credit");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}
   //$sql = "SELECT id,name,credit FROM user_details";
   //$result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($search_result) > 0) {
   while($row = mysqli_fetch_assoc($search_result))    
   {
	   $se = $row["id"]
	   ?>
<tbody>
        <tr>
		<td><a href="index.php?se=<?php   echo  $se?>">Edit</a></td>
        <td><?php   echo  $row["id"]?></td>
		<td><?php   echo  $row["name"]?></td>
		<td><?php   echo $row["credit"]?></td>
        </tr>
</tbody>		
<?php
   }
   }

?>
</table>
</div>