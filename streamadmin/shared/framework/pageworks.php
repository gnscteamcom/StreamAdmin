<?php
class templated
{
    protected $tempalte_parts = array();
    protected $render_layout = "[[topper]][[header]][[body_start]][[left_content]][[center_content]][[right_content]][[body_end]][[footer]]";
    protected $swaptags = array("@NL@"=>"\r\n","PAGE_TITLE"=>"","SITE_NAME"=>"","url_base"=>null,"META_TAGS"=>"");
    protected $redirect_enabled = false;
    protected $redirect_offsite = false;
    protected $redirect_to = "";
    protected $catche_version = "";
    function __construct($with_defaults=true)
    {
        if($with_defaults == true)
        {
            $this->tempalte_parts["topper"] = '<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN"
                                        "http://www.w3.org/TR/html4/loose.dtd">
                                    <html>';
            $this->tempalte_parts["header"] = '<head><title>[[PAGE_TITLE]] - [[SITE_NAME]]</title>[[META_TAGS]]</head>';
            $this->tempalte_parts["body_start"] = "<body>";
            $this->tempalte_parts["center_content"] = "";
            $this->tempalte_parts["left_content"] = "";
            $this->tempalte_parts["right_content"] = "";
            $this->tempalte_parts["body_end"] = "</body>";
            $this->tempalte_parts["footer"] = "</html>";

            // global patch (to be phased out)
            global $site_theme, $site_lang, $template_parts;
            $this->set_swap_tag_string("site_theme",$site_theme);
            $this->set_swap_tag_string("site_lang",$site_lang);
            $this->set_swap_tag_string("html_title","Page");
            if(is_array($template_parts) == true)
            {
                if(array_key_exists("html_title_after",$template_parts) == true)
                {
                    $this->set_swap_tag_string("html_title_after",$template_parts["html_title_after"]);
                    $this->site_name($template_parts["html_title_after"]);
                }
                else
                {
                    $this->set_swap_tag_string("html_title_after","StreamAdmin R7");
                    $this->site_name("StreamAdmin R7");
                }
                if(array_key_exists("url_base",$template_parts) == true)
                {
                    $this->set_swap_tag_string("url_base",$template_parts["url_base"]);
                    $this->url_base($template_parts["url_base"]);
                }
            }
            else
            {
                $this->set_swap_tag_string("html_title_after","StreamAdmin R7");
                $this->site_name("StreamAdmin R7");
            }
        }
    }
    public function set_cache_file(string $content,string $name,bool $with_module_tag=true)
    {
        global $module;
        $this->get_catche_version();
        $filename = $name;
        if($with_module_tag == true)
        {
            $filename .= $module;
        }
        $filename = base64_encode($filename);
        file_put_contents("catche/".$filename,$content);
    }
    public function purge_cache_file(string $name,bool $with_module_tag=true) : bool
    {
        global $module;
        $this->get_catche_version();
        $filename = $name;
        if($with_module_tag == true)
        {
            $filename .= $module;
        }
        $filename = base64_encode($filename);
        if(file_exists("catche/".$filename) == true)
        {
            unlink("catche/".$filename);
            if(file_exists("catche/".$filename) == true)
            {
                return false;
            }
        }
        return true;
    }
    public function get_cache_file(string $name,bool $with_module_tag=true) : ?string
    {
        global $module;
        $this->get_catche_version();
        $filename = $name;
        if($with_module_tag == true)
        {
            $filename .= $module;
        }
        $filename = "catche/".base64_encode($filename);
        if(file_exists($filename) == true)
        {
            return file_get_contents($filename);
        }
        else
        {
            return null;
        }
    }
    protected function create_cache_version_file()
    {
        global $slconfig;
        if(is_dir("catche") == false)
        {
            mkdir("catche");
        }
        if(file_exists("catche/version.info") == false)
        {
            file_put_contents("catche/version.info",$slconfig->get_db_version());
            $this->catche_version = $slconfig->get_db_version();
        }
        else
        {
            $this->catche_version = file_get_contents("catche/version.info");
        }
    }
    public function get_catche_version() : ?string
    {
        if($this->catche_version == null)
        {
            $this->create_cache_version_file();
        }
        $this->purge_cache();
        return $this->catche_version;
    }
    public function purge_cache()
    {
        global $slconfig;
        if($this->catche_version != null)
        {
            if(version_compare($slconfig->get_db_version(),  $this->catche_version) == 1)
            {
                // DB is newer force reload cache
                $this->delTree("catche");
                $this->create_cache_version_file();
            }
        }
        else
        {
            // force clear cache
            $this->delTree("catche");
            $this->create_cache_version_file();
        }
    }

