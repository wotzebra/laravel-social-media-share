<?php

namespace Codedor\SocialMediaShare\Tests\Feature;

use Codedor\SocialMediaShare\Facades\Share;
use Codedor\SocialMediaShare\Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class GenerateMultipleSocialMediaLinksTest extends TestCase
{
     /**
     * @test
     */
    public function generateMultipleSocialMediaLinks()
    {
        $result = (string) Share::currentPage('pageTitle')
            ->toFacebook();

        $expected = '<div id="js-social-media-share"><ul class="social-media-share"><li>
    <a
        href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/"
        class="js-social-media-share  js-track"
        data-action="hit"
        data-category="Share Facebook"
        data-label="/"
    >
        <i class="fab fa-lg fa-facebook-square"></i>
    </a>
</li>

</ul></div>';

        $this->assertEquals($expected, $result);
    }
}
