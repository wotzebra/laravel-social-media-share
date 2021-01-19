<?php

namespace Codedor\SocialMediaLinks\Services;

use Codedor\SocialMediaLinks\Services\AbstractService;
use Illuminate\Support\Facades\Config;

class Clipboard extends AbstractService
{
    /** @var string */
    protected $icon;

    public function __construct()
    {
        $this->icon = Config::get('social-media-links.services.clipboard.icon');
        $this->linkPrefix = 'clipboard';
    }

    public function buildUrl(string $url, string $title)
    {
        $link = '#';

        $js = <<<JS
        <script>
        document.querySelector('a.clipboard').addEventListener('click', async event => {
            if (!navigator.clipboard) {
              return
            }
            var a = event.target.parentElement
            if (!a.href) {
                return
            }
            try {
              await navigator.clipboard.writeText(a.href)
            } catch (err) {
              console.error('Failed to copy!', err)
            }
          })
          </script>
        JS;

        return $this->buildLink($link, $this->icon, $js);
    }
}
