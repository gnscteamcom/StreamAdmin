<?php
$input = new inputFilter();
$rental_uid = $input->postFilter("uid");
$rental = new rental();
$status = false;
if($rental->load_by_field("rental_uid",$rental_uid) == true)
{
    $stream = new stream();
    if($stream->load($rental->get_streamlink()) == true)
    {
        $server = new server();
        if($server->load($stream->get_serverlink()) == true)
        {
            $serverapi = new apis();
            if($serverapi->load($server->get_apilink()) == true)
            {
                $flags = array(
                    "autodjnext" => "opt_autodj_next",
                    "toggleautodj" => "opt_toggle_autodj",
                    "togglestate" => "opt_toggle_status",
                    "resetpw" => "opt_password_reset",
                );
                $status = true;
                echo "seeflags";
                foreach($flags as $key => $dataset)
                {
                    $state = 0;
                    $code = "get_".$dataset;
                    if($server->$code() == true)
                    {
                        if($serverapi->$code() == true)
                        {
                            $state = 1;
                        }
                    }
                    $reply[$key] = $state;
                }
            }
        }
    }
}
if($status == false)
{
    echo "none";
}
?>
