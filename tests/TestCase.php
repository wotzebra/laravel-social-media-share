<?php

namespace Wotz\SocialMediaShare\Tests;

use Wotz\SocialMediaShare\SocialMediaShareServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SocialMediaShareServiceProvider::class,
        ];
    }
}
