<?php
$transaction_set = new transactions_set();
$transaction_set->load_newest(30);

$package_set = new package_set();
$region_set = new region_set();
$avatar_set = new avatar_set();

$package_set->load_ids($transaction_set->get_all_by_field("packagelink"));
$region_set->load_ids($transaction_set->get_all_by_field("regionlink"));
$avatar_set->load_ids($transaction_set->get_all_by_field("avatarlink"));

$view_reply->add_swap_tag_string("page_title"," Newest 30");
include("webpanel/view/transactions/render_list.php");
include("webpanel/view/transactions/range_form.php");
?>
