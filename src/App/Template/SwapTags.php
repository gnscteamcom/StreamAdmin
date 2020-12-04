<?php

namespace App\Template;

abstract class SwapTags
{
    protected $swaptags = [
        "@NL@" => "\r\n",
        "PAGE_TITLE" => "",
        "SITE_NAME" => "",
        "url_base" => null,
        "META_TAGS" => "",
    ];
    public function getSwapTagString(string $tagname): ?string
    {
        if (array_key_exists($tagname, $this->swaptags) == false) {
            $this->swaptags[$tagname] = null;
        }
        return $this->swaptags[$tagname];
    }
    public function addSwapTagString(string $tagname, string $add_me = null): ?string
    {
        $current = $this->getSwapTagString($tagname);
        $current .= $add_me;
        $this->swaptags[$tagname] = $current;
        return $current;
    }
    public function setSwapTagString(string $tagname, string $newvalue = null): ?string
    {
        $current = $this->getSwapTagString($tagname);
        if ($current != $newvalue) {
            if ($newvalue !== null) {
                $this->swaptags[$tagname] = $newvalue;
            }
        }
        return $this->swaptags[$tagname];
    }
    public function urlBase(string $newvalue = null): ?string
    {
        return $this->setSwapTagString("url_base", $newvalue);
    }
    public function pageTitle(string $newvalue = null): ?string
    {
        return $this->setSwapTagString("PAGE_TITLE", $newvalue);
    }
    public function siteName(string $newvalue = null): ?string
    {
        return $this->setSwapTagString("SITE_NAME", $newvalue);
    }
    /**
     * metaTags
     * Creates a new metatag
     * @return mixed[]
     */
    public function metaTags(string $add_tag = null): array
    {
        if (array_key_exists("META_TAGS", $this->swaptags) == false) {
            $this->swaptags["META_TAGS"] = [];
        }
        $this->swaptags["META_TAGS"][] = $add_tag;
        return $this->swaptags["META_TAGS"];
    }
    protected function keypairReplace(string $output, array $oldpairs): string
    {
        $keypairs = [];
        foreach ($oldpairs as $key => $value) {
            $keypairs["[[" . $key . "]]"] = $value;
        }
        return strtr($output, $keypairs);
    }
}
