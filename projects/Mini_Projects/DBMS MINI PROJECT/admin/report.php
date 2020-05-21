<?php 

include('header.php');
include('sidebar.php');
include('../connection.php');

$From=$_REQUEST['From'];
$to=$_REQUEST['to'];





?>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {

        $('#example').DataTable();
    }); 
</script>
<div id="page-wrapper">
  <div class="graphs">
    <h3 class="blank1">View Consignment list</h3>

    <div class="xs tabls">
      <div class="bs-example4" data-example-id="contextual-table">
        <table class="table table-hover" id="example" class="display" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>S.No</th>
            <th>CCn</th>
              <th>Shipper name</th>
              <th>Shipper address</th>
              <th>Materail Description</th>
              <th>No of item</th>
              <th>Total weight</th>
              <th>Book at branch</th>
              <th>Location</th>
              <th>Booking Date</th>
              <th>Destination</th>
              <th>Shipment Charge</th>
              <th>status</th>
              
            </tr>
          </thead>
          <tbody>
          <?php 
            $sql="SELECT * FROM `consignment` WHERE `date_of_booking` LIKE '%$From%' OR `date_of_booking` LIKE '%$to%'";
            $res=mysqli_query($conn,$sql);
            $i=1;
            $total=0;
            while($ros=mysqli_fetch_array($res))
            {
              ?>
          <tr>
            <td><?php echo $i++;?></td>
             <td><?php echo $ros[18];?></td>
            <td><?php echo $ros[2];?></td>
            <td><?php echo $ros[3];?></td>
            <td><?php echo $ros[5];?></td>
            <td><?php echo $ros[6];     
            ?></td>
            <td><?php echo $ros[13];?></td>
            <td><?php  $branch=$ros[8];

            		$res1=mysqli_query($conn,"select * from branch where branch_id='$branch'");
            		$rss=mysqli_fetch_array($res1);

            		echo $rss['branchaddress'];

            ?></td>

             <td><?php echo $ros[9];?></td>
             <td><?php echo $ros[10];?></td>
             <td><?php echo $ros[11];?></td>
             <td><?php echo $ros[12];
             		   $total=$total+$ros[12];?></td>
             <td>consignment Recived by<?php echo $ros[15];?> relation friend</td>
          </tr>
          <?php

        }
        ?>

        <Tr>
        <td colspan="3">Total charge:-</td>
        <td colspan="3"><h4><?php echo  $total;?></h4></td>
        <td colspan="7"><a href="" id="click">Downlaod to Excel</a></td>
        </Tr>


       

          </tbody>


        </table>
      </div>
    </div>
  </div>
</div>

<?php

include('footer.php');
?>

<script type="text/javascript">
$(function(){
    $('#click').click(function(){
        var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
        location.href=url
        return false
    })
})
</script>