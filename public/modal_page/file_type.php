<div class="col-lg-4">
                                  <section class="panel">
                                      <header class="panel-heading">
                              File Type List
                          </header>
                          <div class="table-responsive" >
                              
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>File Type</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $filetype = new FileType();
                                  foreach ($filetype->select_filetype() as $filetype1){ ?>
                                  <tr>
                                            <td><?php echo $filetype1['filetype_id'];?></td>
                                            <td><a href="table_files.php?page=<?php echo $filetype1['filetype_id']?>"><?php echo $filetype1['name'];?></a></td>
                                  </tr>
                          <?php        } ?>
                              </tbody>
                            </table>
                          </div>
                      </section>
                              </div>
