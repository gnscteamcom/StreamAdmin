<?php

$now = time();
$outofscope = false;
if ($sentunixtime > $now) {
    if ($sentunixtime > ($now + $timewindow)) {
        $outofscope = true;
    }
} elseif ($sentunixtime < $now) {
    if ($sentunixtime < ($now - $timewindow)) {
        $outofscope = true;
    }
}
if ($outofscope == false) {
    include "endpoints/api_public/start_step3.php";
} else {
    echo $lang["start_step2_scope"];
}
