<?php
/*
Template Name: Page partenaires
*/

get_header();

$page_partners_description = get_field('page_partners_description');
$page_partners_categories = get_field('page_partners_categories');

$page_partners_affiliation_title = get_field('page_partners_affiliation_title');
$page_partners_affiliation_sub_title = get_field('page_partners_affiliation_sub_title');
$page_partners_affiliation_text = get_field('page_partners_affiliation_text');


?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto text-center">
            <div class="container-intro">
                <div class="title text-uppercase">
                    <?php echo get_the_title(); ?>
                </div>
                <div class="text-intro">
                    <?php echo $page_partners_description; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach ($page_partners_categories as $page_partners_categorie):
            $page_partners_categories_name = $page_partners_categorie['page_partners_categories_name'];
            $page_partners_categories_partners = $page_partners_categorie['page_partners_categories_partners'];
        ?>
        <div class="col-sm-12 text-center inner-category">
            <div class="title blue">
                <?php echo $page_partners_categories_name; ?>
            </div>

            <?php if($page_partners_categories_partners):
                foreach ($page_partners_categories_partners as $page_partners_categories_partner):
                    $page_partners_categories_partner_logo = $page_partners_categories_partner['page_partners_categories_partner_logo'];
                    $page_partners_categories_partner_logo_url = lsd_get_thumb($page_partners_categories_partner_logo, 'medium');
                    $page_partners_categories_partner_description = $page_partners_categories_partner['page_partners_categories_partner_description'];
                    $page_partners_categories_partner_url = $page_partners_categories_partner['page_partners_categories_partner_url'];
            ?>
                <div class="item-partner">
                    <img src="<?php echo $page_partners_categories_partner_logo_url; ?>" alt="">
                    <div class="description">
                        <?php echo $page_partners_categories_partner_description; ?>
                    </div>
                    <a href="<?php echo $page_partners_categories_partner_url; ?>" target="_blank"><?php echo $page_partners_categories_partner_url; ?></a>
                </div>
            <?php
                endforeach;
            endif; ?>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="row strate-affiliation">
        <div class="col-sm-12 text-center">
            <div class="title text-uppercase blue">
                <?php echo $page_partners_affiliation_title; ?>
            </div>
            <div class="sub-title-general">
                <?php echo $page_partners_affiliation_sub_title; ?>
            </div>
            <p><?php echo $page_partners_affiliation_text; ?></p>
            <a href="<?php echo get_the_permalink(PAGE_CONTACT); ?>" class="button blue">
                <?php echo __('Nous contacter', 'lsd_lang'); ?>
            </a>
        </div>
    </div>
</div>

<?php
get_footer();
