<?php

$view_reply->add_swap_tag_string("html_title", " ~ Create");
$view_reply->add_swap_tag_string("page_title", " Create new");
$view_reply->set_swap_tag_string("page_actions", "");
$form = new form();
$form->target("template/create");
$form->required(true);
$form->col(3);
    $form->text_input("name", "Name", 30, "", "Name");
$form->split();
$form->col(6);
    $form->textarea("detail", "Template [Object+Bot IM]", 800, "", "Use swap tags as the placeholders! max length 800");
$form->col(6);
    $form->textarea("notecarddetail", "Notecard template", 2000, "", "Use swap tags as the placeholder");
$view_reply->set_swap_tag_string("page_content", $form->render("Create", "primary"));
include "webpanel/view/shared/swaps_table.php";
