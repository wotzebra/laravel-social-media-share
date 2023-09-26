<?php

namespace Codedor\SocialMediaShare\Services;

use Illuminate\Support\Facades\Config;

class Clipboard extends AbstractService
{
    /** @var string */
    protected $icon;

    public function __construct($options = [])
    {
        $this->options = $options;

        $this->icon = Config::get('social-media-share.services.clipboard.icon');
        $this->linkPrefix = 'clipboard';
    }

    public function buildUrl(string $url, string $title)
    {
        return $this->buildLink('', $this->icon);
    }
}
