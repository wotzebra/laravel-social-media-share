<?php

namespace Codedor\SocialMediaLinks\Services;

use Codedor\SocialMediaLinks\Services\AbstractService;
use Illuminate\Support\Facades\Config;

class Clipboard extends AbstractService
{
    /** @var string */
    protected $icon;

    public function __construct()
    {
        $this->icon = Config::get('social-media-links.services.clipboard.icon');
        $this->linkPrefix = 'clipboard';
    }

    public function buildUrl(string $url, string $title)
    {
        return $this->buildLink('', $this->icon);
    }
}
