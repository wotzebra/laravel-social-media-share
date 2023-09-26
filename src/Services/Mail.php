<?php

namespace Codedor\SocialMediaShare\Services;

use Illuminate\Support\Facades\Config;

/**
 * Class Mail
 *
 * @package Codedor\SocialMediaShare
 * @author  Jyrki De Neve <jyrki@codedor.be>
 * @since   2020-01-30
 */

class Mail extends AbstractService
{
    /** @var string */
    protected $icon;

    public function __construct($options = [])
    {
        $this->options = $options;
        $this->icon = Config::get('social-media-share.services.mail.icon');
    }

    public function buildUrl(string $url, string $title)
    {
        $link = sprintf(
            'mailto:?subject=%s&body=%s',
            e($title),
            $url
        );

        return $this->buildLink($link, $this->icon);
    }
}
