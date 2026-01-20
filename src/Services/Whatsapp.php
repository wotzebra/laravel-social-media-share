<?php

namespace Wotz\SocialMediaShare\Services;

use Illuminate\Support\Facades\Config;

/**
 * Class Whatsapp
 *
 * @author  Sofian Mourabit <sofian@codedor.be>
 *
 * @since   2019-10-02
 */
class Whatsapp extends AbstractService
{
    /** @var string */
    protected $base;

    /** @var string */
    protected $icon;

    public function __construct($options = [])
    {
        $this->options = $options;
        $this->icon = Config::get('social-media-share.services.whatsapp.icon');
        $this->base = Config::get('social-media-share.services.whatsapp.base_url');
    }

    public function buildUrl(string $url, string $title)
    {
        $link = $this->buildLink($this->base . $url, $this->icon);

        return $link;
    }
}
