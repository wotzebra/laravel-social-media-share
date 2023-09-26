<?php

namespace Codedor\SocialMediaShare\Services;

use Illuminate\Support\Facades\Config;

/**
 * Class Reddit
 *
 * @package Codedor\SocialMediaShare
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Reddit extends AbstractService
{

    /** @var string */
    protected $base;
    /** @var string */
    protected $icon;

    public function __construct($options = [])
    {
        $this->options = $options;
        $this->icon = Config::get('social-media-share.services.reddit.icon');
        $this->base = Config::get('social-media-share.services.reddit.base_url');
    }

    public function buildUrl(string $url, string $title)
    {
        $baseUrl = $this->base .
        'title=' . urlencode($title) .
        '&url=' . $url;

        $link = $this->buildLink($baseUrl, $this->icon);

        return $link;
    }
}
