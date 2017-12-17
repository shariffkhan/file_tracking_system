
<div class="modal animated zoomIn" id="myuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="alert alert-info"><strong><center>New Users </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">

                                <hr>
				<div class="control-group">
                                           <label class="control-label" for="inputEmail">Id Number:</label>
                                           <input type="text" name="staff_id" class = "form-control" placeholder="Id Number">

                                 </div>
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">First Name:</label>
                                           <input type="text" name="fname" class = "form-control" placeholder="First Name">

                                 </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Middle Name:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="middle"  placeholder="Middle Name" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Last Name:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="lname"  placeholder="Last Name" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Email:</label>
                                    <div class="controls">
                                        <input type="email" class = "form-control"  name="email"  placeholder="Email" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Phone Number:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="phone"  placeholder="Phone Number" >
                                    </div>
                                </div>
                                  <div class="control-group">
                                    <label class="control-label" for="inputPassword">Office:</label>
                                    <div class="controls">
                                        <select type="text" name="department" id="inside_section_list_get2" class = "form-control" placeholder="Category" >
                                            <option value="">Office List...</option>
                                                <?php
                                                $section_level_list = new Section_levels_list();
                                                foreach ($section_level_list->select_section_level_list() as $section_level_list6){

                                                    $section_level = new Sections_level();
                                                    $section_level7 = $section_level->select_section_level_by_id($section_level_list6['section_levels_id']);
                                                    ?>
                                                    <option value="<?php echo $section_level_list6['sections_levels_list_id'];?>"><?php echo $section_level7['name'].'&nbsp; - &nbsp;'.$section_level_list6['name'];?></option>
                                             <?php   }
                                                ?>
                                        </select>
                                    </div>
                                </div>

								<div class = "modal-footer">
											 <button name = "go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


								</div>
                                    </form>
									   </div>



                                    </div>



									   <?php
                            if (isset($_POST['go'])) {
                                $staff_id = $_POST['staff_id'];
                                $fname = $_POST['fname'];
                                $middle = $_POST['middle'];
                                $lname = $_POST['lname'];
                                $department = $_POST['department'];
                                $security = 1;
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
                                $username = (substr($staff_id, strpos($staff_id,'/',9)+1)).$lname;
                                $password = (substr($staff_id, strpos($staff_id,'/',9)+1)).$lname;
                                if((!empty($staff_id)) and (!empty($fname)) and (!empty($middle))and (!empty($lname))and(!empty($department))and(!empty($security))and(!empty($email))and(!empty($phone))){
                                    $staff = new Staff();
                                    $check = $staff->check_staff();
                                    if(($check['staff_id'] != $staff_id) and ($check['phone'] != $phone) and ($check['email'] != $email)){
                                        $staff->insert_staff($staff_id, $fname, $middle, $lname, $department, $email, $phone, $username, $password, $security);

                                    }else{ ?>
                                    <script>
                                        alert('Sorry the user add already found');
                                    </script>
                                   <?php }

                                       }  else {?>
                                            <script>
                                                        alert('please input in all boxes');
                                            </script>
                              <?php  }
                            }
                            ?>




                                </div>
                            </div>
