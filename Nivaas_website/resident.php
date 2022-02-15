<?php
	require('top.inc.php');
	
	
if(isset($_GET['type']) && $_GET['type']!=''){
	$type = get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id = get_safe_value($con,$_GET['id']);
		$delete_sql = "delete from resident where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql = "select * from resident order by id desc";
$res = mysqli_query($con,$sql);

?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Resident Table</h4>
						   <h4 class="box-link"><a href='manage_resident.php'>Add new resident<a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>                                                 
                                       <th>Resident id</th>
									   <th>Name</th>
									   <th>Phone no.</th>
									   <th>Email</th>
									   <th>Adress</th>
									   <th>Occupation</th>
									   <th> </th>
									   <th> </th>
									   
                                    </tr>
                                 </thead>
                                 <tbody>
									 <?php 
									 $i = 1;
									 while($row=mysqli_fetch_assoc($res)) {?>
										<tr>
										   <td class="serial"><?php echo $i ?></td>
										   <td><?php echo $row['id']?></td>
										   <td><?php echo $row['name']?></td>
										   <td><?php echo $row['phno']?></td>
										   <td><?php echo $row['email']?></td>
										   <td><?php echo $row['address']?></td>
										   <td><?php echo $row['occupation']?></td>
										   <td> </td>							  
										   <td>
										   <?php											
												echo "<span class='badge badge-edit'><a href='manage_resident.php?id=".$row['id']."'>Edit</a></span>&nbsp";
												echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp";
												$i = $i + 1;
										   ?></td>
										</tr>
									 <?php } ?>
								</tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
	require('footer.inc.php');
?>     