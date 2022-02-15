<?php 
require('top2.inc.php');
$username = $_SESSION['ADMIN_USERNAME'];
$name = '';
$phno = '';
$email = '';
$event_name = '';
$starting_date = '';
$ending_date = '';

if (isset($_POST['submit'])){
	$name = get_safe_value($con, $_POST['name']);
	$phno = get_safe_value($con, $_POST['phno']);
	$email = get_safe_value($con, $_POST['email']);
	$event_name = get_safe_value($con, $_POST['event_name']);
	$starting_date = get_safe_value($con, $_POST['starting_date']);
	$ending_date = get_safe_value($con, $_POST['ending_date']);

	
	
	mysqli_query($con,"insert into common_plot_booking(name,email,phno,event_name,starting_date,ending_date) values('$name','$email','$phno','$event_name','$starting_date','$ending_date')");
	header('location:manage_booking.php');
		
}
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong> Common plot booking </strong></div>
                        <form method="post">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">Resident name</label>									
									<input type="text" name="name" placeholder="Enter the name of resident" class="form-control" required value="<?php echo $username ?>" readonly="readonly">									
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
									<label for="categories" class=" form-control-label">event name</label>									
									<input type="text" name="event_name" placeholder="Enter the name of the event" class="form-control" required value="<?php echo $event_name ?>">									
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">starting date</label>									
									<input type="date" name="starting_date" placeholder="Enter the starting date of the event" class="form-control" required value="<?php echo $starting_date ?>">									
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">ending date</label>									
									<input type="date" name="ending_date" placeholder="Enter the ending date of the event" class="form-control" required value="<?php echo $ending_date ?>">									
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