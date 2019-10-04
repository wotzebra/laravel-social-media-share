<?php

namespace Codedor\SocialMediaLinks\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Translatable
 *
 * @package Codedor\SocialMediaLink\Facades
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 *
 * @method static string fallbackLocale()
 * @method static void addRoutePart(string $part)
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
