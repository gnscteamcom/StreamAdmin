<?php

namespace App\Endpoints\View\Stream;

use App\Models\ApisSet;
use App\Models\PackageSet;
use App\Models\ServerSet;
use App\Models\ServertypesSet;
use App\Template\Form;

class Create extends View
{
    public function process(): void
    {
        $this->output->addSwapTagString("html_title", " ~ Create");
        $this->output->addSwapTagString("page_title", " Create new stream");
        $this->setSwapTag("page_actions", "");

        $server_set = new ServerSet();
        $server_set->loadAll();

        $package_set = new PackageSet();
        $package_set->loadAll();

        $api_set = new ApisSet();
        $api_set->loadAll();

        $improved_serverlinker = [];
        foreach ($server_set->getAllIds() as $server_id) {
            $server = $server_set->getObjectByID($server_id);
            $api = $api_set->getObjectByID($server->getApilink());
            $improved_serverlinker[$server->getId()] = $server->getDomain() . " {" . $api->getName() . "}";
        }

        $servertypes_set = new ServertypesSet();
        $servertypes_set->loadAll();

        $autodjflag = [true => "{AutoDJ}",false => "{StreamOnly}"];
        $improved_packagelinker = [];
        foreach ($package_set->getAllIds() as $package_id) {
            $package = $package_set->getObjectByID($package_id);
            $servertype = $servertypes_set->getObjectByID($package->getServertypelink());
            $saddon = "";
            if ($package->getDays() > 1) {
                $saddon = "'s";
            }
            $saddon2 = "";
            if ($package->getListeners() > 1) {
                $saddon2 = "'s";
            }
            $info = $package->getName();
            $info .= " @ ";
            $info .= $package->getDays();
            $info .= "day";
            $info .= $saddon;
            $info .= " - ";
            $info .= $autodjflag[$package->getAutodj()];
            $info .= " - ";
            $info .= $servertype->getName();
            $info .= " - ";
            $info .= $package->getBitrate();
            $info .= "kbs";
            $info .= " - ";
            $info .= $package->getListeners();
            $info .= "listener";
            $info .= $saddon2;
            $improved_packagelinker[$package->getId()] = $info;
        }
        $form = new Form();
        $form->target("stream/create");
        $form->required(true);
        $form->col(6);
        $form->group("Basics");
        $form->numberInput("port", "port", null, 5, "Max 99999");
        $form->select("packagelink", "Package", 0, $improved_packagelinker);
        $form->select("serverlink", "Server", 0, $improved_serverlinker);
        $form->textInput("mountpoint", "Mountpoint", 999, "/live", "Stream mount point");
        $form->col(6);
        $form->group("Config");
        $form->textInput("adminusername", "Admin Usr", 5, null, "Admin username");
        $form->textInput("adminpassword", "Admin PW", 3, null, "Admin password");
        $form->textInput("djpassword", "Encoder/Stream password", 3, null, "Encoder/Stream password");
        $form->select("needswork", "Needs work", false, $this->yesNo);
        $form->directAdd("<br/>");
        $form->col(6);
        $form->group("API");
        $form->textInput("api_uid_1", "API UID 1", 10, null, "API id 1");
        $form->textInput("api_uid_2", "API UID 2", 10, null, "API id 2");
        $form->textInput("api_uid_3", "API UID 3", 10, null, "API id 3");
        $form->col(6);
        $form->group("Magic");
        $form->select("api_create", "Create on server", 0, $this->yesNo);
        $this->setSwapTag("page_content", $form->render("Create", "primary"));
        include "../App/View/Stream/api_linking.php";
    }
}
