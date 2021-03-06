<?php
$status = false;
$input = new inputFilter();
$avataruid = $input->postFilter("uid");

$avatar_where_config = array(
    "fields"=>array("avatar_uid","avatarname","avataruuid"),
    "matches"=>array("=","=","="),
    "values"=>array($avataruid,$avataruid,$avataruid),
    "types"=>array("s","s","s"),
    "join_with"=>array("(OR)","(OR)")
);
$avatar_set = new avatar_set();
$avatar_set->load_with_config($avatar_where_config);

if($avatar_set->get_count() == 1)
{
    $avatar = $avatar_set->get_first();
    $banlist = new banlist();
    if($banlist->load_by_field("avatar_link",$avatar->get_id()) == false)
    {
        $banlist = new banlist();
        $banlist->set_avatar_link($avatar->get_id());
        $create_status = $banlist->create_entry();
        if($create_status["status"] == true)
        {
            $status = true;
            $ajax_reply->set_swap_tag_string("message",$lang["banlist.create.ok"]);
            $ajax_reply->set_swap_tag_string("redirect","banlist");
        }
        else
        {
            $ajax_reply->set_swap_tag_string("message",$lang["banlist.create.failed.unabletocreate"]);
        }
    }
    else
    {
        $ajax_reply->set_swap_tag_string("message",$lang["banlist.create.failed.avataralreadybanned"]);
    }
}
else
{
    $ajax_reply->set_swap_tag_string("message",$lang["banlist.create.failed.noavatar"]);
}
?>
