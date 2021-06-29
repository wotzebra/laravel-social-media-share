<?php

namespace Codedor\SocialMediaLinks\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Share
 *
 * @package Codedor\SocialMediaLinks\Facades
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 *
 * @method static currentPage(string $title = null, $options = [],$prefix = null, $suffix = null)
 * @method static page(string $url, string $title = null, $options = [],$prefix = null, $suffix = null)
 * @method static toFacebook()
 * @method static toTwitter()
 * @method static toLinkedin(string $summary)
 * @method static toReddit()
 * @method static toTelegram()
 * @method static toWhatsapp()
 * @method static toPinterest()
 * @method static string __toString()
 * @method static void setPrefixAndSuffix($prefix, $suffix)
 *
 * @see \Codedor\Share\Share
 */

class Share extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'share';
    }
}
