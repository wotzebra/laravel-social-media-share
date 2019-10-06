<?php

namespace Codedor\SocialMediaLinks\Services;

use Codedor\SocialMediaLinks\Services\AbstractService;
use Illuminate\Support\Facades\Config;

/**
 * Class Reddit
 *
 * @package Codedor\SocialMediaLinks
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Reddit extends AbstractService
{

    /** @var string */
    protected $base = 'https://www.reddit.com/submit?';
    /** @var string */
    protected $icon;

    public function __construct()
    {
        $this->icon = Config::get('social-media-links.services.reddit.icon');
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
