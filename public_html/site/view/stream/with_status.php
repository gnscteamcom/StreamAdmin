<?php
$template_parts["page_actions"] = "";
$stream_set = new stream_set();
$stream_set->load_with_config($whereconfig);

$rental_set = new rental_set();
$rental_set->load_ids($stream_set->get_all_by_field("rentallink"));
$rental_set_ids = $rental_set->get_all_ids();

include("site/view/stream/render_list.php");
?>
