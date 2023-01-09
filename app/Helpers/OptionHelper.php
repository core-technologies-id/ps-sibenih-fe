<?php

use Carbon\Carbon;

if (!function_exists('option_selected')) {
    function option_selected($old, $new, $option_value) {
        $selected = "";
        if($old){
            if($old == $option_value){
                $selected = "selected";
            }
        } else {
            if($new == $option_value){
                $selected = "selected";
            }
        }
        return $selected;
    }
}

if (!function_exists('radio_selected')) {
    function radio_selected($old, $new, $option_value) {
        $checked = "";
        if($old){
            if($old == $option_value){
                $checked = "checked";
            }
        } else {
            if($new == $option_value){
                $checked = "checked";
            }
        }
        return $checked;
    }
}

?>