
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
    <option value="">Select cabinet...</option>
                 <?php
                 $id = $_POST['filetype_id'];
                 $cab = new cabinet();
                 foreach ($cab->cabinet_filetype_id($id) as $cab5){?>
    <option value="<?php echo $cab5['cabinet_id'];?>"><?php echo $cab5['name'];?></option>
               <?php }
                ?>
    </body>
</html>
