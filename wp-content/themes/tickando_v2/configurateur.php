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

<?php
if($_GET["submit"]) {
    if($_GET["submit"] == true) {
        echo("<style>.prochaineEtape { display: none!important; } .response-form { display: block!important; }</style>");
    }
}

$title_section_1 = get_field('title_section_1');
$title_section_2 = get_field('title_section_2');
$title_section_3 = get_field('title_section_3');
$title_section_4 = get_field('title_section_4');
?>
    <div class="container-app">
        <div id="app">
            <section>
                <div class="configurateur">
                    <p class="title-range"><?php echo $title_section_1; ?></p>
                    <div class="range-wrap range-wrap-montant-previsionnel">
                        <div class="range-value">
                            <span>{{formatPrice(this.montant_previsionnel)}}</span>
                        </div>
                        <input class="range range_montant_previsionnel" type="range" min="10000" max="5000000" step="1000" v-model="montant_previsionnel">
                    </div>
                    <p class="title-range"><?php echo $title_section_2; ?></p>
                    <div class="range-wrap range-wrap-pourcentage-avance">
                        <div class="range-value">
                            <span>{{pourcentage_avance_treso}}%</span>
                        </div>
                        <div class="underlay">
                            <div class="breakpoint percent_placeholder_10"></div>
                            <div class="breakpoint percent_placeholder_20"></div>
                            <div class="breakpoint percent_placeholder_30"></div>
                        </div>
                        <input class="range range_pourcentage_avance" type="range" min="10" max="40" step="1" v-model="pourcentage_avance_treso">
                    </div>
                    <div>
                        <p class="title-range"><?php echo $title_section_3; ?></p>
                        <p class="result-value">{{formatPrice(result_avance_treso)}}</p>
                        <canvas id="chartPie"></canvas>
                    </div>
                </div>
                <div class="prochaineEtape">
                    <p class="title-range title"><?php echo $title_section_4; ?></p>
                    <p>
                        <span><?php echo __('Remplissez ce formulaire afin d’initier l’étude de votre dossier par l’un de nos experts.', 'lsd_lang'); ?></span>
                    </p>
                    <form class="contact-form" method="post" action="<?php echo get_the_permalink(); ?>">
                        <div>
                            <input type="text" name="nom_prenom" placeholder="<?php echo __('Nom et prénom', 'lsd_lang'); ?> *" v-model="dataForm.nom_prenom" required>
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="<?php echo __('Email', 'lsd_lang'); ?> *" v-model="dataForm.email" required>
                        </div>
                        <div>
                            <input type="text" name="societe_association" placeholder="<?php echo __('Société ou Association', 'lsd_lang'); ?> *" v-model="dataForm.societe_association" required>
                        </div>
                        <div>
                            <input type="text" name="mandat" placeholder="<?php echo __('Votre mandat', 'lsd_lang'); ?>" v-model="montant_previsionnel">
                        </div>
                        <div>
                            <input type="text" name="besoin" placeholder="<?php echo __('Votre besoin', 'lsd_lang'); ?> *" v-model="result_avance_treso" required>
                        </div>
                        <div>
                            <input type="checkbox" name="activite_plus_2_ans" id="activite_plus_2_ans" v-model="dataForm.activite_plus_2_ans">
                            <label for="activite_plus_2_ans"><?php echo __('Vous êtes en activité depuis plus de deux ans', 'lsd_lang'); ?></label>
                        </div>
                        <div>
                            <input type="checkbox" name="ca_sup_30k" id="ca_sup_30k" v-model="dataForm.ca_sup_30k">
                            <label for="ca_sup_30k"><?php echo __('Vous réalisez un CA annuel supérieur à 30 k€', 'lsd_lang'); ?></label>
                        </div>
                        <div>
                            <input type="checkbox" name="cgu_cgv" id="cgu_cgv" required>
                            <label for="cgu_cgv"><?php echo __('J’accepte que mes coordonnées soient utilisées par Tickando dans le cadre de mon projet.', 'lsd_lang'); ?></label>
                        </div>
                        <div class="div_submit">
                            <input type="submit" name="submit" value="<?php echo __('Envoyer', 'lsd_lang'); ?>">
                        </div>
                    </form>
                </div>
                <div class="response-form">
                    <p class="title-range"><?php echo __('Merci !', 'lsd_lang'); ?></p>
                    <p><?php echo __('L’un de nos experts va revenir vers vous dans les plus brefs délais.<br> Bonne journée,<br>votre équipe Tickando.', 'lsd_lang'); ?></p>
                    <p>
                        <button class="button_reload" onclick="document.location.href='/'"><?php echo __('Refaire une simulation', 'lsd_lang'); ?></button>
                    </p>
                </div>
                <?php
                if(isset($_POST['submit']))
                {
                    $nom_prenom = $_POST['nom_prenom'];
                    $email = $_POST['email'];
                    $societe_association = $_POST['societe_association'];
                    $mandat = $_POST['mandat'];
                    $besoin = $_POST['besoin'];
                    if($_POST['activite_plus_2_ans'] == "on") {
                        $activite_plus_2_ans = "Oui";
                    } else {
                        $activite_plus_2_ans = "Non";
                    }
                    if($_POST['ca_sup_30k'] == "on") {
                        $ca_sup_30k = "Oui";
                    } else {
                        $ca_sup_30k = "Non";
                    }
                    $date_cgu_cgv = date('Y-m-d');

                    // Pipedrive API token
                    $api_token = '1424e0e3ba1b65b4d41b78665a3ed5442a5fb434';
                    // Pipedrive company domain
                    $company_domain = 'tickando-d4c5a7';

                    // CREATE PERSON
                    $createPerson = array(
                        'name' => $nom_prenom, // Nom et prénom
                        'email' => $email, // Email
                        'b1059ceca0bac0db1ca03d10c55c44cc281416a1' => $mandat, // Mandat
                        'notes' => $besoin, // Besoin
                        '0764980a0cec49efc0b3690749aec694ea181019' => $activite_plus_2_ans, // En activité depuis plus de 2 ans
                        'cf41eed26c726dbffa5d98238654cf8b28ce1572' => $ca_sup_30k, // CA supérieur à 30K
                        '752abd472ce193a4c72a8b76d125db6a2de6a58d' => $date_cgu_cgv // Date validation CGU/CGV
                    );

                    $url = 'https://' . $company_domain . '.pipedrive.com/api/v1/persons?api_token=' . $api_token;

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $createPerson);

                    $output = curl_exec($ch);
                    curl_close($ch);

                    $result = json_decode($output, true);

                    $idPerson = $result['data']['id'];

                    // Check if an ID came back, if did print it out
                    // if (!empty($result['data']['id'])) {
                    //    echo 'User was added successfully!' . $idPerson . ' ' . PHP_EOL;
                    // }

                    // ---------------------------------------------------------

                    // CREATE ORGANIZATION
                    $organization = array(
                        'name'	=> $societe_association,
                    );

                    $url = 'https://' . $company_domain . '.pipedrive.com/api/v1/organizations?api_token=' . $api_token;

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $organization);

                    $output = curl_exec($ch);
                    curl_close($ch);

                    $result = json_decode($output, true);

                    $idOrga = $result['data']['id'];

                    // Check if an ID came back, if did print it out
                    // if (!empty($result['data']['id'])) {
                    //    echo 'Organization was added successfully!' . $idOrga . ' ' . PHP_EOL;
                    // }

                    // ---------------------------------------------------------

                    // UPDATE PERSON (add organization id)
                    $updatePerson = array(
                        'org_id' => $idOrga
                    );

                    $url = 'https://' . $company_domain . '.pipedrive.com/api/v1/persons/'.$idPerson.'?api_token=' . $api_token;

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($updatePerson));

                    $output = curl_exec($ch);
                    curl_close($ch);

                    $result = json_decode($output, true);

                    // Check if an ID came back, if did print it out
                    // if (!empty($result['data']['id'])) {
                    //    echo 'User was update successfully!' . PHP_EOL;
                    //    var_dump($result);
                    // }

                    // ---------------------------------------------------------

                    // CREATE DEAL
                    $deal = array(
                        'title'	=> '[Site Web] '.$nom_prenom.' deal',
                        'org_id'	=> $idOrga,
                        'person_id'	=> $idPerson
                    );

                    $url = 'https://' . $company_domain . '.pipedrive.com/api/v1/deals?api_token=' . $api_token;

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $deal);

                    $output = curl_exec($ch);
                    curl_close($ch);

                    $result = json_decode($output, true);

                    // Check if an ID came back, if did print it out
                    // if (!empty($result['data']['id'])) {
                    //    echo 'Deal was added successfully!' . $result['data']['id'] . ' ' . PHP_EOL;
                    // }

                    // Actualise la page avec le paramètre "submit" qui a la valeur true
                    echo("<script type='text/javascript'>
						window.location = '?submit=true';
					</script>");
                }
                ?>
            </section>
        </div>
    </div>

<?php
get_footer();
