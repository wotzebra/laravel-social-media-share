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
            ->toFacebook()
            ->toTwitter()
            ->toLinkedin('pageSummary');

        $expected = '<div id="js-social-media" class="social-media">
                        <ul class="social-media-links">
                            <li>
                                <a class="" href="https://www.facebook.com/sharer/sharer.php?u=https://example.com/your-page">
                                    <i class="fab fa-lg fa-facebook-square"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="http://www.linkedin.com/shareArticle?mini=true&title=pageTitle&summary=pageSummary&url=https://example.com/your-page">
                                    <i class="fab fa-lg fa-linkedin-square"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="https://twitter.com/intent/tweet?text=pageTitle&url=https://example.com/your-page">
                                    <i class="fab fa-lg fa-twitter-square"></i>
                                </a>
                            </li>
                        </ul>
                    </div>';

        $this->assertEquals($expected, $result);
    }


}
