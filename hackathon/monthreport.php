re<?php
require('header.php');
require('viewgreivances.class.php');
$vg=new Viewgrievance();
$result=$vg->getmonthlystatus();
require('adminnavbar.php');
?>

<br>
<br>
<div class="container">
<div class="card">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">GrievanceID</th>
      <th scope="col">Grievance Type</th>
      <th scope="col">Complaint</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
<?php 
 foreach ($result as $res): ?>
  <form action="update.php" method="POST">
    <tr>
      <td><?php 
         echo $res['grievanceid']; ?></td>
      <td><?php echo $res['gtype']; ?></td>
      <td><?php echo $res['complaint']; ?></td>
<td><?php echo $res['status']; ?></td>

       </form>>

    </tr>
<?php endforeach; ?>
  </tbody>

</table>
</div>
</div>
