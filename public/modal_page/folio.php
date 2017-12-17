<div class="col-lg-4">
    <?php
    if($permission->haspermission('admin',$receiver['security_level_id'])){ ?>

        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myfolio">
            New Folio
        </button>

    <?php }
    ?>

				
                                  <section class="panel">
                                      <header class="panel-heading">
                              Folio List
                          </header>
                          <div class="table-responsive" >
                              
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Folio</th>
                                    <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  if(isset($_GET['page'])){
                                      $pageid = $_GET['page'];
                                  }
                                  $folio = new Folio();
                                  foreach ($folio->select_folio_id($pageid) as $folio1){ ?>
                                  <tr>
                                            <td><?php echo $folio1['id'];?></td>
                                            <td><a href="#"><?php echo $folio1['name'];?></a></td>
                                      <td><?php
                                          if($folio1['status'] == 1){
                                              echo 'Active';
                                          }else{
                                              echo 'closed';
                                          }
                                          ?></td>
                                  </tr>
                          <?php        } ?>
                              </tbody>
                            </table>
                          </div>
                      </section>
                              </div>
