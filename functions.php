<?php

function vite_asset($entry) {
    $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';

    if (!file_exists($manifest_path)) return null;

    $manifest = json_decode(file_get_contents($manifest_path), true);
    if (!isset($manifest[$entry])) return null;

    return get_template_directory_uri() . '/dist/' . $manifest[$entry]['file'];
}

function enqueue_vite_assets() {
    // 開発環境
    if (defined('WP_ENV') && WP_ENV === 'development') {
        // Vite開発サーバーから直接読み込み（HMR対応）
        wp_enqueue_script(
            'vite-dev',
            'http://localhost:5173/resources/js/app.js',
            [],
            null,
            true
        );
    } else {
        // 本番環境
        $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
        if (!file_exists($manifest_path)) return;

        $manifest = json_decode(file_get_contents($manifest_path), true);
        $entry = 'main.js'; // ←ここはViteの input と一致させる！

        // CSSがある場合
        if (isset($manifest[$entry]['css'])) {
            foreach ($manifest[$entry]['css'] as $css) {
                wp_enqueue_style(
                    'vite-style',
                    get_template_directory_uri() . '/dist/' . $css,
                    [],
                    null
                );
            }
        }

        // JS本体
        $js = vite_asset($entry);
        if ($js) {
            wp_enqueue_script(
                'vite-script',
                $js,
                [],
                null,
                true
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_vite_assets');