<?php

namespace Codedor\SocialMediaLinks\Services;

use Codedor\SocialMediaLinks\Services\AbstractService;
use Illuminate\Support\Facades\Config;

/**
 * Class Pinterest
 *
 * @package Codedor\SocialMediaLinks
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Pinterest extends AbstractService
{

    /** @var string */
    protected $base = 'https://pinterest.com/pin/create/button/?url=';
    /** @var string */
    protected $icon;

    public function __construct()
    {
        $this->icon = Config::get('social-media-links.services.pinterest.icon');
    }

    public function buildUrl(string $url, string $title)
    {
        $link = $this->buildLink($this->base . $url, $this->icon);

        return $link;
    }

}
