<?php 
session_start();
if(!isset($_SESSION['name'])){
  header("Location:/CEDCAB/login.php");
}
require_once '/opt/lampp/htdocs/CEDCAB/db.php';
$id=$_SESSION['id'];
$query= "SELECT * FROM `tbl_ride` WHERE customer_user_id='$id'";
$results = mysqli_query($conn,$query);
$records = mysqli_num_rows($results);

?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div >
<?php include "header.php"?></div>
<div class="container  ">
<table class="table" id="myTable">
    <thead>
      <tr>
      <th>ID</th>
        <th> Date</th>
        <th>Cab Type</th>
        <th>PICKUP</th>
       <th>Destination</th>
       <th>Total distance</th>
       <th>luggage</th>
       <th>Fare</th>
      
       <th>Customerid</th>
       <th>Action</th>
      </tr>
    </thead>
    <tbody>
     
          <?php
          
               if(!empty($records)){
                   while($row= mysqli_fetch_assoc($results))
                   { if($row['status']<1){ 
                       ?>
                         <tr>
                         <th><?php echo $row['ride_id']?></th>
                             <td><?php echo $row['ride_date']?></td>
                             <td><?php echo $row['cab_type']?></td>
                                <td><?php echo $row['from']?></td>
                                <td><?php echo $row['to']?></td>
                                <td><?php echo $row['total_distance']?></td>
                                <td><?php echo $row['luggage']?></td>
                                <td><?php echo $row['total_fare']?></td>
                                
                                <td><?php echo $row['customer_user_id']?></td>
                              
                               
        
                                <td>
                                  
                                 <a href="cancel.php?id=<?php echo $row['ride_id']?>"><button type="button" class="btn btn-outline-warning">Cancel</button></a>
                                 </td>
                                </tr>

                                <?php
                   }
               }
               
               
            }
          ?>
      



          
      
     
    </tbody>
  </table>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" >

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>