<?php
$view_reply->add_swap_tag_string("html_title"," ~ Create");
$view_reply->add_swap_tag_string("page_title"," Create new stream");
$view_reply->set_swap_tag_string("page_actions","");

$server_set = new server_set();
$server_set->loadAll();
$package_set = new package_set();
$package_set->loadAll();


$form = new form();
$form->target("stream/create");
$form->required(true);
$form->col(6);
    $form->group("Basics");
    $form->number_input("port","port",null,5,"Max 99999");
    $form->select("packagelink","Package",0,$package_set->get_linked_array("id","name"));
    $form->select("serverlink","Server",0,$server_set->get_linked_array("id","domain"));
    $form->text_input("mountpoint","Mountpoint",999,"/live","Stream mount point");
$form->col(6);
    $form->group("Config");
    $form->text_input("adminusername","Admin Usr",5,null,"Admin username");
    $form->text_input("adminpassword","Admin PW",3,null,"Admin password");
    $form->text_input("djpassword","Encoder/Stream password",3,null,"Encoder/Stream password");
    $form->select("needswork","Needs work",false,array(false=>"No",true=>"Yes"));
$view_reply->set_swap_tag_string("page_content",$form->render("Create","primary"));
?>
