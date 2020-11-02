<?php

if (defined("correct") == true) {
    include "shared/framework/load.php";
    add_vendor("website");
    include "theme/streamadminr5/layout/install/template.php";
    $input = new inputFilter();
    if ($module == "owner") {
        include "installer/owner.php";
    } elseif ($module == "test") {
        include "installer/test.php";
    } elseif ($module == "install") {
        include "installer/install.php";
    } elseif ($module == "setup") {
        include "installer/setup.php";
    } elseif ($module == "final") {
        include "installer/final.php";
    } else {
        include "installer/dbconfig.php";
    }
    $view_reply->render_page();
} else {
    die("Please do not attempt to run installer directly it will break something!");
}
