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
        <div class="col-md-6">
            <canvas id="qrcode-area"></canvas>
        </div>
    </div>

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
        $.each(data.content, function( index, value ) {
            $("tbody#table-body").append('<tr><td>' + value.title + '</td><td data-dateformat="DD-MMM-YYYY">23 janvier 2014</td><td><a href="offer.php?id='+ value.id +'"><button type="button" class="btn btn-primary btn-sm" aria-label="Left Align"> <span class="glyphicon glyphicon-search" aria-hidden="true"> Gérer</span></button></a>' +
                '' +
                '' +
                '' +
                '<a href="#" onclick="getQRCode(this)" qrcode-data="'+ value.id + ',' + value.name +',' + value.description + '"><button type="button" class="btn btn-primary btn-sm" aria-label="Left Align"> <span class="glyphicon glyphicon-qrcode" aria-hidden="true"> QRCode</span></button></a>' +
                '</td></tr>');

        });
    });
</script>
<script>
    function getQRCode(button){
        $("canvas#qrcode-area").empty().qrcode({
            "size": 100,
            "color": "#3a3",
            "text": button.attr('qrcode-data'),
            "label": "QRJob",
            "fontColor": "#0080C0",
            "fill": "#004080",
            "mode": 2
        });
    }
</script>
</body>
</html>