<?php

use Codedor\SocialMediaShare\Facades\Share;

it('can generate multiple social media links', function () {
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
});
