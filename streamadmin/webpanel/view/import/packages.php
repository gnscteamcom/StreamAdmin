<?php
$current_sql = $sql;
$old_sql = new mysqli_controler();
$old_sql->sqlStart_test($r4_db_username,$r4_db_pass,$r4_db_name,false,$r4_db_host);

$sql = $old_sql; // switch to r4

$r4_packages_set = new r4_packages_set();
$r4_packages_set->loadAll();

$sql = $current_sql; // swtich back to r7

$template_set = new template_set();
$template_set->loadAll();

$template = $template_set->get_first();


include("shared/lang/control/package/".$site_lang.".php");

$all_ok = true;
$packages_created = 0;
foreach($r4_packages_set->get_all_ids() as $r4_package_id)
{
    $r4_package = $r4_packages_set->get_object_by_id($r4_package_id);
    $package = new package();
    $uid = $package->create_uid("package_uid",8,10);
    if($uid["status"] == true)
    {
        $package->set_package_uid($uid["uid"]);
        $package->set_name("R4|".$r4_package->get_id()."|".$r4_package->get_name());
        $package->set_autodj($r4_package->get_autoDJ());
        $package->set_audodj_size(0);
        $package->set_listeners($r4_package->get_users());
        $package->set_bitrate($r4_package->get_streamrate());
        $package->set_templatelink($template->get_id());
        $package->set_cost($r4_package->get_Lcost());
        $package->set_days($r4_package->get_sublength());
        if($r4_package->get_soldouttexture() == null) $package->set_texture_uuid_soldout("00000000-0000-0000-0000-000000000000");
        else $package->set_texture_uuid_soldout($r4_package->get_soldouttexture());

        if($r4_package->get_infotexture() == null) $package->set_texture_uuid_instock_small("00000000-0000-0000-0000-000000000000");
        else $package->set_texture_uuid_instock_small($r4_package->get_infotexture());

        if($r4_package->get_maintexture() == null) $package->set_texture_uuid_instock_selected("00000000-0000-0000-0000-000000000000");
        else $package->set_texture_uuid_instock_selected($r4_package->get_maintexture());

        $create_status = $package->create_entry();
        if($create_status["status"] == true)
        {
            $packages_created++;
        }
        else
        {
            $view_reply->add_swap_tag_string("page_content",sprintf($lang["package.cr.error.17"],$create_status["message"]));
            $all_ok = false;
            break;
        }
    }
    else
    {
        $view_reply->add_swap_tag_string("page_content",$lang["package.cr.error.16"]);
        $all_ok = false;
        break;
    }
}
if($all_ok == true)
{
    $view_reply->add_swap_tag_string("page_content","Created: ".$packages_created." packages <br/> <a href=\"[[url_base]]import\">Back to menu</a>");
}
else
{
    $sql->flagError();
}
?>
