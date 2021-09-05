<?php


sleep(1);
$nom=isset($_POST['nom']) ? htmlspecialchars($_POST['nom'], ENT_QUOTES,'UTF-8') : '';
$mail=isset($_POST['mail']) ? htmlspecialchars($_POST['mail'], ENT_QUOTES,'UTF-8') : '';
$sujet=isset($_POST['sujet']) ? htmlspecialchars($_POST['sujet'], ENT_QUOTES,'UTF-8') : '';
$message=isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES,'UTF-8') : '';

$headers = "From: noreply@sylvainallain.fr"."\n"; // Adresse fictive expediteur
$headers .= "Content-Type: text/html; charset=UTF-8"."\n";
$headers .='Content-Transfer-Encoding: 8bit';


$destinataire="contact@sylvainallain.fr"; // Mon adresse mail

$monMessage="
Vous avez reçu un message du formulaire sur sylvainallain.fr.<br>
Le voici:<br>
De: $nom <br>
Sujet: $sujet <br>
Email: $mail <br>
Message: $message<br>";

$clientMessage="
Bonjour,<br>

Vous recevez ce mail automatique suite à l'envoie d'un formulaire de contact sur sylvainallain.fr.<br>
Voici votre message: <br>
$message<br>
<br>
Nous vous répondrons dans les meilleurs délais.
";
$clientSujet="Votre message: $sujet";

