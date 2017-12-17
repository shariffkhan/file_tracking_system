
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
                 $shelf = new Shelf();
                 foreach($shelf->shelf_cabinet_id($_POST['cabinet_id']) as $shelf3){?>
    <option value="<?php echo $shelf3['shelf_id'];?>"><?php echo $shelf3['name'];?></option>
               <?php }
                ?>
    </body>
</html>
