<?php
    session_start();
    error_reporting(0);

    include_once 'lang.php';
   // include_once 'langx.php';
    include_once 'conf.php';
    $conf = new conf();
    $_SESSION['lang'] = $conf->lang;
   // $_SESSION['langx'] = $conf->langx;
    
    function get_text($place) {
        global $lang;
        return $lang[$place][$_SESSION['lang']];
    }

    // function get_paye() {
    //     global $langx;
    //     return $langx[$_SESSION['langx']][$_SESSION['lang']];
    // }   

?>


