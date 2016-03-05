<?php
include "restExporter.php";
$erreur = array();
    //Verification des champs
    if ( empty( $_POST[ 'company' ] ) ) {
        $erreur['company']="Veuillez entrer un nom de compagnie.";
    } else {
        $c = mysql_real_escape_string($_POST[ 'company' ] );
    }
    if ( empty( $_POST[ 'email' ] ) ) {
        $erreur['email']="Veuillez entrer une adresse email.";
    } else {
        $e = mysql_real_escape_string($_POST[ 'email' ] );
    }
    if ( empty( $_POST[ 'password' ] ) ) {
        $erreur['password']="Veuillez entrer un mot de passe.";
    } else {
        $pwd = mysql_real_escape_string($_POST[ 'password' ] );
    }
    if ( empty( $erreur ) ) { //si pas d'erreur
        echo "prout";
        $data = array();
        $data['email'] = $e;
        $data['password'] = sha1($pwd);
        $data['company'] = $c;

        echo "now";
        $r = curl_post("/companies/create", $data);
        echo "nooow";
        echo $r;
        $r = json_decode($r);
        echo $r;
        echo "prr";
        if ( $r ) {
            echo '<h1>Inscription réussie!</h1>
                                <p>Vous êtes maintenant enregistré.</p>
                                <p>Vous allez être redirigé !</p>';
            echo "</div></div>";
            include ( 'includes/footer.php' );
            $url = "signup.php";
            function redirige($url)
            {
                die('<meta http-equiv="refresh" content="3;URL='.$url.'">');
            }
            redirige($url);
        }
        exit();
    }
?>