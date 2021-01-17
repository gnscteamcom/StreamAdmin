<?php

namespace App\Endpoints\Control\Client;

use App\Models\Avatar;
use App\Models\Package;
use App\Models\Rental;
use App\Models\Server;
use App\Models\Stream;
use App\Template\ViewAjax;
use swapables_helper;

class Getnotecard extends ViewAjax
{
    public function process(): void
    {
        $rental = new Rental();
        if ($rental->loadByField("rental_uid", $this->page) == false) {
            $this->setSwapTag("message", "Unable to load rental");
        }
        $this->setSwapTag("status", "true");
        $avatar = new Avatar();
        $avatar->loadID($rental->getAvatarlink());

        $stream = new Stream();
        $stream->loadID($rental->getStreamlink());

        $package = new Package();
        $package->loadID($stream->getPackagelink());

        $server = new Server();
        $server->loadID($stream->getServerlink());

        $viewnotecard = ""
        . "Assigned to: [[AVATAR_FULLNAME]][[NL]]"
        . "===========================[[NL]][[NL]]"
        . "Package: [[PACKAGE_NAME]][[NL]]"
        . "Listeners: [[PACKAGE_LISTENERS]][[NL]]"
        . "Bitrate: [[PACKAGE_BITRATE]]kbps[[NL]]"
        . "===========================[[NL]][[NL]]"
        . "Control panel: [[SERVER_CONTROLPANEL]][[NL]]"
        . "ip: [[SERVER_DOMAIN]][[NL]]"
        . "port: [[STREAM_PORT]][[NL]]"
        . "===========================[[NL]][[NL]]"
        . "Admin user: [[STREAM_ADMINUSERNAME]][[NL]]"
        . "Admin pass: [[STREAM_ADMINPASSWORD]][[NL]]"
        . "Encoder/Stream password: [[STREAM_DJPASSWORD]][[NL]]"
        . "===========================[[NL]][[NL]]"
        . "Expires: [[RENTAL_EXPIRES_DATETIME]]";
        $swapables_helper = new swapables_helper();
        $this->setSwapTag(
            "message",
            $swapables_helper->get_swapped_text($viewnotecard, $avatar, $rental, $package, $server, $stream)
        );
    }
}
