<?php
$view_reply->set_swap_tag_string("html_title"," System setup");
$view_reply->set_swap_tag_string("page_title"," Editing system setup");
$view_reply->set_swap_tag_string("page_actions","");
$slconfig = new slconfig();
$slconfig->load(1);
$avatar = new avatar();
$avatar->load($slconfig->get_owner_av());
$timezones_set = new timezones_set();
$timezones_set->loadAll();

$form = new form();
$form->target("slconfig/update/".$page."");
$form->required(true);
$form->col(6);
    $form->group("Core");
    $form->direct_add("Current owner: ".$avatar->get_avatarname()."<br/>");
    $form->text_input("owneravuid","Owner avatar UID <a data-toggle=\"modal\" data-target=\"#AvatarPicker\" href=\"#\" target=\"_blank\">Find</a>",8,$avatar->get_avatar_uid(),"Not a SL uuid!");
    $form->text_input("sllinkcode","Link code [SL->Server]",30,$slconfig->get_sllinkcode(),"The code shared by your vendors to connet");
    $form->text_input("publiclinkcode","Public Link code [SL->Server]",30,$slconfig->get_publiclinkcode(),"The code shared by your user hud");
    $form->text_input("httpcode","HTTP code [Apps->Server]",36,$slconfig->get_http_inbound_secret(),"Enter here");
if($session->get_ownerlevel() == 1)
{
    $form->col(6);
        $form->group("SMTP [Email sending support]");
        $form->text_input("smtp_from","From",30,$slconfig->get_smtp_from(),"From email address");
        $form->text_input("smtp_reply","Reply",30,$slconfig->get_smtp_replyto(),"Reply to email address");
        $form->text_input("smtp_host","Host",30,$slconfig->get_smtp_host(),"SMTP host");
        $form->text_input("smtp_user","Username",30,"skip","SMTP username (leave as skip to not update)");
        $form->text_input("smtp_code","Access code",30,"skip","SMTP access code [or password] (leave as skip to not update)");
        $form->text_input("smtp_port","Port",30,$slconfig->get_smtp_port(),"port to connect to for SMTP");
}
$form->col(6);
    $form->group("Resellers");
    $form->direct_add("<br/>");
    $form->select("new_resellers","Auto accept resellers",$slconfig->get_new_resellers(),array(false=>"No",true=>"Yes"));
    $form->text_input("new_resellers_rate","Auto accepted resellers rate (As a %)",36,$slconfig->get_new_resellers_rate(),"1 to 100");
$form->col(6);
    $form->direct_add("<br/>");
    $form->group("Feature packs");
    $form->select("event_storage","Event storage",$slconfig->get_eventstorage(),array(false=>"Disabled",true=>"Enabled"));
$form->col(6);
    $form->direct_add("<br/>");
    $form->group("Misc settings");
    $form->select("ui_tweaks_clients_fulllist","Clients [Full list]",$slconfig->get_clients_list_mode(),array(false=>"Disabled",true=>"Enabled"));
    $form->text_input("ui_tweaks_datatable_itemsperpage","Datatables items per page",3,$slconfig->get_datatable_itemsperpage(),"10 to 200");
    $form->text_input("api_default_email","API default email",3,$slconfig->get_api_default_email(),"Required to be a vaild email");
    $form->select("displaytimezonelink","Default timezone",$slconfig->get_displaytimezonelink(),$timezones_set->get_linked_array("id","name"));
$view_reply->set_swap_tag_string("page_content",$form->render("Update","primary"));
$view_reply->add_swap_tag_string("page_content","<hr/>
Feature packs<br/>
<ul>
<li>Event storage: Stores events into the database in an unlinked format, once im happy with the code the centova API engine uses this to automate ^+^</li>
</ul>
</p>");
?>
