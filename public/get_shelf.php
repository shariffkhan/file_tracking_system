
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
    <option value="">Select shelf...</option>
                 <?php

                 $shelf = new Shelf();
                 foreach($shelf->shelf_cabinet_id($_POST['cabinet_id']) as $shelf2){?>
    <option value="<?php echo $shelf2['shelf_id'];?>"><?php echo $shelf2['name'];?></option>
               <?php }
                ?>
    </body>
</html>
