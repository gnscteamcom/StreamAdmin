<?php
$main_grid->add_content("<br/>",12);
$main_grid->close_row();
$main_grid->add_content($sub_grid_streams->get_output(),6);
$main_grid->add_content($sub_grid_clients->get_output(),6);
$main_grid->add_content("<br/>",12);
$main_grid->close_row();
$main_grid->add_content($sub_grid_servers->get_output(),6);
$main_grid->add_content($sub_grid_objects->get_output(),6);
$main_grid->close_row();
?>