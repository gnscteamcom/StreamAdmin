<?php
$template_parts["page_title"] .= " With status: Ready";
$server_set = new server_set();
$server_set->loadAll();
$whereconfig = array(
    "fields" => array("rentallink","needwork"),
    "values" => array(null,0),
    "types" => array("s","i"),
    "matches" => array("IS","="),
);
include("site/view/stream/with_status.php");
?>
