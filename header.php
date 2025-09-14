<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php wp_title(); ?></title>
  <!-- テーマのCSS -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css?v=<?php echo filemtime(get_template_directory() . '/assets/css/common.css'); ?>">
  <!-- WordPressやプラグインで追加ßされるCSS/JSを挿入 -->
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
