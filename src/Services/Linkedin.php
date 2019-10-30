<?php

namespace Codedor\SocialMediaLinks\Services;

use Codedor\SocialMediaLinks\Services\AbstractService;
use Illuminate\Support\Facades\Config;

/**
 * Class Linkedin
 *
 * @package Codedor\SocialMediaLinks
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Linkedin extends AbstractService
{

    /** @var string */
    protected $base = 'http://www.linkedin.com/shareArticle?';
    /** @var string */
    protected $icon;
    /** @var string */
    protected $mini;
    /** @var string */
    protected $summary;

    public function __construct($summary)
    {
        $this->summary = $summary;

        $this->mini = Config::get('social-media-links.services.linkedin.extra')['mini'];
        $this->icon = Config::get('social-media-links.services.linkedin.icon');
    }

    public function buildUrl(string $url, string $title)
    {
        $baseUrl = $this->base .
        'mini=' . $this->mini .
        '&title=' . urlencode($title) .
        '&summary=' . urlencode($this->summary) .
        '&url=' . $url;

        $link = $this->buildLink($baseUrl, $this->icon);

        return $link;
    }

    public function getUTMUrl(string $url, string $title)
    {
        $baseUrl = $this->base .
            'mini=' . $this->mini .
            '&title=' . urlencode($title) .
            '&summary=' . urlencode($this->summary) .
            '&url=' . $url;
        return $baseUrl;
    }

}
