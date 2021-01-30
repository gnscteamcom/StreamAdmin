<?php

namespace StreamAdminR7;

use App\Endpoint\Control\Template\Create as TemplateCreate;
use App\Endpoint\Control\Template\Remove as TemplateRemove;
use App\Endpoint\Control\Template\Update;
use App\Endpoint\View\Template\Create;
use App\Endpoint\View\Template\DefaultView;
use App\Endpoint\View\Template\Manage;
use App\Endpoint\View\Template\Remove;
use App\R7\Model\Template;
use PHPUnit\Framework\TestCase;

class TemplateTest extends TestCase
{
    public function test_Default()
    {
        $default = new DefaultView();
        $default->process();
        $statuscheck = $default->getOutputObject()->getSwapTagString("page_content");
        $missing = "Missing templates list element";
        $this->assertStringContainsString("<table",$statuscheck,$missing);
        $this->assertStringContainsString("name",$statuscheck,$missing);
        $this->assertStringContainsString("Icecast",$statuscheck,$missing);
        $this->assertStringContainsString("Shoutcast",$statuscheck,$missing);
    }

    /**
     * @depends test_Default
     */
    public function test_CreateForm()
    {
        $createform = new Create();
        $createform->process();
        $statuscheck = $createform->getOutputObject()->getSwapTagString("page_content");
        $missing = "Missing template create form element";
        $this->assertStringContainsString("Swaps",$statuscheck,$missing);
        $this->assertStringContainsString("Name",$statuscheck,$missing);
        $this->assertStringContainsString("Template [Object+Bot IM]",$statuscheck,$missing);
        $this->assertStringContainsString("Notecard template",$statuscheck,$missing);
        $this->assertStringContainsString("Create",$statuscheck,$missing);
        $this->assertStringContainsString("[[STREAM_MOUNTPOINT]]",$statuscheck,$missing);
        $this->assertStringContainsString("SuperAdmin",$statuscheck,$missing);
    }

    /**
     * @depends test_CreateForm
     */
    public function test_CreateProcess()
    {
        global $_POST;
        $createHandler = new TemplateCreate();
        $_POST["name"] = "UnitTest";
        $_POST["detail"] = "This is a test it is only a test";
        $_POST["notecardDetail"] = "This is a test it is only a test";
        $createHandler->process();
        $statuscheck = $createHandler->getOutputObject();
        $this->assertStringContainsString("Template created",$statuscheck->getSwapTagString("message"));
        $this->assertSame(true,$statuscheck->getSwapTagBool("status"),"Status check failed");
    }

    /**
     * @depends test_CreateProcess
     */
    public function test_ManageForm()
    {
        global $page;
        $template = new Template();
        $status = $template->loadByField("name","UnitTest");
        $this->assertSame(true,$status,"Unable to load test template");
        $page = $template->getId();

        $manageForm  = new Manage();
        $manageForm->process();
        $statuscheck = $manageForm->getOutputObject()->getSwapTagString("page_content");
        $missing = "Missing template manage form element";
        $this->assertStringContainsString("Swaps",$statuscheck,$missing);
        $this->assertStringContainsString("Name",$statuscheck,$missing);
        $this->assertStringContainsString("Template [Object+Bot IM]",$statuscheck,$missing);
        $this->assertStringContainsString("Notecard template",$statuscheck,$missing);
        $this->assertStringContainsString("Create",$statuscheck,$missing);
        $this->assertStringContainsString("[[STREAM_MOUNTPOINT]]",$statuscheck,$missing);
        $this->assertStringContainsString("SuperAdmin",$statuscheck,$missing);
        $this->assertStringContainsString("UnitTest",$statuscheck,$missing);
        $this->assertStringContainsString("This is a test it is only a test",$statuscheck,$missing);
    }

    /**
     * @depends test_ManageForm
     */
    public function test_ManageProcess()
    {
        global $page, $_POST;
        $template = new Template();
        $status = $template->loadByField("name","UnitTest");
        $this->assertSame(true,$status,"Unable to load test template");
        $page = $template->getId();

        $manageProcess = new Update();
        $_POST["name"] = "UnitTestUpdated";
        $_POST["detail"] = "This is a test it is only a test";
        $_POST["notecardDetail"] = "This is a test it is only a test";
        $manageProcess->process();
        $statuscheck = $manageProcess->getOutputObject();
        $this->assertStringContainsString("Template updated",$statuscheck->getSwapTagString("message"));
        $this->assertSame(true,$statuscheck->getSwapTagBool("status"),"Status check failed");
       
        $template = new Template();
        $status = $template->loadByField("name","UnitTestUpdated");
        $this->assertSame(true,$status,"Unable to load updated template");
    }

    /**
     * @depends test_ManageProcess
     */
    public function test_RemoveForm()
    {
        global $page;
        $template = new Template();
        $status = $template->loadByField("name","UnitTestUpdated");
        $this->assertSame(true,$status,"Unable to load test template");
        $page = $template->getId();

        $removeForm = new Remove();
        $removeForm->process();
        $statuscheck = $removeForm->getOutputObject()->getSwapTagString("page_content");
        $missing = "Missing template remove form element";
        $this->assertStringContainsString("If the template is currenly in use this will fail",$statuscheck,$missing);
        $this->assertStringContainsString("Accept",$statuscheck,$missing);
        $this->assertStringContainsString('<input type="radio" value="Nevermind" name="accept" autocomplete="off" checked',$statuscheck,$missing);
    }

    /**
     * @depends test_RemoveForm
     */
    public function test_RemoveProcess()
    {
        global $page, $_POST;
        $template = new Template();
        $status = $template->loadByField("name","UnitTestUpdated");
        $this->assertSame(true,$status,"Unable to load test template");
        $page = $template->getId();

        $removeProcess = new TemplateRemove();
        $_POST["accept"] = "Accept";
        $removeProcess->process();
        $statuscheck = $removeProcess->getOutputObject();
        $this->assertStringContainsString("Template removed",$statuscheck->getSwapTagString("message"));
        $this->assertSame(true,$statuscheck->getSwapTagBool("status"),"Status check failed");
    }
}
