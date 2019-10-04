<?php

namespace Codedor\SocialMediaLinks\Services;

/**
 * Class Linkedin
 *
 * @package Codedor\SocialMediaLinks
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Linkedin extends \Codedor\SocialMediaLinks\Share
{

    /** @var string */
    protected $base = 'http://www.linkedin.com/shareArticle?';
    /** @var string */
    protected $mini;
    /** @var string */
    protected $icon;

    public function __construct()
    {
        $this->icon = config('social-media-links.services.linkedin.icon');
        $this->mini = config('social-media-links.services.linkedin.mini');
    }

    public function toLinkedin(string $summary)
    {
        $baseUrl = $this->base .
        'mini=' . $this->mini .
        '&title=' . $this->title .
        '&summary=' . urlencode($summary) .
        '&url=' . $this->url;

        $this->buildLink($baseUrl, $this->icon);

        return $this;
    }


    public function getLinkedinUrl(string $summary): string
    {
        $baseUrl = $this->base .
         'mini=' . $this->mini .
         '&title=' . $this->title .
         '&summary=' . urlencode($summary) .
         '&url=' . $this->url;

        return $baseUrl;
    }

}
