<?php

namespace Wotz\SocialMediaShare\Tests;

use Wotz\SocialMediaShare\SocialMediaShareServiceProvider;

/**
 * Class TestCase
 *
 * @author  Sofian Mourabit <sofian@codedor.be>
 *
 * @since   2019-10-02
 */
class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SocialMediaShareServiceProvider::class,
        ];
    }
}
