<?php
$template_parts["html_title"] .= " ~ Create";
$template_parts["page_title"] .= "Create new";
$template_parts["page_actions"] = "";
$form = new form();
$form->target("template/create");
$form->required(true);
$form->col(3);
    $form->text_input("name","Name",30,"","Name");
$form->split();
$form->col(6);
    $form->textarea("detail","Template [Object+Bot IM]",36,"","Use swap tags as the placeholders! max length 800");
$form->col(6);
    $form->textarea("notecarddetail","Notecard template",36,"","Use swap tags as the placeholder");
echo $form->render("Create","primary");
include("site/view/shared/swaps_table.php");
?>
