<?php
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="logo-container">
    <div class="logo">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" />
        <div class="loader" aria-busy=“true” aria-label="Loading"></div>
    </div>
</div>
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <a href="<?php echo get_site_url(); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" />
                </a>
            </div>
            <!--<div class="hidden col-sm-8">
                <div class="navigation">
                    <?php /*echo wp_nav_menu(); */?>
                </div>
            </div>-->
        </div>
    </div>
</header>
