<div class="col-lg-4">
                                  <section class="panel">
                                      <header class="panel-heading">
                              Cabinet List
                          </header>
                          <div class="table-responsive" >

                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Cabinet Number</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  if(isset($_GET['page'])){
                                      $pageid = $_GET['page'];
                                  }
                                  $filetype = new FileType();
                                  $filetype5 = $filetype->filetype_id($pageid);
                                      $cab = new cabinet();
                                      foreach ($cab->cabinet_filetype_id($filetype5['filetype_id']) as $cab3){ ?>
                                  <tr>
                                            <td><?php echo $cab3['cabinet_id'];?></td>
                                            <td><a href="cabinet_inside.php?page=<?php echo $cab3['cabinet_id']?>"><?php echo $cab3['name'];?></a></td>
                                  </tr>
                          <?php        } ?>
                              </tbody>
                            </table>
                          </div>
                      </section>
                              </div>
