<?php

namespace includes;

class MooTips
{
    public function __construct()
    {
        add_action('init', [$this, 'init']);

        register_activation_hook(MOO_TIPS_FILE, [$this, 'activate']);
        register_deactivation_hook(MOO_TIPS_FILE, [$this, 'deactivate']);
    }

    public function init()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('moo-tips', MOO_TIPS_URL . 'assets/js/moo-tips.js', ['jquery'], MOO_TIPS_VERSION, true);
        wp_enqueue_style('moo-tips', MOO_TIPS_URL . 'assets/css/moo-tips.css', [], MOO_TIPS_VERSION);
    }

    // register tooltip shortcode
    public function register_tooltip_shortcode()
    {
        add_shortcode('tooltip', [$this, 'tooltip_shortcode']);
    }

    // tooltip shortcode
    public function tooltip_shortcode($atts, $content = null)
    {
        $atts = shortcode_atts([
            'title' => '',
            'content' => '',
        ], $atts);

        return $this->tooltip_block($atts, $content);
    }

    // example of shortcode usage
    // [tooltip title="Tooltip Title" content="Tooltip Content"]

    // register tooltip block
    public function register_tooltip_block()
    {
        register_block_type('moo-tips/tooltip', [
            'editor_script' => 'moo-tips-editor',
            'editor_style' => 'moo-tips-editor',
            'style' => 'moo-tips',
            'render_callback' => [$this, 'tooltip_block'],
        ]);
    }

    // tooltip block
    public function tooltip_block($attributes, $content): string
    {
        return '<span class="moo-tip" title="' . esc_attr($attributes['content']) . '">' . esc_html($attributes['title']) . '</span>';
    }

    public function activate()
    {
        $this->register_tooltip_shortcode();
        $this->register_tooltip_block();
        flush_rewrite_rules();
    }

    public function deactivate()
    {
        flush_rewrite_rules();
    }

}
