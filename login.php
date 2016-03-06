<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QRJob Manager - Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link id="bootstrap-sheet" rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/form-elements.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/icon.png" />

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

    <!-- cookies gestion -->
    <script src="js/cookies.js"></script>
</head>

<body>

<!-- Top content -->
        <div class="container" style="margin-top: 70px;">
            <?php include("includes/nav.php") ?>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>QRJob Manager</strong><br/> Formulaire de connexion</h1>
                    <div class="description">
                        <p>
                            Entrez vos identifiants pour vous connecter !
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Se connecter à un compte QRJob</h3>
                            <p>Entrez votre nom de compte et votre mot de passe :</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form class="form-horizontal" name="signupForm" onsubmit="return sendForm()" action="index.php" role="form" method="post">
                            <span id="titleForm">Inscription</span>
                            <div class="form-group">
                                <label for="emailRegister" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" placeholder="Email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passwordRegister" class="col-sm-3 control-label">Mot de passe</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" placeholder="Mot de passe."/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <input onclick="test()" type="submit" class="btn btn-default" value="Se connecter"/>
                                </div>
                            </div>
                        </form>
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

<script>
    function success(data, status, jqXHR) {
        console.log(data);
        console.log("hello success");
        if(data.status === "successful") {
            Cookies.set('id', data.id, { expires: 0, path: '/' });
            console.log("ejaejaze: "+Cookies.get('id'));
        }else{
            alert("Connexion échouée!");
        }
    }
    function sendForm() {
        var email = document.forms["signupForm"]["email"].value;
        var password = document.forms["signupForm"]["password"].value;
        if (email == null || email == "") {
            alert("Vous devez spécifier un email!");
            return false;
        }
        if (password == null || password == "") {
            alert("Vous devez entrer un mot de passe!");
            return false;
        }

        var datarray = {"mail" : email , "password" : password };
        $.post("https://restful-api.eu-gb.mybluemix.net/login", datarray, success);
    }
    function test(){
        Cookies.set('id', '19');
    }
</script>

</body>

</html>