<?php

namespace Codedor\SocialMediaLinks\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Translatable
 *
 * @package Codedor\SocialMediaLinks\Facades
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 *
 * @method static __call()
 * @method static __toString()
 * @method static buildLink()
 * @method static page(string $url, string $title = null, $options = [],$prefix = null, $suffix = null)
 * @method static currentPage(string $title = null, $options = [],$prefix = null, $suffix = null)
 * @method static toFacebook()
 * @method static toTwitter()
 * @method static toLinkedin(string $summary)
 * @method static toReddit()
 * @method static toTelegram()
 * @method static toWhatsapp()
 * @method static toPinterest()
 *
 * @see \Codedor\Translatable\Translatable
 */

class ShareFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'share';
    }
}
