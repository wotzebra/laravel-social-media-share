<?php

namespace Codedor\SocialMediaLinks\Services;

/**
 * Class Twitter
 *
 * @package Codedor\SocialMediaLinks
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Twitter extends \Codedor\SocialMediaLinks\Share
{

    /** @var string */
    protected $base = 'https://twitter.com/intent/tweet?';
    /** @var string */
    protected $icon;

    public function __construct()
    {
        $this->icon = config('social-media-links.services.linkedin.icon');
    }

    public function toTwitter()
    {
        $baseUrl = $this->base .
            '?text=' . $this->title .
            '&url=';

        $this->buildLink($baseUrl, $this->icon);

        return $this;
    }

}
