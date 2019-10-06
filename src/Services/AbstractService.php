<?php

namespace Codedor\SocialMediaLinks\Services;

use Illuminate\Support\HtmlString;

abstract class AbstractService
{
    /** @var array */
    protected $options = [];
    /** @var string */
    protected $linkPrefix = 'js-social-media-link ';


    /**
     * Build a single link
     *
     * @param $provider
     * @param string $url
     */
    public function buildLink(string $url, string $icon)
    {
        $class = $this->linkPrefix;
        $class .= key_exists('class', $this->options) ? $this->options['class'] : '';

        return new HtmlString(
            view(
                'vendor.social-media-links.components.social_media_link',
                compact(
                    'url',
                    'class',
                    'icon'
                )
            )->render()
        );
    }

    abstract public function buildUrl(string $url, string $title);

}
