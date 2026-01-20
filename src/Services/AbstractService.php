<?php

namespace Wotz\SocialMediaShare\Services;

use Illuminate\Support\HtmlString;

abstract class AbstractService
{
    /** @var array */
    protected $options = [];

    /** @var string */
    protected $linkPrefix = 'js-social-media-share ';

    /**
     * Build a single link
     *
     * @param  $provider
     */
    public function buildLink(string $url, string $icon = '', ?string $js = null)
    {
        $class = $this->linkPrefix;
        $class .= array_key_exists('class', $this->options) ? $this->options['class'] : '';

        $className = $this->getClassName();

        return new HtmlString(
            view(
                'social-media-share::components.social_media_share',
                compact(
                    'url',
                    'class',
                    'icon',
                    'className',
                    'js'
                )
            )->render()
        );
    }

    public function getClassName()
    {
        return class_basename(static::class);
    }

    abstract public function buildUrl(string $url, string $title);
}