if(isset($_POST['post'])){
    // print_r($_POST);
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => '6Lds9qUZAAAAAO65ND46zWRDM6z0b0cVSIN2rIfr',
        'response' => $_POST['token']
    ];
    
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    $result = json_decode($response, true);
    
    if($result['success'] == true){
        mail($destinataire,$sujet,$monMessage,$headers) && mail($mail, $clientSujet, $clientMessage, $headers);
        header("Location:index.php?success#form");
    } else {
        header("Location:index.php?error#form");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="author" content="Sylvain ALLAIN">
    <meta name="keywords" content="web, development, développement, html, css, javascript, php, sql, développement web, responsive, site web, site">

    <!-- Primary Meta Tags -->
    <title>Sylvain ALLAIN - Développeur web</title>
    <meta name="title" content="Sylvain ALLAIN - Développeur web">
    <meta name="description" content="Site de présentation d'un dévelopeur web & web mobile">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.sylvainallain.fr/">
    <meta property="og:title" content="Sylvain ALLAIN - Développeur web">
    <meta property="og:description" content="Site de présentation d'un dévelopeur web & web mobile">
    <meta property="og:image" content="assets/img/MonSite.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.sylvainallain.fr/">
    <meta property="twitter:title" content="Sylvain ALLAIN - Développeur web">
    <meta property="twitter:description" content="Site de présentation d'un dévelopeur web & web mobile">
    <meta property="twitter:image" content="assets/img/MonSite.png">

    <link rel="icon" href="./favicon.ico">

    
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
          integrity="sha256-l85OmPOjvil/SOvVt3HnSSjzF1TUMyT9eV0c2BzEGzU="
          crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/64cfa211f1.js" crossorigin="anonymous"></script>


<link rel="stylesheet" href="assets/css/timeline.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146719243-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146719243-1');
</script>

<!-- Captcha v3 -->
<script src="https://www.google.com/recaptcha/api.js?render=6Lds9qUZAAAAAHsrVexr99a8fy8CvABDBboJDPOI"></script>

<?php
    function age($date) { 

        //On déclare les dates à comparer
        $dateNais = new DateTime($date);
        $dateJour = new DateTime();

        //On calcule la différence
        $difference = $dateNais->diff($dateJour);

        //On retourne la différence en années
        return $difference->format('%Y'); 
   } 
?>



</head>
<body>



<header class="change">
    <div class="flex">

            <a href="#"><img src="./assets/img/LogoASPixel4.png" alt="Mon logo"></a>

        <section>
            <h1>Sylvain ALLAIN - Développeur web</h1>

        </section>
    </div>
                <i id="burgerNav" class="fas fa-hamburger fa-2x"></i>

    <nav class="nav burgerMenu">
        <a id="nav1"  href="#propos">&Agrave; propos de Moi</a>
        <a id="nav2"  href="#projets">Mes Projets</a>
        <a id="nav3" href="#parcours">Mon Parcours</a>
        <a id="nav4"  href="#contact">Réseaux et Contact</a>
    </nav>
</header>

<div class="goutte"><div id="goutteMain"><i class="fas fa-tint current "></i></div>
    <ul class="goutteCouleur display">
        <li id="Goutte0"><i class="fas fa-tint origin"></i></li>
        <li id="Goutte1"><i class="fas fa-tint white"></i></li>
        <li id="Goutte4"><i class="fas fa-tint green"></i></li>
    </ul>
</div>

<div id="wrapper" class="content">
        <main>
        <article class="intro">
                <figure class="center">
                    <img src="./assets/img/moi-removebg.png" alt="Avatar South Park me représentant">
                </figure>
                <h2 class="not-blue">Moi c’est Sylvain,</h2>
                <h3 class="center not-blue">
                    J’ai <?php echo age('1990-09-18')?> ans et j'habite à <strong>Strasbourg</strong>.<br><br>
                    <strong>Je suis Développeur Web !</strong>
                </h3>

               <p class="center"><a class="cv" href="./assets/docs/CV-SylvainALLAIN.pdf" target="blank">TELECHARGEZ MON CV</a></p>

            </article>
            <hr class="style-two">
            <article id="propos" class="border-bot anchor">
                <h2>&Agrave; propos de moi</h2>
                <p class="center">Mon aventure dans le développement à commencé en Janvier 2019.</p>
                <p class="center">
                    Souhaitant effectuer une réorientation professionnelle, j’ai entrepris de me former au développement web et à ses différents langages.<br>
                    Après une période d'autoformation sur OpenClassrooms, où j'ai appris la base du développement front-end et back-end, j'ai suivi une formation au <strong>Titre Professionnel de Développeur web & web mobile de Niveau III</strong> à ELAN Formation.</p>
                    <h4 class="center">J'ai obtenu mon diplôme en Juin 2020.</h4>
                <p class="center">
                    J'ai ensuite décidé de continuer à me former.<br>
                    Pour cela, j'ai intégré une nouvelle formation, cette fois pour le <strong>Titre Professionnel de Concepteur Développeur d'application</strong> à la Wild Code School. Cette formation s'est faite en alternance avec
                    l'entreprise OCI qui m'a accueillis en Septembre 2020.
                    <h4 class="center">Le passage du titre se fera en Novembre 2021</h4>
                </p>
                <h3 class="center not-blue">
                    <strong>Je suis actuellement à la recherche d’un emploi pour Novembre 2021.</strong>
                </h3>
            </article>

            <section id="projets" class="border-bot anchor">
                <h2 class="center">Mes projets</h2>
                <article class="portfolio">
                        <h3 class="center not-blue">Mon Portfolio</h3>
                        <div class="center">
                            <a href="https://sylvainallain.fr/" target="_blank">
                            <figure>
                                <img class="projets-img monsite" src="assets/img/MonSite.png" alt="image de mon portfolio">
                            </figure>
                        </a>
                            <div class="center">
                                <a href="#" target="_blank"><i class="fas fa-eye fa-3x"></i></a>&nbsp;&nbsp;
                                <a href="https://github.com/S2LF/portfolio" target="_blank"><i class="fab fa-github fa-3x"></i></a>
                            </div>
                        </div>
                        <div class="flex ">
                            <div>
                                <p>Mon portfolio est le site sur lequel vous êtes actuellement :
                                    <ul>
                                        <li>Version 6, design et contenu évoluant régulièrement</li>
                                        <li>Projet réalisé afin de présenter mon expérience, mes compétences</li>
                                        <li>Entièrement réalisé par mes soins, sans librairie ou framework.</li>
                                        <li>Site web responsive</li>
                                    </ul>
                                </p>
                            </div>

                            <div class="projets-logo">
                                <img class="logoResize" src="assets/img/Tech.png" alt="logo langages">
                            </div>
                        </div>
                </article>
                <hr class="style-two">
                <div class="projets-flex">
                    <article>
                        <h3 class="center not-blue">Application mobile "Il était un film"</h3>
                        <div class="center">
                            <a href="https://play.google.com/store/apps/details?id=s2lf.cinema" target="_blank">
                                <img class="projets-img" src="assets/img/app-mobile.jpg" alt="image de l'application mobile">
                            </a>
                            <div class="center">
                                <a href="https://play.google.com/store/apps/details?id=s2lf.cinema" target="_blank">
                                    <i class="fas fa-eye fa-3x"></i>
                                </a>&nbsp;&nbsp;
                                <a href="https://github.com/S2LF/rn-cinema" target="_blank"><i class="fab fa-github fa-3x"></i></a>
                            </div>
                        </div>
                        
                        <p>Application mobile de recherche de film, séries ou personnes liées au cinéma :
                            <ul>
                                <li>Réalisé en React Native avec Expo.</li>
                                <li>Utilisation de l'API TheMovieDatabase pour les données.</li>
                                <li>Mise en production sur le Google Play Store.</li>
                            </ul>
                        </p>
                        <div  class="projets-logo">
                            <img class="logoResize" src="assets/img/stack-mobile.png" alt="logo react native"><br>
<!--                             
                            <img class="logoResize"  src="assets/img/expo.jpg" alt="logo langages back"><br> -->
                            <!-- <img class="logoSize" src="assets/img/logo-wordpress.png" alt="logo WordPress"> -->
                        </div>
                    </article>
                    <article>
                        <h3 class="center not-blue">Memory & jeu du Pendu</h3>
                        <div class="center">
                            <a href="https://syl20-projects.herokuapp.com" target="_blank">
                                <img class="projets-img " src="assets/img/react-projects.png" alt="imge du site Sy20 react projects">
                            </a>
                            <div class="center">
                                <a href="https://syl20-projects.herokuapp.com" target="_blank"><i class="fas fa-eye fa-3x"></i></a>&nbsp;&nbsp;
                                <a href="https://github.com/S2LF/reacts-projects" target="_blank"><i class="fab fa-github fa-3x"></i></a>
                            </div>
                        </div>
                        <p>Site web hébergé sur Heroku qui présente des projet réalisé en React & NodeJs :
                            <ul>
                                <li>Utilisation de React Router</li>
                                <li>Création et mise en place d'un API en NodeJs avec Express pour l'affichage & la sauvegarde des scores avec une base de donnée MongoDB</li>
                                <li>Site web responsive</li>
                            </ul>
                        </p>
                        <div class="projets-logo">
                            <img class="" src="assets/img/mern.png" alt="logo stack mern"><br>
                            
                        </div>
                    </article>
                </div>
                <hr class="style-two">
                <div class="projets-flex">
                    <article>
                        <h3 class="center not-blue">Tof'Box</h3>
                        <div class="center">
                            <a href="https://tofbox.sylvainallain.fr/" target="_blank">
                                <img class="projets-img " src="assets/img/tofbox.png" alt="imge du site tof'box">
                            </a>
                            <div class="center">
                                <a href="https://tofbox.sylvainallain.fr/" target="_blank"><i class="fas fa-eye fa-3x"></i></a>&nbsp;&nbsp;
                                <a href="https://github.com/S2LF/TofBoxProject" target="_blank"><i class="fab fa-github fa-3x"></i></a>
                            </div>
                        </div>
                        <p>Réseau social de partage de photographies :
                            <ul>
                                <li>Projet de fin de formation en développement web.</li>
                                <li>Réalisé avec le framework PHP Symfony 5</li>
                                <li>Site web responsive</li>
                            </ul>
                        </p>
                        <div class="projets-logo">
                            <img class="logoResize" src="assets/img/Front.png" alt="logo langages front"><br>
                            <img class="logoResize" src="assets/img/Back.png" alt="logo langages back"><br>
                            <img class="logoSize" src="assets/img/Symfony5.png" alt="logo Symfony5">
                        </div>
                    </article>
                    <article>
                        <h3 class="center not-blue">Joel ALLAIN Photos</h3>
                        <div class="center">
                            <a href="https://joelallainphotos.fr/" target="_blank">
                                <img id="jap-position" class="projets-img" src="assets/img/joelallainphotos.png" alt="image du site Joel ALLAIN Photo">
                            </a>
                            <div class="center">
                                <a href="https://joelallainphotos.fr/" target="_blank">
                                    <i class="fas fa-eye fa-3x"></i>
                                </a>
                            </div>
                        </div>
                        
                        <p>Site web de photographe réalisé avec WordPress :
                            <ul>
                                <li>Création d'un thème personnalisé pour gérer le front.</li>
                                <li>Utilisation du plugin ACF Pro permettant la modification du contenu depuis l'interface administrateur.</li>
                            </ul>
                        </p>
                        <div  class="projets-logo">
                            <img class="logoResize" src="assets/img/Front.png" alt="logo langages front"><br>
                            <img class="logoResize"  src="assets/img/Back.png" alt="logo langages back"><br>
                            <img class="logoSize" src="assets/img/logo-wordpress.png" alt="logo WordPress">
                        </div>
                    </article>
                </div>
            </section>

            <section class="border-bot" id="parcours">
                <h2 class="center">Mon parcours</h2>
                <div class="timeline-container">
                    <div class="timeline-block timeline-block-left">
                        <div class="marker"></div>
                        <div class="timeline-content">
                            <h3>Développeur web en alternance</h3>
                            <span><a href="https://www.oci.fr/" class="link" target="blank">OCI</a> | Septembre 2020 - Octobre 2021 </span>
                            <div>
                                <a href="https://www.oci.fr/" target="blank"><img class="img-float-right" src="./assets/img/logo-oci.png" alt="logo OCI"></a>
                                <p>
                                OCI, est <strong>un prestataire de services informatiques et digitaux</strong>, proposant aux entreprises une offre 360 dans l’accompagnement à la transformation numérique. Le service web que j’ai intégré est composé d’une équipe de 8 développeurs.&lrm;
                                <br>Développant principalement des portails web, les développements se font en PHP et l’équipe a fait le choix de travailler avec le framework Laravel.&lrm;<br><br>
                                Durant mon année d'alternance à OCI, j'ai pu approfondir mes connaissance en développemeb web PHP notamment avec le framework Laravel, mais j'ai aussi eu l'occasion de mener des projet, de faire leur suivi ainsi que la relation avec le client.&lrm;</p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-block timeline-block-right">
                        <div class="marker"></div>
                        <div class="timeline-content">
                            <h3>Titre professionnel Concepteur développeur d'application web</h3>
                            <span><a href="https://www.wildcodeschool.com/fr-FR" class="link" target="blank">Wild Code School</a> | Obtenu en Novembre 2021</span>
                            <div>
                                <a href="https://www.wildcodeschool.com/fr-FR" target="blank"><img class="img-float-left" src="./assets/img/logo-wild.png" alt="logo Wild Code School"></a>
                                <p>La Wild Code School est <strong>une école innovante</strong>  et un réseau européen de campus qui forment aux métiers tech des spécialistes adaptables.
                                C'est dans le centre de formation que j'ai effectué ma formation en alternance avec OCI.&lrm;<br><br>
                                Durant cette formation j'ai pu approfondir mes connaissances en développement web avec la découverte de nouveaux langages (NodeJs & React). Mais le contenu de la formation 
                                a permis d'aborder d'autres sujet comme le développement mobile en React Native & Flutter mais aussi des notions de DevOps avec la CI/CD et l'utilisation de Docker par exemple.&lrm;</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="timeline-block timeline-block-right">
                        <div class="marker"></div>
                        <div class="timeline-content">
                            <h3>Autoformation en développement web</h3>
                            <span><a href="https://openclassrooms.com/fr/" class="link" target="blank">OpenClassrooms</a> | Janvier 2019 à Aujourd'hui</span>
                            <div>
                            <a href="https://openclassrooms.com/fr/" target="blank"><img class="img-float-left" src="./assets/img/LogoOC.png" alt="logo OpenClassrooms"></a>
                                <p>Plateforme de formation en ligne connue et reconnues, ma  <strong>réorientation en développement web</strong> a commencé avec OpenClassrooms.<br><br>
                                Aujourd'hui titulaire de 10 certificats en développement web, je compte bien continuer à me former sur cette plateforme en ligne et sur d'autres...</p>
                            </div>
                        </div>
                    </div> -->
                    <div class="timeline-block timeline-block-left">
                        <div class="marker"></div>
                        <div class="timeline-content">
                            <h3>Titre professionnel Développeur web & web mobile</h3>
                            <span><a href="https://elan-formation.eu/" class="link" target="blank">ELAN Formation</a> | Obtenu en Juin 2020</span>
                            <div>
                                <a href="https://elan-formation.eu/" target="blank"><img class="img-float-right" src="./assets/img/logo-elan.png" alt="logo Elan formation"></a>
                                <p><strong>Centre de formation</strong> installé en Alsace depuis plus de 25 ans, c'est dans le centre de Strasbourg que j'ai effectué ma formation au <strong>Titre professionnel de Développeur web et web mobile</strong>.&lrm;<br><br>
                                Formé aux langages front et back-end par des formateurs compétents et passionnés, ils m'ont transmis les bonnes pratiques du développement web et m'ont accompagné durant mes apprentissages du développement, en formation.&lrm;</p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-block timeline-block-right">
                        <div class="marker"></div>
                        <div class="timeline-content">
                            <h3>Stage développeur web Magento 2</h3>
                            <span><a href="https://black.bird.eu/fr/" class="link" target="blank">Blackbird Agency</a> | Mars - Mai 2020</span>
                            <div>
                                <a href="https://black.bird.eu/fr/" class="link"><img class="img-float-left" src="./assets/img/logo-blackbird.png" alt="logo Blackbird agency"></a>
                                <p><strong>Agence de développement web</strong> spécialisée dans les projets e-commerce sur la solution CMS Magento.<br><br>
                                Ce stage m'a permis de découvrir le CMS <strong>Magento 2</strong> et de réaliser mon projet de stage:<br>
                                Le développement d'un module permettant l’import de fichiers CSV, le traitement et le stockage en base de données de ses informations et enfin l’affichage et la possibilité d’agir sur ces données dans l’espace administrateur de Magento 2. <br><br>
                                Ce stage a été très formateur, autant sur l’utilisation de PHP en tant que langage orienté objet et le design pattern MVP, que sur l’utilisation et la structure de Magento 2 dans un environnement Linux.</p>
                            </div>
                        </div>
                    </div>

                <div class="timeline-block timeline-block-left">
                    <div class="marker"></div>
                    <div class="timeline-content">
                        <h3>Stage développeur web</h3>
                        <span><a class="link" href="https://www.aw-innovate.com/" target="blank">AW Innovate</a> | Octobre - Novembre 2019</span>
                        <div>
                        <a href="https://www.aw-innovate.com/" target="blank"><img class="img-float-right" src="./assets/img/logoAW.jpg" alt="logo AW Innovate"></a>
                        <p><strong>AW Innovate est une agence digitale conseil en innovation</strong>. Elle accompagne les entreprises qui le souhaitent vers la création de leur site web.&lrm;<br><br>

                            Durant 2 semaines, au sein d'une équipe de développeurs, j'ai eu l'occasion de démarrer un projet concret et de réaliser la partie front et back d'un site web.&lrm; <br><br>
                            Cette expérience a été pour moi essentielle, elle m'a permis de mettre en pratique ce que j'ai appris durant les derniers mois, de me rendre compte du chemin parcouru et du chemin qu'il me restait à parcourir.&lrm;
                        </p>

                        </div>
                    </div>
                </div>

                <div class="timeline-block timeline-block-right">
                    <div class="marker"></div>
                    <div class="timeline-content">
                        <h3>Stage développeur web en programmatique</h3>
                        <span><a class="link" href="https://tradelab.com/" target="blank">Tradelab</a> | Mars - Avril 2019</span>
                        <div>
                            <a href="https://www.tradelab.com" target="blank"><img class="img-float-left" src="./assets/img/TRADELAB_Logo1.png" alt="Logo Tradelab"></a>
                            <p><strong>Tradelab est une start-up spécialiste des campagnes display, mobiles et vidéos programmatiques.</strong><br><br>
                                Durant ces 2 semaines, j’ai rencontré des développeurs Front (JavaScript, TypeScript et Angular), Back (PHP), QA (testeurs), Infra (maintenance serveurs).
                                Cette expérience en milieu professionnel a confirmé mon projet de réorientation dans le milieu du développement informatique. <br><br>
                                Après quelques mois à apprendre seul, il me semblait important de pouvoir expérimenter ce métier avant de me projeter dans une formation. 
                            </p>
                            </div>
                    </div>
                </div>
            </div>
           
        </section>
        <section id="contact" class="anchor">
            <h2 >Réseaux & Contacts</h2>
            <div class="center">
                <div><a class="socials" href="./assets/docs/CV-SylvainALLAIN.pdf" target="blank"><img src="./assets/img/file-pdf-solid.svg" alt="logo PDF"><p>&nbsp; Mon CV</p></a></div>
                <div><a class="socials" href="https://www.linkedin.com/in/sylvain-allain/" target="blank"><img src="./assets/img/linkedin-brands.svg" alt="logo LinkedIn"><p>&nbsp;LinkedIn</p></a></div>
                <div><a class="socials" href="https://github.com/S2LF" target="blank"><img src="./assets/img/github-square-brands.svg" alt="Logo GitHub"><p>&nbsp;GitHub</p></a></div>
            </div>
        </section>
       <hr class="style-two">
        <section class="form">
            <h3 class="center">Formulaire de contact</h3>
            <p class="center">N’hésitez pas à remplir ce formulaire si vous souhaitez me laisser un message !</p>
            <p class="center"><span>Je vous recontacterai dès que possible.</span></p>


            <form id="form" class="center" method="POST">
                <div class="center ">
                    <p>
                        <input type="text" name="nom" placeholder="Nom*" required>

                        <input type="email" name="mail" placeholder="E-Mail*" required>
                    </p>
                </div>
                <input id="sujet" type="text" name="sujet" placeholder="Sujet*" required>

                <p class="center"><textarea name="message" id="message" placeholder="Votre message*"></textarea></p>

                <p id="check"><input type="checkbox" id="coche" required> <label for="coche">En cochant cette case et en soumettant ce formulaire, j’accepte que mes données personnelles soient utilisées pour me recontacter dans le cadre de ma demande. Aucun autre traitement ne sera effectué avec mes informations.</label> </p>

                <input type="submit" name="post" id="post" value="Envoyer" class="button"><br>
                <i id="loading" class="fas fa-spinner fa-2x fa-spin" style="display: none;"></i>

                <input type="hidden" name="token" id="token">

            </form>

            <h4 class="center" style="color:green">
                <?php
                if(isset($_GET['success'])){
                   echo "Merci, le formulaire a bien été envoyé ! <br>Un mail de confirmation va vous être envoyé sur votre boîte mail. ";
                }
                ?>
            </h4>
            <h4 class="center" style="color:red">
                <?php
                if(isset($_GET['error'])){
                   echo "Une erreur est survenue dans l'envoie du formulaire ! Veuillez réessayer...";
                }
                ?>
            </h4>
        </section>

        <div class="ancre">
            <div id="ancre-wrapper" class="displayNone">
                <a href="#">
                    <i class="fas fa-arrow-alt-circle-up"></i>
                </a>
            </div>
        </div>
    </div>
    <footer>
            <img src="./assets/img/LogoASPixel4.png" alt="Mon logo">
            <p>Merci de votre visite</p>
            <p>Mon Portfolio - Version 6</p>
            <p>Made with <i class="fa fa-heart "></i> by Syl20 - Tous droits réservés - <?php echo date('Y') ?></p>
            <p><a href="./mentions.html">Mentions légales</a></p>

    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>

    <script>
    $("#check > input, #check > label").on('click', function(e){
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lds9qUZAAAAAHsrVexr99a8fy8CvABDBboJDPOI', {action: 'submit'}).then(function(token) {
            //   console.log(token)
                document.getElementById("token").value = token
            });
        });
    })


  </script>


    </body>

    </html>