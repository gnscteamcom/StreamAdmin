<?php

$current_sql = $sql;
$old_sql = new mysqli_controler();
$old_sql->sqlStart_test($r4_db_username, $r4_db_pass, $r4_db_name, false, $r4_db_host);

$sql = $old_sql; // switch to r4

$r4_items_set = new r4_items_set();
$r4_items_set->loadAll();

$r4_packages_set = new r4_packages_set();
$r4_packages_set->loadAll();

$r4_package_id_to_name = $r4_packages_set->getLinkedArray("id", "name");

include "shared/lang/control/stream/" . $site_lang . ".php";

$sql = $current_sql; // swtich back to r7

$servers_set = new server_set();
$servers_set->loadAll();

$package_set = new package_set();
$package_set->loadAll();

$package_name_to_id = $package_set->getLinkedArray("name", "id");
$server_domain_to_id = $servers_set->getLinkedArray("domain", "id");

$stream_created = 0;
$stream_skipped_no_package = 0;
$stream_skipped_no_server = 0;
$all_ok = true;

foreach ($r4_items_set->getAllIds() as $r4_item_id) {
    $r4_item = $r4_items_set->getObjectByID($r4_item_id);
    if (array_key_exists($r4_item->get_packageid(), $r4_package_id_to_name) == true) {
        $find_package = "R4|" . $r4_item->get_packageid() . "|" . $r4_package_id_to_name[$r4_item->get_packageid()] . "";
        if (array_key_exists($find_package, $package_name_to_id) == true) {
            if (array_key_exists($r4_item->get_streamurl(), $server_domain_to_id) == true) {
                $stream = new stream();
                $uid = $stream->createUID("stream_uid", 8, 10);
                if ($uid["status"] == true) {
                    $stream->setStream_uid($uid["uid"]);
                    $stream->setPackagelink($package_name_to_id[$find_package]);
                    $stream->setServerlink($server_domain_to_id[$r4_item->get_streamurl()]);
                    $stream->setPort($r4_item->get_streamport());
                    $stream->setNeedwork($r4_item->get_baditem());
                    $stream->setAdminpassword($r4_item->getAdminpassword());
                    $stream->setAdminusername($r4_item->getAdminusername());
                    $stream->setOriginal_adminusername($r4_item->getAdminusername());
                    $stream->setDjpassword($r4_item->get_streampassword());
                    $stream->setMountpoint("r4|" . $r4_item->getId() . "");
                    $create_status = $stream->createEntry();
                    if ($create_status["status"] == true) {
                        $stream_created++;
                    } else {
                        $this->output->addSwapTagString("page_content", sprintf($lang["stream.cr.error.14"], $create_status["message"]));
                        $all_ok = false;
                        break;
                    }
                } else {
                    $this->output->addSwapTagString("page_content", $lang["stream.cr.error.11"]);
                    $all_ok = false;
                    break;
                }
            } else {
                $stream_skipped_no_server++;
            }
        } else {
            $stream_skipped_no_package++;
        }
    } else {
        $stream_skipped_no_package++;
    }
}
if ($all_ok == true) {
    $this->output->addSwapTagString("page_content", "Created: " . $stream_created . " streams, " . $stream_skipped_no_server . " skipped (No server), " . $stream_skipped_no_package . " skipped (No package) <br/> <a href=\"[[url_base]]import\">Back to menu</a>");
} else {
    $sql->flagError();
}