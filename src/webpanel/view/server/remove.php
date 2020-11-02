<?php

$view_reply->add_swap_tag_string("html_title", " ~ Remove");
$view_reply->add_swap_tag_string("page_title", " Remove server:" . $page);
$view_reply->set_swap_tag_string("page_actions", "");

$form = new form();
$form->target("server/remove/" . $page . "");
$form->required(true);
$form->col(6);
$form->group("Warning</h4><p>If the server currenly in use this will fail</p><h4>");
$action = '
<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-outline-danger active">
    <input type="radio" value="Accept" name="accept" autocomplete="off" > Accept
  </label>
  <label class="btn btn-outline-secondary">
    <input type="radio" value="Nevermind" name="accept" autocomplete="off" checked> Nevermind
  </label>
</div>';
$form->direct_add($action);
$view_reply->set_swap_tag_string("page_content", $form->render("Remove", "danger"));
