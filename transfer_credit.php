<?php
    include('connect.php');
    if(isset($_POST['id'])){
		$id = $_POST['id'];
?>
<div class="container">
  <form class="form-horizontal"  name="transfer" action="index.php?PageName=result"  method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" >SENDER:</label>
      <div class="col-sm-5">
	  <?php
	           $sql = "SELECT name FROM `user_details` where id = '$id'";
			   $result = mysqli_query($conn, $sql);
			   if (mysqli_num_rows($result) > 0) {
			      $row = mysqli_fetch_assoc($result)   
	  ?>
	           <input type="hidden"  placeholder="Enter amount to transfer" name="uname" value = "<?php echo  $row["name"]?>" required/>
	           <h3><span class="label label-default"><?php echo  $row["name"]?></span></h3>
       <?php
			   }
       ?>
	  
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >AMOUNT:</label>
      <div class="col-sm-5">
        <input type="name" class="form-control" id="amt" placeholder="Enter amount to transfer" name="amt" required/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">RECEIVER:</label>
      <div class="col-sm-5">   
        	    <select class="form-control" id="sel1" name = "rname">
	  <?php
	           $sql = "SELECT name FROM `user_details`";
			   $result = mysqli_query($conn, $sql);
			   if (mysqli_num_rows($result) > 0) {
			   while($row = mysqli_fetch_assoc($result))    
			   {
	  ?>
	       <option><?php echo  $row["name"]?></option>
       <?php
			   }
			   }
       ?>
	   </select>	
      </div>	   
    </div>
	<h3 id="demo"></h3>
	 <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-2">
        <input type="submit" class="btn btn-default"  value = "submit"/>
      </div>
     </div>
    </form>
    <?php
	}
	else{
		echo "<h2>FIRST!!!</h2><h3>select user who want to send credit </h3>";
	}
	?>
  
</div>
