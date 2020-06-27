<?php
$template_parts["page_actions"] = "";
$stream_set = new stream_set();
$stream_set->load_with_config($whereconfig);

$rental_set = new rental_set();
$rental_set->load_ids($stream_set->get_all_by_field("rentallink"));
$rental_set_ids = $rental_set->get_all_ids();

$table_head = array("id","UID","Server","Port","Status");
$table_body = array();

foreach($stream_set->get_all_ids() as $streamid)
{
    $stream = $stream_set->get_object_by_id($streamid);
    $server = $server_set->get_object_by_id($stream->get_serverlink());
    $entry = array();
    $entry[] = $stream->get_id();
    $entry[] = '<a href="[[url_base]]stream/manage/'.$stream->get_stream_uid().'">'.$stream->get_stream_uid().'</a>';
    $entry[] = $server->get_domain();
    $entry[] = $stream->get_port();
    if($stream->get_needwork() == false)
    {
        if($stream->get_rentallink() != null)
        {
            if(in_array($stream->get_rentallink(),$rental_set_ids) == true)
            {
                $rental = $rental_set->get_object_by_id($stream->get_rentallink());
                $entry[] = '<a href="[[url_base]]client/manage/'.$rental->get_rental_uid().'">Sold</a>';
            }
            else $entry[] = "Rented but cant find rental.";
        }
        else $entry[] = "Ready";
    }
    else $entry[] = "Need work";
    $table_body[] = $entry;
}
echo render_datatable($table_head,$table_body);
?>
