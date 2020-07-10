<?php

/*
Template Name: Configurateur
*/

get_header();

$configurateur_page_title = get_field('page_configurateur_title');
$configurateur_page_sub_title = get_field('page_configurateur_sub_title');

$contact_form_title = get_field('contact_form_title', 79);
$contact_form_sub_title = get_field('contact_form_sub_title', 79);
$contact_form_sub_text = get_field('contact_form_sub_text', 79);
$contact_form_iframe = get_field('contact_form_iframe', 79);


?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title text-center text-uppercase marge-top">
                    <?php echo $configurateur_page_title; ?>
                </div>
                <div class="sub-title-general text-center blue">
                    <?php echo $configurateur_page_sub_title; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-blue contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="title blue text-uppercase">
                        <?php echo $contact_form_title; ?>
                    </div>
                    <div class="sub-title-general">
                        <?php echo $contact_form_sub_title; ?>
                    </div>
                    <div class="text-form">
                        <?php echo $contact_form_sub_text; ?>
                    </div>

                    <div class="container-form">
                        <?php echo $contact_form_iframe; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
