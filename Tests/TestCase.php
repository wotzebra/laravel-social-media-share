<?php
namespace Codedor\SocialMediaShare\Tests;

use Codedor\SocialMediaShare\SocialMediaShareServiceProvider;

/**
 * Class TestCase
 *
 * @package Codedor\Translatable\Test
 * @author  Sofian Mourabit <sofian@codedor.be>
 * @since   2019-10-02
 */
class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SocialMediaShareServiceProvider::class
        ];
    }

}
