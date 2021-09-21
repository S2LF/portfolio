<?php


sleep(1);
$nom=htmlspecialchars($_POST['nom'], ENT_QUOTES,'UTF-8');
$mail=htmlspecialchars($_POST['mail'], ENT_QUOTES,'UTF-8');
$sujet=htmlspecialchars($_POST['sujet'], ENT_QUOTES,'UTF-8');
$message=htmlspecialchars($_POST['message'], ENT_QUOTES,'UTF-8');
$no_email=htmlspecialchars($_POST['no_email'], ENT_QUOTES,'UTF-8');

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