<div class="col-lg-6">
	<button class="btn btn-lg" data-toggle="modal" data-target="#mytable_name">
								 New Table name
							 </button>

                            <div class="panel">
                  <div class="panel-heading bg-white touch">

                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group6"><h6 class="panel-title text-teal">Deputy Rector's List</h6></a>

                  </div>
                  <div id="accordion-styled-group6" class="panel-collapse collapse">
<div class="table-responsive" >

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Section Head</th>
					<th>Level</th>
					<th>Action</th>
			</tr>
		</thead>
		<tbody>
				<?php
				$section_level = new Sections_level();
				foreach ($section_level->select_section_level() as $section_level3){ ?>
				<tr>
									<td><?php echo $section_level3['section_levels_id'];?></td>
									<td><?php echo $section_level3['name'];?></td>
						<td><?php echo $section_level3['level'];?></td>
						<td>
								<a href="../delete/delete_section_level_table_name.php?table_id=<?php echo $section_level3['section_levels_id'];?>" role="button" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
								<button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#table_name'.$section_level3['section_levels_id'];?>">Edit
								</button>
						</td>
				</tr>
<?php

					 $section_level = new Sections_level();
					 $new_section_level = $section_level->select_section_level_by_id($section_level3['section_levels_id']);
					 include 'modals/modal_add_tables_name_edit.php';
				} ?>
		</tbody>
	</table>
                          </div>
                  </div>
                </div>
                              </div>
