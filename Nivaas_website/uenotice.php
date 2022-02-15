<?php
	require('top2.inc.php');
	
	

$sql = "select * from emergency_notice order by id desc";
$res = mysqli_query($con,$sql);

?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Emeregency Notice</h4>
						  
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>                                                 
                                       <th>Notice id</th>
									   <th>Notice text</th>
									   <th>Notice time</th>
									   <th> <th>
                                    </tr>
                                 </thead>
                                 <tbody>
									 <?php 
									 $i = 1;
									 while($row=mysqli_fetch_assoc($res)) {?>
										<tr>
										   <td class="serial"><?php echo $i ?></td>
										   <td><?php echo $row['id']?></td>
										   <td><?php echo $row['text']?></td>
										   <td><?php echo $row['time']?></td>
										   <td>
										   <?php							
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