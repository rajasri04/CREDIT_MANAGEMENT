<body>
 <?php
     include('header.php');
?>
<div class="container-fluid" id="content">  
 <div class="row">
   <div class="col-sm-3">
	   <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php?PageName=user_info">SELECT USER</a></li>
        <li><a href="index.php?PageName=trans_history">TRANSACTION HISTORY</a></li>
        <li><a href="index.php?PageName=transfer_credit">TRANSFER CREDIT</a></li>
      </ul>
   </div>
  
   <div class="col-sm-9">    
		<?php
			if(!empty($_GET['PageName'])){
				$pagesdir = 'info';
				$info = scandir($pagesdir,0);
				//unset(info[0],info[1]);
				$PageName = $_GET['PageName'];
				if(in_array($PageName.'.php',$info)){
					include($pagesdir.'/'.$PageName.'.php');
				}	
			} 
		?> 
		<?php
		   if(isset($_REQUEST['se']) ? $_REQUEST['se'] : '')
		   {
			   include("search.php");
		   }
        ?>

    </div>
  </div>
</div>


</body>
