<?php 
require('top2.inc.php');
$username = $_SESSION['ADMIN_USERNAME'];
$name = '';
$phno = '';
$email = '';
$comment = '';


if (isset($_POST['submit'])){
	$name = get_safe_value($con, $_POST['name']);
	$phno = get_safe_value($con, $_POST['phno']);
	$email = get_safe_value($con, $_POST['email']);
	$comment = get_safe_value($con, $_POST['comment']);
	
	mysqli_query($con,"insert into contact_us(name,email,phn,comment) values('$name','$email','$phno','$comment')");
	header('location:manage_contactus.php');
		
}
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Contact us</strong><small></small></div>
                        <form method="post">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">Resident name</label>									
									<input type="text" name="name" placeholder="Enter the name of resident" class="form-control" required value="<?php echo $username ?>" readonly = "readonly">									
								</div>		
															
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Email</label>									
									<input type="text" name="email" placeholder="Enter Email address of resident" class="form-control" required value="<?php echo $email ?>">									
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Phone no.</label>									
									<input type="text" name="phno" placeholder="Enter the phone number of resident" class="form-control" required value="<?php echo $phno ?>">									
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">comment</label>									
									<input type="text" name="comment" placeholder="Enter the comment/feedback" class="form-control" required value="<?php echo $comment ?>">									
								</div>

								
								<button name = "submit" type="submit" class="btn btn-lg btn-info btn-block">
									<span id="payment-button-amount" >Submit</span>
								</button>
								
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