    protected function delTree($dir)
    {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file)
        {
            if(is_dir($dir."/".$file) == true)
            {
                $this->delTree($dir."/".$file);
            }
            else
            {
                unlink($dir."/".$file);
            }
        }
        return rmdir($dir);
    }

    public function redirect(string $to,bool $offsite=false)
    {
        $this->redirect_enabled = true;
        $this->redirect_offsite = $offsite;
        $this->redirect_to = $to;
    }
    public function load_template(string $layout,string $theme,array $layout_entrys)
    {
        $this->render_layout = "";
        foreach($layout_entrys as $entry)
        {
            $this->render_layout .= "[[".$entry."]]";
            $this->load_template_file($layout,$theme,$entry);
        }
    }
    protected function load_template_part(string $check_for_file,string $bit) : bool
    {
        if(file_exists($check_for_file) == true)
        {
            $this->tempalte_parts[$bit] = file_get_contents($check_for_file);
            return true;
        }
        return false;
    }
    protected function load_template_file(string $layout,string $theme,string $bit)
    {
        if($this->load_template_part("theme/".$theme."/layout/".$layout."/".$bit.".layout",$bit) == false)
        {
            if($this->load_template_part("theme/shared/layout/".$bit.".layout",$bit) == false)
            {
                $this->tempalte_parts[$bit] = "";
            }
        }
    }
    public function get_swap_tag_string(string $tagname) : ?string
    {
        if(array_key_exists($tagname,$this->swaptags) == false)
        {
            $this->swaptags[$tagname] = null;
        }
        return $this->swaptags[$tagname];
    }
    public function add_swap_tag_string(string $tagname,string $add_me=null) : ?string
    {
        $current = $this->get_swap_tag_string($tagname);
        $current .= $add_me;
        $this->swaptags[$tagname] = $current;
        return $current;
    }
    public function set_swap_tag_string(string $tagname,string $newvalue=null) : ?string
    {
        $current = $this->get_swap_tag_string($tagname);
        if($current != $newvalue)
        {
            if($newvalue !== null)
            {
                $this->swaptags[$tagname] = $newvalue;
            }
        }
        return $this->swaptags[$tagname];
    }
    public function url_base(string $newvalue=null) : ?string
    {
        return $this->set_swap_tag_string("url_base",$newvalue);
    }
    public function page_title(string $newvalue=null) : ?string
    {
        return $this->set_swap_tag_string("PAGE_TITLE",$newvalue);
    }
    public function site_name(string $newvalue=null) : ?string
    {
        return $this->set_swap_tag_string("SITE_NAME",$newvalue);
    }
    public function meta_tags(string $add_tag=null) : array
    {
        if(array_key_exists("META_TAGS",$this->swaptags) == false)
        {
            $this->swaptags["META_TAGS"] = array();
        }
        if($update != null)
        {
            $this->swaptags["META_TAGS"][] = $add_tag;
        }
        return $this->swaptags["META_TAGS"];
    }
    public function render_page()
    {
        global $page,$module,$area;
        $this->set_swap_tag_string("MODULE",$module);
        $this->set_swap_tag_string("AREA",$area);
        $this->set_swap_tag_string("PAGE",$page);

        if($this->redirect_enabled == true)
        {
            if($this->redirect_offsite == true)
        	{
        		if (!headers_sent()) { header("Location: ".$this->redirect_to.""); }
                else print "<meta http-equiv=\"refresh\" content=\"0; url=".$this->redirect_to."\">";
        	}
        	else
        	{
                if($this->url_base() == null) $this->url_base("https://localhost");
        		if (!headers_sent()) { header("Location: ".$this->url_base()."".$this->redirect_to.""); }
                else print "<meta http-equiv=\"refresh\" content=\"0; url=".$this->url_base()."/".$this->redirect_to."\">";
        	}
        }
        else
        {
            $output = trim($this->render_layout);
            foreach($this->tempalte_parts as $key => $value)
            {
                $output = str_replace("[[".$key."]]",$value,$output);
            }
            foreach($this->swaptags as $key => $value)
            {
                $output = str_replace("[[".$key."]]",$value,$output);
            }
            foreach($this->swaptags as $key => $value)
            {
                $output = str_replace("[[".$key."]]",$value,$output);
            }
            $output = str_replace("@NL@","\n\r",$output);
            print $output;
        }
    }
}
$ajax_reply = new templated();
$ajax_reply->load_template("ajax","shared",array("ajax"));
$view_reply = new templated();
?>
