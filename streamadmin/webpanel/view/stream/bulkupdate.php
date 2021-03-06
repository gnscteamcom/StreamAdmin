<?php
$view_reply->set_swap_tag_string("html_title","Streams");
$view_reply->add_swap_tag_string("page_title"," Bulk update");
$view_reply->set_swap_tag_string("page_actions","");
$whereconfig = array(
    "fields" => array("needwork","rentallink"),
    "values" => array(1,null),
    "types" => array("i","i"),
    "matches" => array("=","IS"),
);
$stream_set = new stream_set();
$stream_set->load_with_config($whereconfig);
$server_set = new server_set();
$server_set->loadAll();

$table_head = array("id","Action","Server","Port","Encoder/Stream password","Admin Password");
$table_body = array();

foreach($stream_set->get_all_ids() as $streamid)
{
    $stream = $stream_set->get_object_by_id($streamid);
    $server = $server_set->get_object_by_id($stream->get_serverlink());
    if($stream->get_original_adminusername() == $stream->get_adminusername())
    {
        $action = '
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-outline-success">
            <input type="radio" value="update" name="stream'.$stream->get_stream_uid().'" autocomplete="off"> Update
          </label>
          <label class="btn btn-outline-secondary active">
            <input type="radio" value="skip" name="stream'.$stream->get_stream_uid().'" autocomplete="off" checked> Skip
          </label>
        </div>';
        $entry = array();
        $entry[] = $stream->get_id();
        $entry[] = $action;
        $entry[] = $server->get_domain();
        $entry[] = $stream->get_port();
        $adminpassword = '<input type="text" class="form-control" name="stream'.$stream->get_stream_uid().'adminpw" value="'.$stream->get_adminpassword().'" placeholder="Max 20 length">';
        $djpassword = '<input type="text" class="form-control" name="stream'.$stream->get_stream_uid().'djpw" value="'.$stream->get_djpassword().'" placeholder="Max 20 length">';
        $entry[] = $adminpassword;
        $entry[] = $djpassword;
        $table_body[] = $entry;
    }
}
if(count($table_body) > 0)
{
    $form = new form();
    $form->target("stream/bulkupdate");
    $form->col(12);
        $form->direct_add(render_datatable($table_head,$table_body));
    $view_reply->set_swap_tag_string("page_content",$form->render("Process","outline-warning"));
}
else
{
    $view_reply->set_swap_tag_string("page_content","No streams marked as need work");
}
?>
