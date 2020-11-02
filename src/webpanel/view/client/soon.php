<?php

$whereconfig = array(
    "fields" => array("expireunixtime","expireunixtime"),
    "values" => array(time() + $unixtime_day,time()),
    "types" => array("i","i"),
    "matches" => array("<=",">"),
);
$view_reply->add_swap_tag_string("page_title", " With status: Expires soon");
include "webpanel/view/client/with_status.php";
