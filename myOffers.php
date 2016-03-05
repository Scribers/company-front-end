<!doctype html>
<html>
<head>
    <title>LookingForJob Manager</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-sortable.css">
    <link rel="icon" type="image/png" href="./ressources/images/icon.png" />
    <script src="js/jquery-2.2.1.min.js"></script>
    <meta charset="utf-8">
</head>
<body>

<div class="container">
    <?php include("includes/nav.php") ?>
    <?php include("phpqrcode/qrlib.php") ?>

    <script>
        jQuery.support.cors = true;

        var jsonVar = {"status":"success","content":[{"id":43,"company_id":42,"title":"Hello!"},{"id":46,"company_id":42,"title":"Hello2"}]};


        /*$.ajax({
            type: 'GET',
            url: 'http://restful-api.eu-gb.mybluemix.net/companies/0/offers',
            data: { get_param: 'value' },
            dataType:'json',
            success: function (data) {
                var content = data.content;
                $('#test').html(content);
            }
        });*/


    </script>

    <table class="table table-bordered table-striped sortable">
        <thead>
        <tr>
            <th>Titre de l'offre</th>
            <th>Date</th>
            <th></th>
        </tr>
        </thead>
        <tbody id="table-body">
        <tr>
            <td>aaaa</td>
            <td data-dateformat="DD-MMM-YYYY">23 janvier 2014</td>
            <td><button type="button" class="btn btn-primary btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"> Gérer</span>
                </button></td>
        </tr>
        <tr>
            <td>bbbb</td>
            <td data-dateformat="DD-MMM-YYYY">26 janvier 2013</td>
            <td><button type="button" class="btn btn-primary btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"> Gérer</span>
                </button></td>
        </tr>
        </tbody>
    </table>

    <div id="test"></div>




<!--    --><?php
/*
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);


    $filename = $PNG_TEMP_DIR.'test.png';

    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'H';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];

    $matrixPointSize = 8;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);

    QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';
 */?>

</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/html5shiv-printshiv.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/bootstrap-sortable.js"></script>
<script src="js/moment-with-locales.js"></script>
<script>moment.locale("fr")</script>
<script src="js/active.js"></script>
<script>setActive("myOffers");</script>
<script>
    $.each(jsonVar.content, function( index, value ) {
        $("tbody#table-body").append('<tr><td>' + value.title + '</td><td data-dateformat="DD-MMM-YYYY">23 janvier 2014</td><td><a href="offer.php?id='+ value.id +'"><button type="button" class="btn btn-primary btn-sm" aria-label="Left Align"> <span class="glyphicon glyphicon-search" aria-hidden="true"> Gérer</span></button></a></td></tr>');
    });
</script>
</body>
</html>