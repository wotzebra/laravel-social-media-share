<?php

namespace Codedor\SocialMediaShare\Services;

use Codedor\SocialMediaShare\Services\AbstractService;
use Illuminate\Support\Facades\Config;

/**
 * Class Telegram
 *
 * @package Codedor\SocialMediaShare
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Telegram extends AbstractService
{

    /** @var string */
    protected $base;
    /** @var string */
    protected $icon;

    public function __construct($options = [])
    {
        $this->options = $options;
        $this->icon = Config::get('social-media-share.services.telegram.icon');
        $this->base = Config::get('social-media-share.services.telegram.base_url');
    }

    public function buildUrl(string $url, string $title)
    {
        $baseUrl = $this->base .
        'text=' . urlencode($title) .
        '&url=' . $url;

        $link = $this->buildLink($baseUrl, $this->icon);

        return $link;
    }
}
