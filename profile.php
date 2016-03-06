<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QRJob Manager - Profil</title>

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
    <script src="js/autosize.min.js"></script>
</head>

<body>

<script>
    function success(data, status, jqXHR) {
        console.log(data);
        if(data.status == "successful") {
            alert("successful");
            Cookies.set('id', data.id, { expires: 0, path: '/' });
        }else{
            alert("Inscription ratée!");
        }
    }
    function sendForm() {
        var company = document.forms["infosForm"]["company"].value;
        var email = document.forms["infosForm"]["email"].value;
        var short_desc = document.forms["infosForm"]["short_desc"].value;
        var desc = document.forms["infosForm"]["desc"].value;
        if (company == null || company == "") {
            alert("Vous devez entrer un nom d'entreprise!");
            return false;
        }
        if (email == null || email== "") {
            alert("Vous devez entrer un email!");
            return false;
        }
        if (short_desc == null || short_desc == "") {
            alert("Vous devez choisir un mot de passe!");
            return false;
        }
        if (desc == null || desc == "") {
            desc = short_desc;
        }

        var datarray = { "name" : company , "mail" : email,
            "short_description" : short_desc, "description" : desc, "details" : null};
        $.post("https://restful-api.eu-gb.mybluemix.net/companies/update", datarray, success);
    }
</script>

<!-- Top content -->
        <div class="container" style="margin-top: 70px;">
            <?php include("includes/nav.php") ?>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>QRJob Manager</strong><br/> Modification du profil</h1>
                    <div class="description">
                        <p>
                            Mettez ici à jour les informations vous concernant.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Informations sur l'entreprise</h3>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-info-circle"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form class="form-horizontal" name="infosForm" onsubmit="return sendForm()"  role="form">
                            <span id="titleForm">Informations</span>
                            <div class="form-group">
                                <label for="nom" class="col-sm-4 control-label">Nom de l'entreprise</label>
                                <div class="col-sm-8">
                                    <input type="text" name="company" placeholder="Entreprise"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" placeholder="Email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="short_desc" class="col-sm-4 control-label">Description courte</label>
                                <div class="col-sm-8">
                                    <textarea maxlength="100" class="form-control" rows="5" style="max-width:100%;min-width: 100%;resize: none;" type="text" name="short_desc" placeholder="Description courte de votre entreprise"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-4 control-label">Description complète</label>
                                <div class="col-sm-8">
                                    <textarea maxlength="400" class="form-control" rows="5" style="max-width:100%;min-width: 100%;resize: none;" type="text" name="desc" placeholder="Description complète de votre entreprise"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <input type="submit" class="btn btn-default" value="Mettre à jour"/>
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