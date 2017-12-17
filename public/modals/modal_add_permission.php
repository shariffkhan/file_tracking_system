<div class="modal fade" id="<?php echo 'mypermission'.$staff1['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <div class="alert alert-info"><strong><center>Set User Permission </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">

                                <hr>

                                     <div class="control-group">
                                    <label class="control-label" for="inputPassword">File Type:</label>
                                    <div class="controls">
                                        <select type="text" name="permission" class = "form-control" >
                                            <option value="<?php echo $new_permission['security_level_id'];?>"><?php
                                            $group = new group();
                                            $group6 = $group->select_by_id($new_permission['security_level_id']);
                                                        echo $group6['name'];
                                            ?></option>
                                                <?php

                                              foreach ($group->select_by_id_not_selected($new_permission['security_level_id']) as $group5){ ?>
                                            <option value="<?php echo $group5['id'];?>"><?php echo $group5['name'];?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
								<div class = "modal-footer">
											 <button name = "<?php echo 'permission_go'.$staff1['id'];?>" id="sweet_basic"class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


								</div>
</form>
									   </div>



                                    </div>





                                </div>
                            </div>

<?php

if(isset($_POST['permission_go'.$staff1['id']])){
    $name = $_POST['permission'];

    $staff = new staff();
    $staff->update_security($name,$new_permission['id']);
}
?>
<script>
    // $(document).ready(function () {
    //     if (Array.prototype.forEach) {
    //         var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
    //         elems.forEach(function(html) {
    //             var switchery = new Switchery(html);
    //         });
    //     }
    //     else {
    //         var elems = document.querySelectorAll('.switchery');
    //         for (var i = 0; i < elems.length; i++) {
    //             var switchery = new Switchery(elems[i]);
    //         }
    //     }
    // });


</script>
