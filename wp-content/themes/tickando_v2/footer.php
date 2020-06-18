<?php
    $adressMail = get_field('params_mail_address', 'option');
?>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <ul class="nav-footer">
                            <li>
                                <a href="mailto:<?php echo $adressMail; ?>"><?php echo __('Contact', 'lsd_lang'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 text-center">
                        <a href="<?php echo get_site_url(); ?>" class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="legals">
                            <?php echo __('© Tickando 2020', 'lsd_lang'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script  src='<?php echo get_template_directory_uri();?>/assets/js/jquery.js'></script>
        <script  src='<?php echo get_template_directory_uri();?>/assets/js/app.js'></script>
        <?php wp_footer(); ?>

    </body>
</html>
