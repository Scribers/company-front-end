<!doctype html>
<html>
<head>
    <title>LookingForJob Manager</title>
    <link id="bootstrap-sheet" rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-sortable.css">
    <link rel="icon" type="image/png" href="img/icon.png"/>
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
            <th>Type</th>
            <th>Rom ID</th>
            <th>Date</th>
            <th></th>
        </tr>
        </thead>
        <tbody id="table-body">

        </tbody>
    </table>

    <div id="modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <canvas id="qrcode-area" width="400" height="400"></canvas>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" aria-label="Left Align" onclick="printCanvas()">
                        <span class="glyphicon glyphicon-print" aria-hidden="true">Imprimer</span>
                    </button>
                </div>
            </div>

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
    $.get("http://restful-api.eu-gb.mybluemix.net/companies/0/offers", function (data) {
        data = {
            "status": "success",
            "content": [{"id": 43, "company_id": 42, "title": "Hello!"}, {
                "id": 46,
                "company_id": 42,
                "title": "Hello2"
            }]
        };

        console.log(data); //TODO: remove this shit
        $.each(data.content, function (index, value) {
            $("tbody#table-body").append('<tr><td>' + value.title + '</td>' +
                '<td>' + value.type + '</td>' +
                '<td>' + value.rom_id + '</td>' +
                '<td data-dateformat="DD-MMM-YYYY">' + (index + 1) + ' janvier 2014</td>' +
                '<td><a href="offer.php?id=' + value.id + '">' +
                '<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align"> ' +
                '<span class="glyphicon glyphicon-search" aria-hidden="true"> Gérer</span></button></a>' +
                '<a href="#" onclick="getQRCode(this)" offer="' + value.name + '" qrcode-data="' + value.id + ',' + value.name + ',' + value.description + '">' +
                '<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align"> ' +
                '<span class="glyphicon glyphicon-qrcode" aria-hidden="true"> QRCode</span></button></a></td></tr>');
        });
    });
</script>
<script>
    var img = new Image();   // Crée un nouvel objet Image
    img.src = 'img/logo-transparent-qr.png'; // Définit le chemin vers sa source
</script>
<script>
    function getQRCode(button) {
        $("#modal").modal();
        myCanvas = document.getElementById("qrcode-area");
        context = myCanvas.getContext("2d");
        context.clearRect(0, 0, myCanvas.width, myCanvas.height);
        $(myCanvas).qrcode({
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
        $(myCanvas).attr("text", $(button).attr("offer"));
    }

    function printCanvas() {
        var dataUrl = document.getElementById('qrcode-area').toDataURL(); //attempt to save base64 string to server using this var
        var windowContent = '<!DOCTYPE html>';
        windowContent += '<html>';
        windowContent += '<head><title>' + $("canvas#qrcode-area").attr("text") + '</title></head>';
        windowContent += '<body>';
        windowContent += '<img src="' + dataUrl + '">';
        windowContent += '</body>';
        windowContent += '</html>';
        var printWin = window.open('', '', 'width=340,height=260');
        printWin.document.open();
        printWin.document.write(windowContent);
        printWin.document.close();
        printWin.focus();
        printWin.print();
        printWin.close();
    }
</script>
</body>
</html>