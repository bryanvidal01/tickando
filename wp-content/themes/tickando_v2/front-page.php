<?php
/*
Template Name: Homepage
*/

get_header();

$adressMail = get_field('params_mail_address', 'option');
$imageBackground = get_field('image_background');
$imageBackgroundURL = lsd_get_thumb($imageBackground, 'full');
$titleTop = get_field('title_top');
$subTitle = get_field('sub_title_top');

$aboutUsTitle = get_field('title_who_we_are');
$aboutUsText = get_field('text_who_we_are');
$aboutUsURL = get_field('url_button');
$aboutUsImage = get_field('image_who_we_are');
$aboutUsImageURL = lsd_get_thumb($aboutUsImage, 'full');

$parcoursItems = get_field('item_parcours');

?>
  <div class="header-home" id="slider" data-type="background" data-speed="2" style="background-image: url('<?php echo $imageBackgroundURL; ?>');">
    <div class="content-left">
        <?php if($titleTop): ?>
            <p class="wording white fadeIn"><?php echo $titleTop; ?></p>
        <?php endif; ?>

        <?php if($subTitle): ?>
        <div class="info-eligibility fadeIn">
            <?php echo $subTitle; ?>

            <a href="#tickando-about" class="button blue">
                <?php echo __('En savoir plus', 'lsd_lang'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
  </div>

<div class="strate-about-us" id="tickando-about">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 mx-auto text-center">
        <div class="text-container">
            <?php if($aboutUsTitle): ?>
            <div class="title">
                <?php echo $aboutUsTitle; ?>
            </div>
            <?php endif; ?>

            <?php if($aboutUsText): ?>
                <?php echo $aboutUsText; ?>
            <?php endif; ?>

            <?php /*if($aboutUsURL): */?><!--
            <a href="<?php /*echo $aboutUsURL; */?>" class="button black">
                En savoir plus
            </a>
            --><?php /*endif; */?>
        </div>
      </div>
    </div>
  </div>
  <div class="image-strate">
    <img src="<?php echo $aboutUsImageURL; ?>" alt="">
  </div>
</div>

<?php
$imageAboutBackground = get_field('about_background');
$imageAboutBackgroundURL = lsd_get_thumb($imageAboutBackground, 'full');
$titleAboutTop = get_field('about_title');
$subTitleAbout = get_field('about_sub_title');
$contentAbout = get_field('about_text_content');
?>
<div class="strate-how-we-are" style="background-image: url('<?php echo $imageAboutBackgroundURL; ?>')">
    <div class="container-text">
        <div class="title">
            <?php echo $titleAboutTop ?>
        </div>
        <div class="sub-title">
            <?php echo $subTitleAbout; ?>
        </div>
        <div class="content">
            <?php echo $contentAbout; ?>

            <a href="mailto:<?php echo $adressMail; ?>" class="button blue"><?php echo __('Nous contacter', 'lsd_lang'); ?></a>
        </div>
    </div>
</div>
<?php
get_footer();
