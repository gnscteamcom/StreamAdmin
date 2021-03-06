<?php
$view_reply->add_swap_tag_string("html_title"," ~ Manage");
$view_reply->add_swap_tag_string("page_title"," Editing stream");
$view_reply->set_swap_tag_string("page_actions","<a href='[[url_base]]stream/remove/".$page."'><button type='button' class='btn btn-danger'>Remove</button></a>");

$template_set = new template_set();
$template_set->loadAll();
$stream = new stream();
if($stream->load_by_field("stream_uid",$page) == true)
{
    $server_set = new server_set();
    $server_set->loadAll();
    $package_set = new package_set();
    $package_set->loadAll();

    $form = new form();
    $form->target("stream/update/".$page."");
    $form->required(true);
    $form->col(6);
        $form->group("Basics");
        $form->number_input("port","port",$stream->get_port(),5,"Max 99999");
        $form->select("packagelink","Package",$stream->get_packagelink(),$package_set->get_linked_array("id","name"));
        $form->select("serverlink","Server",$stream->get_serverlink(),$server_set->get_linked_array("id","domain"));
        $form->text_input("mountpoint","Mountpoint",999,$stream->get_mountpoint(),"Stream mount point");
    $form->col(6);
        $form->group("Config");
        $form->text_input("original_adminusername","Original admin Usr",5,$stream->get_original_adminusername(),"original adminusername [Restored by API if enabled]");
        $form->text_input("adminusername","Admin Usr",5,$stream->get_adminusername(),"Admin username");
        $form->text_input("adminpassword","Admin PW",3,$stream->get_adminpassword(),"Admin password");
        $form->text_input("djpassword","Encoder/Stream password",3,$stream->get_djpassword(),"Encoder/Stream password");
    $view_reply->set_swap_tag_string("page_content",$form->render("Update","primary"));
}
else
{
    $view_reply->redirect("stream?bubblemessage=unable to find stream&bubbletype=warning");
}
?>
