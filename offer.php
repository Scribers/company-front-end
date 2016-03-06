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

    <table class="table table-striped" id="applications">
    </table>

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
    console.log("id : " +Cookies.get("id"));
    $.get("http://restful-api.eu-gb.mybluemix.net/companies/"+ Cookies.get("id") +"/applications", function (data) {
        //console.log(data);
        $.each(data.content, function( index, value ) {
            console.log(value);
            var name;
            var mail;
            $.get("http://restful-api.eu-gb.mybluemix.net/users/"+ value.user_id, function (data) {
                name = data.content.name;
                mail = data.content.mail;
            }).done(function() {

                $("table#applications").append('<tr><td>'+ name +'</td><td>'+ mail +'</td>' +
                    '<td onclick="toggleMe(this)" id="'+ index +'">'+
                    '<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span> Détails </button>'+
                    '</td></tr>' +
                    '<tr><td colspan="4" toggle="'+ index +'">'+ value.cover_letter +
                    '<br><button type="button" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Accepter </button>' +
                    '<button type="button" class="btn btn-danger btn-lg" style="margin-left: 10px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Refuser </button>' +
                    '</td></tr>');
                $('td[toggle]').hide();
            });




        });

    });
    //$('td[toggle]').descendants().hide();

</script>
<script>
    function toggleMe(button){
        var toggleid = $(button).attr("id");
        $("td[toggle="+ toggleid +"]").slideToggle('300');
    }
</script>
</body>
</html>