<?php 
function isValidPhoneNumber($phone) {
    $pattern = '/^\d{10}$/'; 

    if (preg_match($pattern, $phone)) {
        return true;
    } else {
        return false;
    }
}
?>