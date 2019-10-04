<?php

namespace Codedor\SocialMediaLinks;

use Illuminate\Support\HtmlString;

/**
 * Class Share
 *
 * @package Codedor\SocialMediaLinks
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */

class Share
{
    /** @var string */
    protected $url;
    /** @var string */
    protected $title = 'Whoops no title found!';
    /** @var array */
    protected $options = [];
    /** @var string */
    protected $iconPrefix = 'fab fa-lg ';
    /** @var string */
    protected $classPrefix = 'js-social-media-link ';
    /** @var string */
    protected $prefix = '<div id="js-social-media"><ul class="social-media-links">';
    /** @var string */
    protected $suffix = '</ul></div>';
    /** @var string */
    protected $html = '';

    /**
     * Return a string with html at the end
     * of the chain.
     *
     * @return string
     */
    public function __toString(): string
    {
        $this->html = $this->prefix . $this->html;
        $this->html .= $this->suffix;

        return $this->html;
    }

    /**
     * @param string $title
     * @param array $options
     * @param string $prefix
     * @param string $suffix
     * @return $this
     */
    public function currentPage(
        string $title = null,
        array $options = [],
        string $prefix = null,
        string $suffix = null
    ) {
        $url = request()->getUri();

        return $this->page($url, $title, $options, $prefix, $suffix);
    }

    /**
     * @param $url
     * @param string $title
     * @param array $options
     * @param string $prefix
     * @param string $suffix
     * @return $this
     */
    public function page(
        string $url,
        string $title = null,
        $options = [],
        $prefix = null,
        $suffix = null
    ) {
        $this->url = $url;
        $this->title = $title;
        $this->options = $options;

        $this->setPrefixAndSuffix($prefix, $suffix);

        return $this;
    }

    /**
     * Build a single link
     *
     * @param $provider
     * @param string $url
     */
    public function buildLink(string $url, string $icon): HtmlString
    {

        $class = $this->classPrefix .
            key_exists('class', $this->options) ? $this->options['class'] : '';

        $icon = $this->iconPrefix . $icon;

        return new HtmlString(
            view('vendor.social_media_link',
                compact(
                    'url',
                    'class',
                    'icon'
                )
            )
        );
    }

    /**
     * Optionally Set custom prefix and/or suffix
     *
     * @param string $prefix
     * @param string $suffix
     */
    protected function setPrefixAndSuffix(string $prefix, string $suffix)
    {
        if (!is_null($prefix)) {
            $this->prefix = $prefix;
        }

        if (!is_null($suffix)) {
            $this->suffix = $suffix;
        }
    }
}
