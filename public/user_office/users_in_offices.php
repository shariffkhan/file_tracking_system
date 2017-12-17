<?php

if(isset($_GET['upper_office'])){
    $pageid = $_GET['upper_office'];
}

if($pageid != 0){ ?>
    <section class="panel">
        <header class="panel-heading">
            Users List
        </header>
        <div class="table-responsive" >
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Office</th>
                    <th>Security level</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $staff = new Staff();
                foreach ($staff->staff_section_level_list_id($pageid) as $staff2){
                    $staff_section_level_list_id = $staff2['inside_section_list_id'];
                    $sec_id = $staff2['security_level_id'];
                    ?>
                    <tr>
                        <td><?php echo $staff2['id']; ?></td>
                        <td><?php echo $staff2['fname']; ?></td>
                        <td><?php echo $staff2['middle']; ?></td>
                        <td><?php echo $staff2['lname']; ?></td>
                        <td>  <?php
                            $section_level_list = new Section_levels_list();
                            $section_level_list5 = $section_level_list->select_section_level_list_id($staff_section_level_list_id);
                            echo $section_level_list5['name'];
                            ?>
                        </td>
                        <?php
                        $sec = new security();
                        foreach ($sec->select_sec_id($sec_id) as $sec3){ ?>
                            <td><?php echo $sec3['levels']; ?></td>
                        <?php }
                        ?>
                        <td width="160">
                            <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="#myEdit">
                                Edit
                            </button>   </td>
                    </tr>
                <?php  }
                ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php
}
?>
