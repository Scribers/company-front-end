<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link id="bootstrap-sheet" rel="stylesheet" href="css/bootstrap.min.css">
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
    <script src="js/autosize.min.js"></script>
</head>

<body>
<script>
    function success(data, status, jqXHR) {
        console.log(data);
        if(data.status === "successful") {
            Cookies.set('id', data.id, { expires: 0, path: '/' });
            console.log(Cookies.get('id'));
        }else{
            alert("Connexion échouée!");
        }
    }
    function sendForm() {
        var title = document.forms["signupForm"]["title"].value;
        var type = document.forms["signupForm"]["type"].value;
        var desc = document.forms["signupForm"]["description"].value;
        if (title == null || title == "") {
            alert('Vous devez spécifier un titre !(par exemple : "logisticien"');
            return false;
        }
        if (type == null || type == "") {
            alert("Vous devez spécifier le type de contrat! (CDD, CDI, Stage, ...)");
            return false;
        }
        if (desc == null || desc == "") {
            alert("Vous devez décrire le job!");
            return false;
        }

        var datarray = {"title" : title , "company_id" : Cookies.get("id"),
                        "type" : type , "description" : desc};
        $.post("https://restful-api.eu-gb.mybluemix.net/offers/create", datarray, success);
    }
</script>

<!-- Top content -->
        <div class="container" style="margin-top: 70px;">
            <?php include("includes/nav.php") ?>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>QRJob Manager</strong><br/> Creation d'une proposition d'emploi</h1>
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
                            <i class="fa fa-briefcase"></i>
                            <i class="fa fa-plus" style="font-size: small; margin-left: -13px;"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form class="form-horizontal" name="signupForm" onsubmit="return sendForm()"  role="form" action="createOffer.php" method="post">
                            <span id="titleForm">Inscription</span>
                            <div class="form-group">
                                <label for="nomRegister" class="col-sm-4 control-label">Intitulé</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" placeholder="Intitulé"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nomRegister" class="col-sm-4 control-label">Type</label>
                                <div class="col-sm-8">
                                    <input type="text" name="type" placeholder="Type (CDD, CDI, Stage, ...)"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nomRegister" class="col-sm-4 control-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea maxlength="400" class="form-control" rows="5"
                                              style="max-width:100%;min-width: 100%;resize: none;" type="text" name="desc" placeholder="Description ..."></textarea>
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


<!-- Javascript -->
<script src="js/jquery-2.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/scripts.js"></script>
<script>
    autosize($('textarea'));
</script>

<!--[if lt IE 10]>
<script src="js/placeholder.js"></script>
<![endif]-->

</body>

</html>