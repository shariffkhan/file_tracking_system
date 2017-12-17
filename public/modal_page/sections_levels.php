
<?php
if((isset($_GET['level']))){

    $pageid = $_GET['level'];
}
if((isset($_GET['upper_office']))){

    $upper_office = $_GET['upper_office'];
}
        $levels = new levels();
        $level1 = $levels->levels();
$section_levels_list = new Section_levels_list();
    $section_levels = new Sections_level();
    foreach ($section_levels->select_level($pageid,$upper_office) as $section_level1) {
        ?>
        <div class="col-lg-4">
            <section class="panel">
                <header class="panel-heading">
                    <?php echo $section_level1['header']; ?>
                </header>
                <div class="table-responsive">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo $section_level1['name'] ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($section_levels_list->select_section_levels_list_by_section_levels_id($section_level1['level'],$section_level1['section_levels_id']) as $section_levels_list1) { ?>
                            <tr>
                                <td><?php echo $section_levels_list1['sections_levels_list_id']; ?></td>
                                <td>

                                    <a href="?level=<?php echo $section_levels_list1['level']+= 1; ?>&upper_office=<?php echo $section_levels_list1['sections_levels_list_id'];?>"><?php

                                        echo $section_levels_list1['name'];
                                        ?></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    <?php }


?>


