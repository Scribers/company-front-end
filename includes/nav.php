<script src="js/jquery-2.2.1.min.js"></script>
<script src="js/js.cookie.js"></script>
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">QRJob</a>
        </div>
        <div id="bs-example-navbar-collapse-1" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a id="index" href="index.php">Accueil</a></li>
                <li class="connected" hidden="hidden"><a id="createOffer" href="createOffer.php">Nouvelle offre</a></li>
                <li class="connected" hidden="hidden"><a id="myOffers" href="myOffers.php">Mes offres</a></li>
                <li class="connected" hidden="hidden"><a id="profile" href="profile.php">Mon profil</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li hidden="hidden" class="active notconnected"><a href="signup.php">S'inscrire <span class="sr-only">(current)</span></a></li>
                <li class="notconnected" hidden="hidden"><a href="login.php">Se connecter</a></li>
                <li class="connected" hidden="hidden"><a href="login.php" onclick="disconnect()">Se déconnecter</a></li>
                <li id="theme-selector">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Thème
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        </ul>
                    </div>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

<script>
    $('link#bootstrap-sheet').attr('href',Cookies.get('theme'));
</script>
<script>
    $.ajax({
        type: 'GET',
        url: 'https://bootswatch.com/api/3.json',
        dataType:'json',
        success: function (data) {
            $.each(data.themes, function( index, theme ) {
                $('#theme-selector').find('ul.dropdown-menu').append('<li><a href="#" theme-url="'+ theme.cssMin +'">'+ theme.name +'</a></li>');
            });
            $('#theme-selector').find('ul.dropdown-menu').find('a').each(function( index ) {
                $(this).click(function() {
                    setTheme($(this).attr("theme-url"));
                });
            });
        }
    });
</script>
<script>
    function setTheme(url){
        Cookies.set('theme', url, { expires: 7, path: '/' });
        $('link#bootstrap-sheet').attr('href',Cookies.get('theme'));
    }
</script>
<script>
    if(Cookies.get('id') !== undefined){
        $('.notconnected').hide();
        $('.connected').show();
    } else {
        $('.connected').hide();
        $('.notconnected').show();
    }
</script>
<script>
    function disconnect(){
        Cookies.remove('id');
    }
</script>