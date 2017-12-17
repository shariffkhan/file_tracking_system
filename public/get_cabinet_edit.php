
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

                 <?php
                 $id = $_POST['file_type_list_edit'];

                 $cab = new cabinet();
                 foreach ($cab->cabinet_filetype_id_edit($id) as $cab6_edit){?>
    <option value="<?php echo $cab6_edit['cabinet_id'];?>"><?php echo $cab6_edit['name'];?></option>
               <?php }
                ?>
    </body>
</html>
