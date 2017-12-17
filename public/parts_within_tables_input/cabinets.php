<div class="col-lg-4">
							 <button class="btn btn-lg" data-toggle="modal" data-target="#mycab">
                              New Cabinet
                            </button>

                    <div class="panel">
                  <div class="panel-heading bg-white touch">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group2"><h6 class="panel-title text-teal">Cabinet List</h6></a>
                  </div>
                  <div id="accordion-styled-group2" class="panel-collapse collapse">
                    <div class="table-responsive" >

                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Cabinet Number</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $cab = new cabinet();
                                  foreach ($cab->select_cabinet() as $cab4){
                                    $id = $cab4['cabinet_id'];?>
                                  <tr>
                                            <td><?php echo $cab4['cabinet_id'];?></td>
                                            <td><a href="cabinet_inside.php?page=<?php echo $cab4['cabinet_id']?>"><?php echo $cab4['name'];?></a></td>
                                            <td>
                                                <a href="../delete/delete_cabinet.php<?php echo '?cabinet_id='.$id; ?>" role="button" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                                                                            <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#cab'.$cab4['cabinet_id'];?>">Edit
                                                                                            </button>
                                                                                        </td>
                                  </tr>
                          <?php
                                           $new_cabinet =  $cab->open_cabinets($cab4['cabinet_id']);
                                           $filetype = new FileType();
                                        include 'modals/modal_add_cabinets_edit.php';
                                  } ?>
                              </tbody>
                            </table>
                            <?php include ('modals/delete_product_modal.php');?>

                          </div>
                  </div>
                </div>
                              </div>
