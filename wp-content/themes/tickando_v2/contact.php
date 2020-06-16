<?php

/*
Template Name: Contact
*/

get_header();


?>
    <div class="header-home not-home" style="background-image: url('https://images.pexels.com/photos/1916819/pexels-photo-1916819.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500');">
        <div class="content-center">
          <p class="wording white"><?php echo get_the_title(); ?></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="pipedriveWebForms" data-pd-webforms="https://pipedrivewebforms.com/form/8afdd699c9c149f6382048148018eccc5393871"><script src="https://cdn.pipedriveassets.com/web-form-assets/webforms.min.js"></script></div>
            </div>
        </div>
    </div>





<?php
get_footer();
