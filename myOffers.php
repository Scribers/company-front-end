<!doctype html>
<html>
<head>
    <title>LookingForJob Manager</title>
    <link id="bootstrap-sheet" rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-sortable.css">
    <link rel="icon" type="image/png" href="img/icon.png" />
    <script src="js/jquery-2.2.1.min.js"></script>
    <meta charset="utf-8">
</head>
<body>

<div class="container">
    <?php include("includes/nav.php") ?>
    <?php include("phpqrcode/qrlib.php") ?>

    <table class="table table-bordered table-striped sortable">
        <thead>
        <tr>
            <th>Titre de l'offre</th>
            <th>Date</th>
            <th></th>
        </tr>
        </thead>
        <tbody id="table-body">

        </tbody>
    </table>

    <div class="row">
        <div class="col-md-12">
            <canvas id="qrcode-area" width="400" height="400"></canvas>
        </div>
    </div>

<!--    <div hidden="hidden" id="logo"><img src="img/logo.png"> </div>-->

</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/html5shiv-printshiv.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/bootstrap-sortable.js"></script>
<script src="js/moment-with-locales.js"></script>
<script>moment.locale("fr")</script>
<script src="js/active.js"></script>
<script>setActive("myOffers");</script>
<script src="js/jquery.qrcode-0.12.0.min.js"></script>
<script>
    $.get( "http://restful-api.eu-gb.mybluemix.net/companies/0/offers", function( data ) {
        data = {"status":"success","content":[{"id":43,"company_id":42,"title":"Hello!"},{"id":46,"company_id":42,"title":"Hello2"}]};

        console.log(data); //TODO: remove this shit
        $.each(data.content, function( index, value ) {
            $("tbody#table-body").append('<tr><td>' + value.title + '</td><td data-dateformat="DD-MMM-YYYY">23 janvier 2014</td><td><a href="offer.php?id='+ value.id +'"><button type="button" class="btn btn-primary btn-sm" aria-label="Left Align"> <span class="glyphicon glyphicon-search" aria-hidden="true"> Gérer</span></button></a><a href="#" onclick="getQRCode(this)" qrcode-data="'+ value.id + ',' + value.name +',' + value.description + '"><button type="button" class="btn btn-primary btn-sm" aria-label="Left Align"> <span class="glyphicon glyphicon-qrcode" aria-hidden="true"> QRCode</span></button></a></td></tr>');

        });
    });
</script>
<script>
    var img = new Image();   // Crée un nouvel objet Image
    img.src = 'img/logo-transparent-qr.png'; // Définit le chemin vers sa source
</script>
<script>
    function getQRCode(button){
        $("canvas#qrcode-area").empty().qrcode({
            "size": 400,
            "color": "#3a3",
            "text": $(button).attr('qrcode-data'),
            "label": "QRJob",
            "fontcolor": "#0080C0",
            "fill": "#004080",
            "mode": 4,
            "image": img,
            "mSize": 0.13,
            "fontname": "sans",
            "value": "H"
        });
    }
</script>
</body>
</html>