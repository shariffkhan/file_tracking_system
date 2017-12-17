<?php

class StaffPermission{

    protected $table = "User_permission";

    protected $fillable = [
        'is_admin'
    ];

    public static $defaults = [
        'is_admn'=>false
    ];
}

?>