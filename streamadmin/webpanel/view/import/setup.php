<?php
$view_reply->add_swap_tag_string("html_title"," ~ Setup R4 connection");
$view_reply->set_swap_tag_string("page_title","R4 DB settings");
$form = new form();
$form->target("import/setconfig");
$form->required(true);
$form->col(6);
    $form->group("DB");
    $form->text_input("db_host","Host",999,"localhost","Host");
    $form->text_input("db_name","Name",999,"streamadminr4database","Database name");
    $form->text_input("db_username","Username",999,"dbusername","Database username");
    $form->text_input("db_pass","Password",999,"dbpass","Database password");
$view_reply->add_swap_tag_string("page_content",$form->render("Setup","primary"));
?>
