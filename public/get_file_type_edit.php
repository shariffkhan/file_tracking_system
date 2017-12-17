<?php
require_once '../Core/init.php';

$filetype = new FileType();
foreach ($filetype->select_filetype() as $filetype3){ ?>
    <tr >
        <td><?php echo $filetype3['filetype_id'];?></td>
        <td><a href="table_files.php?page=<?php echo $filetype3['filetype_id']?>"><?php echo $filetype3['name'];?></a></td>
        <td>
            <a href="../delete/delete_filetype.php?filetype_id=<?php echo $filetype3['filetype_id'];?>" role="button" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
            <button class="btn btn-success icon-large edit-user-info-link" data-toggle="modal" data-target="<?php echo '#'.$filetype3['filetype_id'];?>">Edit
            </button>
        </td>
    </tr>
    <?php
    $new_filetype = $filetype->filetype_id($filetype3['filetype_id']);

    include 'modals/modal_file_type_edit.php';
} ?>
