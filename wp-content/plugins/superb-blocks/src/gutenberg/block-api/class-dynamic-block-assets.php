<?php

namespace SuperbAddons\Gutenberg\BlocksAPI\Controllers;

defined('ABSPATH') || exit();

class DynamicBlockAssets
{
    public static function EnqueueAnimatedHeader($attr, $content)
    {
        wp_enqueue_script(
            'superbaddons-animated-heading',
            SUPERBADDONS_ASSETS_PATH . '/js/dynamic-blocks/animated-heading.js',
            [],
            SUPERBADDONS_VERSION,
            true
        );
        return $content;
    }
}
