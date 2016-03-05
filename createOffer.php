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

    <!-- cookies gestion -->
    <script src="js/cookies.js"></script>
</head>

<body>
<script>
    function sendForm() {
        var title = document.forms["signupForm"]["title"].value;
        if (title == null || title== "") {
            alert("Vous devez spécifier un email!");
            return false;
        }

        var data = new FormData();
        data.append('title', title);

        var url = "http://restful-api.eu-gb.mybluemix.net/login";
        var client = new XMLHttpRequest();
        client.open("POST", url);
        client.setRequestHeader("Content-Type", "text/plain");
        client.send(data);
        if (client.status == 200)
            alert("The request succeeded!\n\nThe response representation was:\n\n" + client.responseText)
        else
            alert("The request did not succeed!\n\nThe response status was: " + client.status + " " + client.statusText + ".");
        client.close();
        document.cookie.toJSON()
        document.cookie['lol'] = 4;
    }
</script>

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
                        <form class="form-horizontal" name="signupForm" onsubmit="return sendForm()"  role="form" action="createOffer.php" method="post">
                            <span id="titleForm">Inscription</span>
                            <div class="form-group">
                                <label for="nomRegister" class="col-sm-3 control-label">Intitulé</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" placeholder="Intitulé"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <input type="submit" class="btn btn-default" value="Créer !"/>
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