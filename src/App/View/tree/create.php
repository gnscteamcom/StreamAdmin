<?php

namespace App\View\Tree;

use App\Template\Form;

class Create extends View
{
    public function process(): void
    {
        $this->output->addSwapTagString("html_title", " ~ Create");
        $this->output->addSwapTagString("page_title", " : New");
        $this->output->setSwapTagString("page_actions", "");
        $form = new Form();
        $form->target("tree/create");
        $form->required(true);
        $form->col(6);
        $form->textInput("name", "Name", 30, "", "Name");
        $this->output->setSwapTagString("page_content", $form->render("Create", "primary"));
    }
}
