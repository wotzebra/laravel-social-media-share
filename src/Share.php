<?php

namespace Codedor\SocialMediaLinks;

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
    protected $prefix = '<div id="js-social-media-links"><ul class="social-media-links">';
    /** @var string */
    protected $suffix = '</ul></div>';
    /** @var string */
    protected $html = '';

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
     * Facebook share link
     *
     * @return $this
     */
    public function toFacebook()
    {
        $entity = new Services\Facebook();

        $this->html .=  $entity->buildUrl($this->url, $this->title);

        return $this;
    }

     /**
     * Linkedin share link
     *
     * @return $this
     */
    public function toLinkedin($summary)
    {
        $entity = new Services\Linkedin($summary);

        $this->html .=  $entity->buildUrl($this->url, $this->title);

        return $this;
    }

     /**
     * Twitter share link
     *
     * @return $this
     */
    public function toTwitter()
    {
        $entity = new Services\Twitter();

        $this->html .=  $entity->buildUrl($this->url, $this->title);

        return $this;
    }

     /**
     * Whatsapp share link
     *
     * @return $this
     */
    public function toWhatsapp()
    {
        $entity = new Services\Whatsapp();

        $this->html .=  $entity->buildUrl($this->url, $this->title);

        return $this;
    }

     /**
     * Telegram share link
     *
     * @return $this
     */
    public function toTelegram()
    {
        $entity = new Services\Telegram();

        $this->html .=  $entity->buildUrl($this->url, $this->title);

        return $this;
    }

     /**
     * Telegram share link
     *
     * @return $this
     */
    public function toReddit()
    {
        $entity = new Services\Reddit();

        $this->html .=  $entity->buildUrl($this->url, $this->title);

        return $this;
    }

     /**
     * Pinterest share link
     *
     * @return $this
     */
    public function toPinterest()
    {
        $entity = new Services\Pinterest();

        $this->html .=  $entity->buildUrl($this->url, $this->title);

        return $this;
    }

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

    public function getSpecificUrl($service)
    {
        $entity = null;
        if ($service === 'Facebook') {
            $entity = new Services\Facebook();
        } else if ($service === 'Twitter') {
            $entity = new Services\Twitter();
        } else if ($service === 'LinkedIn') {
            $entity = new Services\Linkedin($this->title);
        }

        $link = $entity->getUTMUrl($this->url, $this->title);

        return $link;
    }

    /**
     * Optionally Set custom prefix and/or suffix
     *
     * @param string $prefix
     * @param string $suffix
     */
    protected function setPrefixAndSuffix($prefix, $suffix): void
    {
        if (!is_null($prefix)) {
            $this->prefix = $prefix;
        }

        if (!is_null($suffix)) {
            $this->suffix = $suffix;
        }
    }
}
