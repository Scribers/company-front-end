<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/form-elements.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <?php include("includes/nav.php") ?>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>LookingforWork Manager</strong><br/> Creation d'une proposition d'emploi</h1>
                    <div class="description">
                        <p>
                            Décrivez le job !
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Créer une nouvelle annonce</h3>
                            <p>Entrez la description de l'annonce ci-dessous :</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <?php
                        $erreur = array();
                        if($_SERVER['REQUEST_METHOD']=='POST'){ //si post
                            //Verification des champs
                            if ( empty( $_POST[ 'title' ] ) ) {
                                $erreur['title']="Veuillez entrer un intitulé.";
                            } else {
                                $c = mysql_real_escape_string($_POST[ 'title' ] );
                            }
                            if ( empty( $erreur ) ) { //si pas d'erreur todo change request
                                $q = "INSERT INTO t_user ( id , username , password, email, company) VALUES ('',:u, :pwd, :e, :c)";
                                $sth = $dbc -> prepare($q);
                                $r = $sth ->execute(array(':u'=>$u,':pwd'=>SHA1($pwd),':e'=>$e,':c'=>$c));

                                if ( $r ) {
                                    echo '<h1>Inscription réussie!</h1>
                            <p>Vous êtes maintenant enregistré.</p>
                            <p>Vous allez être redirigé !</p>';
                                    echo "</div></div>";
                                    include ( 'includes/footer.php' );
                                    $url = "connect.php";
                                    function redirige($url)
                                    {
                                        die('<meta http-equiv="refresh" content="3;URL='.$url.'">');
                                    }
                                    redirige($url);
                                }
                                exit();
                            }
                        }
                        ?>
                        <form class="form-horizontal" method="post" role="form">
                            <span id="titleForm">Inscription</span>
                            <div class="form-group">
                                <label for="nomRegister" class="col-sm-3 control-label">Intitulé</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" <?php if(isset($_POST['title']) && empty($erreur['title'])){echo 'value="'.$_POST['title'].'"';} ?> name="title" placeholder="Intitulé">
                                    <?php if(isset($_POST['title']) && !empty($erreur['title'])){echo '<span class="text-danger">'.$erreur['title'].'</span>';}?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button type="submit" class="btn btn-default">Créer !</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="js/jquery-2.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="js/placeholder.js"></script>
<![endif]-->

</body>

</html>