<?php
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header">
    <!--<div class="switch-lang">
      <ul>
        <li>
          <a href="#">
            Fr
          </a>
        </li>
        <li>
          <a href="#">
            En
          </a>
        </li>
        <li>
          <a href="#">
            Esp
          </a>
        </li>
      </ul>
    </div>-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <a href="<?php echo get_site_url(); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" />
                </a>
            </div>
            <div class="col-sm-8">
                <div class="navigation">
                    <?php echo wp_nav_menu(); ?>
                </div>
            </div>
        </div>
    </div>
</header>
