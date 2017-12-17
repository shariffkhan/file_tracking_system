<div class="col-lg-4">

                                  <section class="panel">
                                      <header class="panel-heading">
                              Shelf List
                          </header>
                          <div class="table-responsive" >

                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Shelf</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
								                  $cab = new cabinet();
																	$cab6 = $cab->open_cabinets($pageid);
								                  $shelf = new Shelf();
                                  foreach ($shelf->shelf_cabinet_id($cab6['cabinet_id']) as $shelf1){
                                      ?>
                                  <tr>
                                            <td><?php echo $shelf1['shelf_id'];?></td>
                                            <td><a href="files_in_shelf.php?page=<?php echo $shelf1['shelf_id']; ?>"><?php echo $shelf1['name'];?></a></td>
                                  </tr>
                          <?php
                                  }?>
                              </tbody>
                            </table>
                          </div>
                      </section>
                              </div>
