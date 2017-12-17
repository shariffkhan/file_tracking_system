<?php
require_once '../Core/init.php';
require_once 'login_include.php';
$permission = new permission();
$staff = new Staff();
$receiver = $staff->staff_one($session->staff_email);
                                  $file = new Files();
                                  foreach ($file->select_files() as $file2) {
                                      $modal_track_id = $file2['id'];
                                      ?>
                                      <tr>
                                          <td><?php echo $file2['id']; ?></td>
                                          <td><a href="inside_file.php?page=<?php echo $file2['id'];?>" title="Click to Open File"><?php echo $file2['file_id']; ?></a></td>
                                          <td><?php echo $file2['name']; ?></td>
                                          <td><?php echo $file2['volume']; ?></td>
                                          <td ><?php
                                              if($file2['is_open'] == 0){
                                                  echo "Closed";
                                              }else if($file2['is_open'] == 1){
                                                  if($file2['status'] == 0){
                                                      echo 'Onprocess ';
                                                  }else if($file2['status'] == 1){
                                                      echo 'Available ';
                                                  }
                                              }

                                              ?></td>
                                          <td>
                                              <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#'.$modal_track_id;?>">Location
                                              </button>
                                          </td>
                                          <?php
                                          if($permission->haspermission('admin',$receiver['security_level_id'])){ ?>

                                              <td>
                                                  <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#edit'.$modal_track_id; ?>">Edit
                                                  </button>
                                                  <a href="../delete/delete_file.php?file_id=<?php echo $modal_track_id;?>" role="button" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                                  <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#send'.$modal_track_id; ?>">Send
                                                  </button>

                                              </td>
                                          <?php }
                                          ?>

                                      </tr>
                                      <?php
                                      $new_sent = $file->files_id($modal_track_id);
                                      include 'modals/modal_send_file.php';


                                      if($file2['is_open'] == 0){ ?>
                                          <div id="<?php echo $modal_track_id; ?>" class="modal fade">
                                              <div class="modal-dialog">
                                                  <div class="modal-content">
                                                      <div class="modal-body">
                                                          <div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold">Current Location of The File
						                <button type="button" class="close" data-dismiss="alert">×</button>
                                                          </div>

                                                          <h6 class="text-semibold">File Name:</h6>
                                                          <p><?php
                                                              echo $file2['file_id'].'&nbsp;-&nbsp;'.$file2['name'];
                                                              ?>
                                                          </p>

                                                          <hr>
                                                          <h6 class="text-semibold"></h6>
                                                          <p>
                                                              File Location:&nbsp;<?php
                                                              echo 'Closed';
                                                              ?>
                                                          </p>
                                                      </div>

                                                      <div class="modal-footer">
                                                          <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      <?php }else if($file2['is_open'] == 1){
                                          if($file2['status'] == 0){ ?>
                                              <!-- start modal -->
                                              <div id="<?php echo $modal_track_id; ?>" class="modal fade">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-body">
                                                              <div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold">Current Location of The File
						                <button type="button" class="close" data-dismiss="alert">×</button>
                                                              </div>

                                                              <h6 class="text-semibold">File Name:</h6>
                                                              <p><?php
                                                                  echo $file2['file_id'].'&nbsp;-&nbsp;'.$file2['name'];
                                                                  ?>
                                                                  &nbsp; Folio:<?php
                                                                  $folio = new Folio();
                                                                  $folio3 = $folio->select_folio_fileid($file2['id']);
                                                                  echo $folio3['id'].' - '.$folio3['name'];
                                                                  ?>
                                                              </p>

                                                              <hr>
                                                              <h6 class="text-semibold"></h6>
                                                              <p>
                                                                  File Location:&nbsp;<?php
                                                                  $track = new Track();
                                                                  $max_me = $track->track_file_with_maxfile_id($modal_track_id);
                                                                  $tracked = $track->track_file_with_file_id($modal_track_id,$max_me['myid']);
                                                                  $staff = new Staff();
                                                                  $section_level_list = new Section_levels_list();
                                                                  $display = $section_level_list->select_section_level_list_id($tracked['receiver_id']);
                                                                  echo $display['name'];

                                                                  ?>

                                                                  &nbsp;&nbsp;Time sent:&nbsp;
                                                                  <?php   echo $tracked['time'];?>
                                                              </p>
                                                          </div>

                                                          <div class="modal-footer">
                                                              <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- end modal -->
                                          <?php }else if($file2['status'] == 1){?>
                                              <div id="<?php echo $modal_track_id; ?>" class="modal fade">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-body">
                                                              <div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold">Current Location of The File
						                <button type="button" class="close" data-dismiss="alert">×</button>
                                                              </div>

                                                              <h6 class="text-semibold">File Name:</h6>
                                                              <p><?php
                                                                  echo $file2['file_id'].'&nbsp;-&nbsp;'.$file2['name'];
                                                                  ?>
                                                                  &nbsp;
                                                                  Folio:<?php
                                                                  $folio = new Folio();
                                                                  $folio3 = $folio->select_folio_fileid($file2['id']);
                                                                  echo $folio3['id'].' - '.$folio3['name'];
                                                                  ?>
                                                              </p>

                                                              <hr>
                                                              <h6 class="text-semibold"></h6>
                                                              <p>
                                                                  File Location:&nbsp;<?php echo 'Registry Office'?>
                                                                  &nbsp; Cabinet:
                                                                  <?php
                                                                  $cab = new cabinet();
                                                                  $locate_cab = $cab->open_cabinets($file2['cabinet_id']);
                                                                  echo $locate_cab['name'];
                                                                  ?>
                                                                  &nbsp; Shelf:
                                                                  <?php
                                                                  $shelf = new Shelf();
                                                                  $locate_shelf= $shelf->open_shelfs($file2['shelf_id']);
                                                                  echo $locate_shelf['name'];
                                                                  ?>
                                                              </p>
                                                          </div>

                                                          <div class="modal-footer">
                                                              <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          <?php }
                                      }
                                      $new = $file->files_id($file2['id']);
                                      include('modals/modal_edit_files.php');
                                  }
                                  ?>