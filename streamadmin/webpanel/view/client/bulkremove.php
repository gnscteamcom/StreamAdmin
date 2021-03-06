<?php
$view_reply->set_swap_tag_string("html_title","Clients");
$view_reply->add_swap_tag_string("page_title","Bulk remove");
$view_reply->set_swap_tag_string("page_actions","");

$table_head = array("id","Action","Avatar","Server","Port","NoticeLevel","Expired");
$table_body = array();
$whereconfig = array(
    "fields" => array("expireunixtime"),
    "values" => array(time()),
    "types" => array("i"),
    "matches" => array("<="),
);
$rental_set = new rental_set();
$rental_set->load_with_config($whereconfig);
$server_set = new server_set();
$server_set->loadAll();
$avatar_set = new avatar_set();
$avatar_set->load_ids($rental_set->get_all_by_field("avatarlink"));
$stream_set = new stream_set();
$stream_set->load_ids($rental_set->get_all_by_field("streamlink"));
$notice_set = new notice_set();
$notice_set->load_ids($rental_set->get_all_by_field("noticelink"));
$apirequests_set = new api_requests_set();
$apirequests_set->loadAll();
$used_stream_ids = $apirequests_set->get_unique_array("streamlink");
$unixtime_oneday_ago = time() - $unixtime_day;
$hidden_clients = array();
foreach($rental_set->get_all_ids() as $rental_id)
{
    $rental = $rental_set->get_object_by_id($rental_id);
    $avatar = $avatar_set->get_object_by_id($rental->get_avatarlink());
    $stream = $stream_set->get_object_by_id($rental->get_streamlink());
    $server = $server_set->get_object_by_id($stream->get_serverlink());
    $notice = $notice_set->get_object_by_id($rental->get_noticelink());
    if(strlen($rental->get_message()) == 0)
    {
        if(in_array($stream->get_id(),$used_stream_ids) == false)
        {
            $entry = array();
            $entry[] = $rental->get_id();
            $action = '
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-danger">
                <input type="radio" value="purge" name="rental'.$rental->get_rental_uid().'" autocomplete="off"> Remove
              </label>
              <label class="btn btn-outline-secondary active">
                <input type="radio" value="keep" name="rental'.$rental->get_rental_uid().'" autocomplete="off" checked> Skip
              </label>
            </div>';
            if(($notice->get_id() == 6) && ($rental->get_expireunixtime() < $unixtime_oneday_ago))
            {
                $action = '
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-outline-danger active">
                    <input type="radio" value="purge" name="rental'.$rental->get_rental_uid().'" autocomplete="off" checked> Remove
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" value="keep" name="rental'.$rental->get_rental_uid().'" autocomplete="off"> Skip
                  </label>
                </div>';
            }
            $entry[] = $action;
            $entry[] = $avatar->get_avatarname();
            $entry[] = $server->get_domain();
            $entry[] = $stream->get_port();
            $entry[] = $notice->get_name();
            $entry[] = expired_ago($rental->get_expireunixtime());
            $table_body[] = $entry;
        }
        else
        {
            $hidden_clients[] = array("why"=>"Pending api request","rentaluid"=>$rental->get_rental_uid(),"avatar"=>$avatar->get_avatarname(),"port"=>$stream->get_port());
        }
    }
    else
    {
        $hidden_clients[] = array("why"=>"Message on account","rentaluid"=>$rental->get_rental_uid(),"avatar"=>$avatar->get_avatarname(),"port"=>$stream->get_port());
    }
}
if(count($table_body) > 0)
{
    $form = new form();
    $form->target("client/bulkremove");
    $form->col(12);
        $form->direct_add(render_datatable($table_head,$table_body));
    $view_reply->set_swap_tag_string("page_content",$form->render("Process","outline-danger"));
}
else
{
    $view_reply->set_swap_tag_string("page_content","No clients to remove right now");
}
if(count($hidden_clients) > 0)
{
    $view_reply->add_swap_tag_string("page_content","<hr/><h4>Unlisted clients</h4>");
    $table_head = array("Why","Rental UID","Avatar","Port");
    $table_body = array();
    foreach($hidden_clients as $hclient)
    {
        $entry = array();
        $entry[] = $hclient["why"];
        $entry[] = $hclient["rentaluid"];
        $entry[] = $hclient["avatar"];
        $entry[] = $hclient["port"];
        $table_body[] = $entry;
    }
    $view_reply->add_swap_tag_string("page_content",render_table($table_head,$table_body));
}
?>
