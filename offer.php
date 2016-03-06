<!doctype html>
<html>
<head>
    <title>QRJob Manager - Offre</title>
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

    <table class="table table-bordered table-striped sortable">
        <thead>
        <tr>
            <th>Titre de l'offre</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody id="table-body">
        </tbody>
    </table>

    <div id="test"></div>

</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/html5shiv-printshiv.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/bootstrap-sortable.js"></script>
<script src="js/moment-with-locales.js"></script>
<script>moment.locale("fr")</script>
<script src="js/active.js"></script>
<script src="js/get-parser.js"></script>
<script>
    var id = getUrlParameter("id");

    $.get( "http://restful-api.eu-gb.mybluemix.net/offers/"+id, function( data ) {
        $('#test').html(data.content);
    });

</script>
</body>
</html>