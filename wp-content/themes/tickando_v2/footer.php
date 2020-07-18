<?php
    $adressMail = get_field('params_mail_address', 'option');
    $params_footer_menu = get_field('params_footer_menu', 'option');
?>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">

                        <?php if($params_footer_menu): ?>
                        <ul class="nav-footer">
                            <?php foreach ($params_footer_menu as $params_footer_menu_item): ?>
                            <li>
                                <a href="<?php echo $params_footer_menu_item['params_footer_menu_url']; ?>" ><?php echo $params_footer_menu_item['params_footer_menu_label']; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-4 text-center">
                        <a href="<?php echo get_site_url(); ?>" class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" width="120" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 text-right">
                        <div class="legals">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/acpr.jpg" width="90" alt="">
                            <p>
                                <?php echo __('Tickando en tant qu’agent de paiement à l’agrément de la Banque de France.', 'lsd_lang'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <p class="copyright">
                            <?php echo __('© Tickando 2020', 'lsd_lang'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <script  src='<?php echo get_template_directory_uri();?>/assets/js/jquery.js'></script>
        <script  src='<?php echo get_template_directory_uri();?>/assets/js/app.js'></script>
        <script  src='<?php echo get_template_directory_uri();?>/assets/js/jquery.easeScroll.js'></script>
        <?php wp_footer(); ?>

    </body>
</html>
