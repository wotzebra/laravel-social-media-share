<?php

namespace Codedor\SocialMediaShare\Tests\Feature;

use Codedor\SocialMediaShare\Facades\Share;
use Codedor\SocialMediaShare\Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class SocialShareTest extends TestCase
{
    public function test_if_title_is_correct()
    {
        $title = 'bla';
        $summary = 'blabla';

        $resultFacebook = Share::currentPage($title)
            ->toFacebook();

        $resultLinkedin = Share::currentPage($title)
            ->toLinkedin($summary);

        $resultTwitter = Share::currentPage($title)
            ->toTwitter();

        $resultWhatsapp = Share::currentPage($title)
            ->toWhatsapp();

        $resultTelegram = Share::currentPage($title)
            ->toTelegram();

        $resultTelegram = Share::currentPage($title)
            ->toTelegram();

        $resultReddit = Share::currentPage($title)
            ->toReddit();

        $resultPinterest = Share::currentPage($title)
            ->toPinterest();

        $resultMail = Share::currentPage($title)
            ->toMail();

        $resultClipboard = Share::currentPage($title)
            ->toClipboard();

        assertEquals($title, $resultFacebook->getTitle());
        assertEquals($title, $resultLinkedin->getTitle());
        assertEquals($title, $resultTwitter->getTitle());
        assertEquals($title, $resultWhatsapp->getTitle());
        assertEquals($title, $resultTelegram->getTitle());
        assertEquals($title, $resultReddit->getTitle());
        assertEquals($title, $resultPinterest->getTitle());
        assertEquals($title, $resultMail->getTitle());
        assertEquals($title, $resultClipboard->getTitle());
    }
}
