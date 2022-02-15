<?php 
require('top.inc.php');
$notice_id= '' ;
$notice_text = '';
$notice_time = '';
$msg = '';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"Select * from emergency_notice where id='$id'");
	$check = mysqli_num_rows($res);
	if($check>0){	
		$row=mysqli_fetch_assoc($res);
		$notice_id=$row['id'];
		$notice_text=$row['text'];
		$notice_time=$row['time'];
	}
	else{
		header('location:enotice.php');
		die();
	}
}

if (isset($_POST['submit'])){
	$notice_text = get_safe_value($con, $_POST['notice_text']);
	$res=mysqli_query($con,"Select * from emergency_notice where text='$notice_text'");
	$check = mysqli_num_rows($res);
	if($check>0){
		$msg = "Notice already exists"; 
	}
	else{
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update emergency_notice set text='$notice_text' where id = '$id'");
		}
		else{
			mysqli_query($con,"insert into emergency_notice(text,status) values('$notice_text',1)");
		}
		header('location:enotice.php');
		die();
	}
}
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Emergency Notice</strong><small> Form</small></div>
                        <form method="post">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">Notice_text</label>									
									<input type="text" name="notice_text" placeholder="Enter the notice" class="form-control" required value="<?php echo $notice_text ?>">									
								</div>		

								
								<button name = "submit" type="submit" class="btn btn-lg btn-info btn-block">
									<span id="payment-button-amount" >Submit</span>
								</button>
								<div class="field_error"> <?php echo $msg ?> </div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         

<?php 
require('footer.inc.php');
?>