<?php

namespace Codedor\SocialMediaLinks\Tests\Feature;

use Codedor\SocialMediaLinks\Facades\Share;
use Codedor\SocialMediaLinks\Tests\TestCase;

class GenerateMultipleSocialMediaLinksTest extends TestCase
{
     /**
     * @test
     */
    public function generateMultipleSocialMediaLinks()
    {
        $result = (string) Share::currentPage('pageTitle')
            ->toFacebook();

        $expected = '<div id="js-social-media-links"><ul class="social-media-links"><li>
    <a
        href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/"
        class="js-social-media-link  js-track"
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
