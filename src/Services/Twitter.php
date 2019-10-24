<?php

namespace Codedor\SocialMediaLinks\Services;

use Codedor\SocialMediaLinks\Services\AbstractService;
use Illuminate\Support\Facades\Config;

/**
 * Class Twitter
 *
 * @package Codedor\SocialMediaLinks
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Twitter extends AbstractService
{

    /** @var string */
    protected $base = 'https://twitter.com/intent/tweet?';
    /** @var string */
    protected $icon;

    public function __construct()
    {
        $this->icon = Config::get('social-media-links.services.twitter.icon');
    }

    public function buildUrl(string $url, string $title)
    {
        $baseUrl = $this->base .
        'text=' . urlencode($title) .
        '&url=' . $url;

        $link = $this->buildLink($baseUrl, $this->icon);

        return $link;
    }

    public function getUrl(string $url, string $title)
    {
        $baseUrl = $this->base .
            'text=' . urlencode($title) .
            '&url=' . $url;

        return $baseUrl;
    }
}
