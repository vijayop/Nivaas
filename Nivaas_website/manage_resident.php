<?php 
require('top.inc.php');
$msg = '';
$name = '';
$phno = '';
$email = '';
$address = '';
$occupation = ''; 

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"Select * from resident where id='$id'");
	$check = mysqli_num_rows($res);
	if($check>0){	
		$row=mysqli_fetch_assoc($res);
		$name=$row['name'];
		$phno=$row['phno'];
		$email=$row['email'];
		$address=$row['address'];
		$occupation=$row['occupation'];
	}
	else{
		header('location:resident.php');
		die();
	}
}

if (isset($_POST['submit'])){
	$name = get_safe_value($con, $_POST['name']);
	$phno = get_safe_value($con, $_POST['phno']);
	$email = get_safe_value($con, $_POST['email']);
	$address = get_safe_value($con, $_POST['address']);
	$occupation = get_safe_value($con, $_POST['occupation']);
	$res=mysqli_query($con,"Select * from resident where phno='$phno'");
	$check = mysqli_num_rows($res);
	if($check>0){
		$msg = "resident already exists"; 
	}
	else{
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update resident set name='$name', phno='$phno', email='$email', address='$address', occupation='$occupation' where id = '$id'");
		}
		else{
			mysqli_query($con,"insert into resident(name,phno,email,address,occupation) values('$name','$phno','$email','$address','$occupation')");
		}
		header('location:resident.php');
		die();
	}
}
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Resident</strong><small> Form</small></div>
                        <form method="post">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">Resident name</label>									
									<input type="text" name="name" placeholder="Enter the name of resident" class="form-control" required value="<?php echo $name ?>">									
								</div>		
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Phone no.</label>									
									<input type="text" name="phno" placeholder="Enter the phone number of resident" class="form-control" required value="<?php echo $phno ?>">									
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Email</label>									
									<input type="text" name="email" placeholder="Enter Email address of resident" class="form-control" required value="<?php echo $email ?>">									
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">address</label>									
									<input type="text" name="address" placeholder="Enter the address of residence" class="form-control" required value="<?php echo $address ?>">									
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">occupation</label>									
									<input type="text" name="occupation" placeholder="Enter the occupation of the resident" class="form-control" required value="<?php echo $occupation ?>">									
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