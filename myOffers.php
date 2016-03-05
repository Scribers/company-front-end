<!doctype html>
<html>
<head>
    <title>LookingForJob Manager</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-sortable.css">
    <link rel="icon" type="image/png" href="./ressources/images/icon.png" />
    <meta charset="utf-8">
</head>
<body>

<div class="container">
    <?php include("includes/nav.php") ?>

    <table class="table table-bordered table-striped sortable">
        <thead>
        <tr>
            <th>Title1</th>
            <th>Title2</th>
            <th>Title3</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td data-dateformat="DD-MMM-YYYY">23 janvier 2014</td>
            <td>aaaa</td>
            <td>test 3</td>
        </tr>
        <tr>
            <td data-dateformat="DD-MMM-YYYY">26 janvier 2013</td>
            <td>bbbb</td>
            <td>test 33</td>
        </tr>
        </tbody>
    </table>

</div>

<script src="js/jquery-2.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/html5shiv-printshiv.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/bootstrap-sortable.js"></script>
<script src="js/moment-with-locales.js"></script>
<script>moment.locale("fr")</script>
<script src="js/active.js"></script>
<script>setActive("myOffers");</script>
</body>
</html>