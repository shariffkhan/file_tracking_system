<?php

function redirect_to($location = NULL){
    if($location != NULL){
        header("Location: {$location}");
        exit;
    }
}

function output_massage($message = ""){
    if(!empty($message)){
        return "<p class = \"message\">{$message}</p>";
    }else{
            return "";
    }

}