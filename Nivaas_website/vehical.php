<?php
	require('top.inc.php');
	
	if(isset($_GET['type']) && $_GET['type']!=''){
	$type = get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation = get_safe_value($con,$_GET['operation']);
		$id = get_safe_value($con,$_GET['id']);
		
		if($operation=='active'){
			$status = '1';
		}else{
			$status = '0'; 
		}
		
		$update_status_sql = "update notice set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
}
if(isset($_GET['type']) && $_GET['type']!=''){
	$type = get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id = get_safe_value($con,$_GET['id']);
		$delete_sql = "delete from vehicle where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql = "select * from vehicle order by id desc";
$res = mysqli_query($con,$sql);
	
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">vehical list </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>                                       
                                       <th>vehicle id </th>
                                       <th>Number plate</th>
                                       <th>Arrival time </th>
									   <th>Departure time </th>	
									   <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									 $i = 1;
									 while($row=mysqli_fetch_assoc($res)) {?>
										<tr>
										   <td class="serial"><?php echo $i ?></td>
										   <td><?php echo $row['id']?></td>
										   <td><?php echo $row['number_plate']?></td>
										   <td><?php echo $row['arrival_time']?></td>
										   <td><?php echo $row['departure_time']?></td>
										   <td>
										   <?php												
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