<?php

namespace Codedor\SocialMediaLinks\Components;

use Codedor\SocialMediaLinks\Share as SocialMediaLinksShare;
use Illuminate\View\Component;

class Share extends Component
{
    public $title;
    public $summary;

    public string $extraClasses;
    public string $prefix;
    public string $suffix;

    public $shareOptions = [
        'facebook' => [
            'method' => 'toFacebook',
            'enabled' => false,
        ],
        'twitter' => [
            'method' => 'toTwitter',
            'enabled' => false,
        ],
        'linkedin' => [
            'method' => 'toLinkedin',
            'enabled' => false,
        ],
        'whatsapp' => [
            'method' => 'toWhatsapp',
            'enabled' => false,
        ],
        'reddit' => [
            'method' => 'toReddit',
            'enabled' => false,
        ],
        'telegram' => [
            'method' => 'toTelegram',
            'enabled' => false,
        ],
        'pinterest' => [
            'method' => 'toPinterest',
            'enabled' => false,
        ],
        'mail' => [
            'method' => 'toMail',
            'enabled' => false,
        ],
        'clipboard' => [
            'method' => 'toClipboard',
            'enabled' => false,
        ],
    ];

    public SocialMediaLinksShare $builder;

    public function __construct(
        SocialMediaLinksShare $builder,

        ?string $title = '',
        ?string $summary = '',

        string $extraClasses = '',
        string $prefix = '<div id="js-social-media-links"><ul class="social-media-links">',
        string $suffix = '</ul></div>',

        bool $facebook = true,
        bool $twitter = true,
        bool $linkedin = true,
        bool $whatsapp = false,
        bool $reddit = false,
        bool $telegram = false,
        bool $pinterest = false,
        bool $mail = false,
        bool $clipboard = false
    ) {
        $this->builder = $builder;

        $this->title = $title;
        $this->summary = $summary;

        $this->extraClasses = $extraClasses;
        $this->prefix = $prefix;
        $this->suffix = $suffix;

        $this->shareOptions['clipboard']['enabled'] = $clipboard;
        $this->shareOptions['facebook']['enabled'] = $facebook;
        $this->shareOptions['twitter']['enabled'] = $twitter;
        $this->shareOptions['linkedin']['enabled'] = $linkedin;
        $this->shareOptions['whatsapp']['enabled'] = $whatsapp;
        $this->shareOptions['reddit']['enabled'] = $reddit;
        $this->shareOptions['telegram']['enabled'] = $telegram;
        $this->shareOptions['pinterest']['enabled'] = $pinterest;
        $this->shareOptions['mail']['enabled'] = $mail;
    }

    public function render()
    {
        return view('social-media-links::components.share', [
            'shareData' => $this->assembleShareData()
        ]);
    }

    protected function assembleShareData()
    {
        $this->builder = $this->builder->currentPage(
            $this->title,
            ['class' => $this->extraClasses],
            $this->prefix,
            $this->suffix
        );

        foreach ($this->shareOptions as $key => $value) {
            if (! $value['enabled']) {
                continue;
            }

            $this->builder = $this->builder->{$value['method']}($this->summary);
        }

        return $this->builder;
    }
}
