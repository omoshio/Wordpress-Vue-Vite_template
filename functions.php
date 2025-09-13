<?php
/**
 * Vite + WordPress 用のアセット読み込み
 */

/**
 * manifest からファイルURLを取得
 */
function vite_asset($entry) {
    $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
    if (!file_exists($manifest_path)) return null;

    $manifest = json_decode(file_get_contents($manifest_path), true);
    if (!isset($manifest[$entry])) return null;

    return get_template_directory_uri() . '/dist/' . $manifest[$entry]['file'];
}

/**
 * アセット読み込み
 */
function enqueue_vite_assets() {
    $entry = 'main.js'; // Vite の入力エントリに合わせる

    if (defined('WP_ENV') && WP_ENV === 'development') {
        // 開発環境 → Vite Dev サーバーから直接読み込み（HMR対応）
        wp_enqueue_script(
            'vite-dev',
            'http://localhost:5173/main.js',
            [],
            null,
            true
        );
    } else {
        // 本番環境 → manifest を1回だけ読み込む
        $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
        if (!file_exists($manifest_path)) return;

        $manifest = json_decode(file_get_contents($manifest_path), true);
        if (!isset($manifest[$entry])) return;

        // CSS 読み込み
        if (isset($manifest[$entry]['css'])) {
            foreach ($manifest[$entry]['css'] as $css) {
                wp_enqueue_style(
                    'vite-style-' . basename($css),
                    get_template_directory_uri() . '/dist/' . $css,
                    [],
                    null
                );
            }
        }

        // JS 読み込み
        wp_enqueue_script(
            'vite-script',
            get_template_directory_uri() . '/dist/' . $manifest[$entry]['file'],
            [],
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_vite_assets');
