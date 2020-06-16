<?php
/*
Template Name: Homepage
*/

get_header();

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
  <div class="header-home" style="background-image: url('<?php echo $imageBackgroundURL; ?>');">
    <div class="content-left">
        <?php if($titleTop): ?>
            <p class="wording white"><?php echo $titleTop; ?></p>
        <?php endif; ?>

        <?php if($subTitle): ?>
            <p class="sub-wording white">
              <?php echo $subTitle; ?>
            </p>
        <?php endif; ?>

        <a href="#" class="button white">
        En savoir plus
        </a>

    </div>

    <div class="content-right">
        <div class="title">
            Vous souhaitez inverstir ?
        </div>
        <p class="white">Financement de l'économie de la culture…</p>

        <a href="#" class="button white">
        En savoir plus
        </a>
    </div>
  </div>

<div class="strate-about-us">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <div class="text-container">
            <?php if($aboutUsTitle): ?>
            <div class="title">
                <?php echo $aboutUsTitle; ?>
            </div>
            <?php endif; ?>

            <?php if($aboutUsText): ?>
            <p>
                <?php echo $aboutUsText; ?>
            </p>
            <?php endif; ?>

            <?php if($aboutUsURL): ?>
            <a href="<?php echo $aboutUsURL; ?>" class="button black">
                En savoir plus
            </a>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="image-strate">
    <img src="<?php echo $aboutUsImageURL; ?>" alt="">
  </div>
</div>

<?php if($parcoursItems): ?>
<div class="strate-number">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="title title-strate">
          Notre parcours
        </div>
      </div>

        <?php foreach ($parcoursItems as $parcoursItem):
            $labelParcours = $parcoursItem['label_parcours'];
            $chiffreParcours = $parcoursItem['chiffre_parcours'];
            $iconParcours = $parcoursItem['icon_parcours'];

            if($iconParcours):
                $iconParcoursURL = lsd_get_thumb($iconParcours, 'medium');
            endif;

        ?>
          <div class="col-sm-3">
            <div class="item-number">
                <?php if(isset($iconParcoursURL)): ?>
                    <img src="<?php echo $iconParcoursURL; ?>" alt="">
                <?php endif; ?>

                <?php if($chiffreParcours): ?>
                  <div class="title">
                      <?php echo $chiffreParcours; ?>
                  </div>
                <?php endif; ?>

                <?php if($labelParcours): ?>
                    <p><?php echo $labelParcours; ?></p>
                <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>

    </div>
  </div>
</div>
<?php endif; ?>

<?php
get_footer();
