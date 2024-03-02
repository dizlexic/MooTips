<?php

namespace admin;

class MooTipsAdmin
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    public function admin_menu()
    {
        add_menu_page(
            MOO_TIPS_NAME,
            MOO_TIPS_NAME,
            'manage_options',
            MOO_TIPS_SLUG,
            [$this, 'admin_page'],
            'dashicons-lightbulb',
            100
        );
    }

    public function admin_page()
    {
        echo '<h1>' . MOO_TIPS_NAME . '</h1>';
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('moo-tips-admin', MOO_TIPS_URL . 'assets/js/moo-tips-admin.js', ['jquery'], MOO_TIPS_VERSION, true);
        wp_enqueue_style('moo-tips-admin', MOO_TIPS_URL . 'assets/css/moo-tips-admin.css', [], MOO_TIPS_VERSION);
    }
}
