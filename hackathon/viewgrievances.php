<?php
require('header.php');
require('viewgreivances.class.php');
$vg=new Viewgrievance();
$result=$vg->viewgrievance();
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
<?php $i=-1;
 foreach ($result as $res): ?>
  <form action="update.php" method="POST">
    <tr>
      <td><?php $i++;
         echo $res['grievanceid']; ?></td>
      <td><?php echo $res['gtype']; ?></td>
      <td><?php echo $res['complaint']; ?></td>

    <td>  <input type="hidden" value="<?php echo $res['grievanceid']; ?>" name="gid"/>
      <select class="form-control" name="status" required>
      <option value="processing" <?php if($res['status']=="processing") echo "selected";?>>processing</option>
      <option value="solved" <?php if($res['status']=="solved") echo "selected";?>>solved</option>
      <option value="rejected" <?php if($res['status']=="rejected") echo "selected";?>>rejected</option>
      <option value="new" disabled <?php if($res['status']=="new") echo "selected";?>>new</option>
       </select>
     </td>
      <td><input type="submit" name="submit" value="Update" class="btn btn-primary"></td></tr>
    </form>>

    </tr>
<?php endforeach; ?>
  </tbody>

</table>
</div>
</div>
