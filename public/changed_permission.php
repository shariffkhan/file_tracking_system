<?php
require_once '../Core/init.php';
$staff = new Staff();
$sec = new security();
foreach($staff->select_staff() as $staff1){
$depid = $staff1['inside_section_list_id'];
$secid = $staff1['security_level_id'];
?>
<tr>
<td><?php echo $staff1['id']; ?></td>
<td><?php echo $staff1['fname']; ?></td>
<td><?php echo $staff1['middle']; ?></td>
<td><?php echo $staff1['lname']; ?></td>
<td>  <?php
$dep = new Section_levels_list();
  $dep1 = $dep->select_section_level_list_id($depid);
    echo $dep1['name'];
          ?></td>
<?php
      foreach ($sec->select_sec_id($secid) as $sec1){?>
<td> <?php echo $sec1['levels']; ?></td>
     <?php }
          ?>
<td>

   <a href="#" role="button" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
   <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#mypermission'.$staff1['id'];?>">
       Permission
   </button>
</td>
</tr>
<?php
$new_permission = $staff->staff_id($staff1['id']);
include 'modals/modal_add_permission.php';
}
?>
