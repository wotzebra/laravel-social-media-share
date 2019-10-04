<?php

namespace Codedor\SocialMediaLinks\Services;

/**
 * Class Facebook
 *
 * @package Codedor\SocialMediaLinks
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Facebook extends \Codedor\SocialMediaLinks\Share
{

    /** @var string */
    protected $base = 'https://www.facebook.com/sharer/sharer.php?u=';
    /** @var string */
    protected $icon;

    public function __construct()
    {
        $this->icon = config('social-media-links.services.facebook.icon');
    }

    public function toFacebook()
    {

        $this->buildLink($this->getFacebookUrl(), $this->icon);

        return $this;
    }

    public function getFacebookUrl(): string
    {
        return $this->base . $this->url;
    }

}
