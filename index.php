<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css">
  <title><?php bloginfo( 'name' ); ?></title>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <h1>Hello from Vite Theme</h1>
  <div id="vue-sample"></div>
  <?php wp_footer(); ?>
</body>
</html>