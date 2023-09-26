<?php

namespace Codedor\SocialMediaShare\Services;

use Illuminate\Support\Facades\Config;

/**
 * Class Facebook
 *
 * @package Codedor\SocialMediaShare
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Facebook extends AbstractService
{

    /** @var string */
    protected $base;
    /** @var string */
    protected $icon;

    public function __construct($options = [])
    {
        $this->options = $options;

        $this->base = Config::get('social-media-share.services.facebook.base_url');
        $this->icon = Config::get('social-media-share.services.facebook.icon');
    }

    public function buildUrl(string $url, string $title)
    {
        $link = $this->buildLink($this->base . $url, $this->icon);

        return $link;
    }

    public function getUTMUrl(string $url, string $title)
    {
        return $this->base . $url;
    }
}
