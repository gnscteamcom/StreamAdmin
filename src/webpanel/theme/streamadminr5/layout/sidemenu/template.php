<?php

$view_reply->load_template(
    "sidemenu",
    "streamadminr5",
    array("topper","header","body_start","left_content","center_content","body_end","modals","footer")
);
$view_reply->set_swap_tag_string("html_menu", "");
$view_reply->set_swap_tag_string("page_title", "");
$view_reply->set_swap_tag_string("page_actions", "");
$view_reply->set_swap_tag_string("page_content", "");
$view_reply->set_swap_tag_string("html_title", "");
$view_reply->set_swap_tag_string("html_js_onready", "");
