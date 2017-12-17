
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>

    <?php
    require_once '../Core/init.php';
    ?>

</head>
<body>
<option value="0">None</option>
<?php
$id = $_POST['level']-1;
$section_level_list = new Section_levels_list();
foreach ($section_level_list->select_section_level_list_by_level($id) as $section_level_list12){?>
    <option value="<?php echo $section_level_list12['section_levels_id'];?>"><?php echo $section_level_list12['name'];?></option>
<?php }
?>
</body>
</html>
