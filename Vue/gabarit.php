<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
    <meta content="Système de ticketing projet numéro 2 pour l'examin" name="descriptison">
    <meta content="Systeme ticketing étudiants lycée Simone Weil Saint-Priest-en-Jarez application projet"
        name="keywords">

    <!-- Favicons -->
    <link href="" rel="icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="Contenu/normalize.css" rel="stylesheet">
    <link href="Contenu/style.css" rel="stylesheet">

</head>


<body>
    <header>
        <a href="index.php">
            <center>
                <h1 id="titreBlog" class="center">Gestionnaire des tickets</h1>
            </center>
        </a>
        <hr>
    </header>

    <div class="container">
        <section class="content">
            <div class="row">
                <!-- BEGIN NAV TICKET -->
                <div class="col-md-5">
                    <div class="grid support">
                        <div class="grid-body">
                            <h2>Gestions</h2>

                            <hr>

                            <ul>
                                <li class="active"><a href="index.php">Liste des tickets<span
                                            class="pull-right">142</span></a></li>
                                <li><a href="index.php?action=gestionsetat">Gestions des Etats<span
                                            class="pull-right">52</span></a></li>
                            </ul>

                            <?php 
                            
                            if(isset($_GET['action']) == 'gestionsetat' || isset($_GET['action']) == 'editetat')
                            {
                                include('vueAddEtat.php');
                            }elseif(isset($_GET['action']) == '' || isset($_GET['action']) == 'editerticket'){
                                include('vueAddTicket.php');
                            }
                            
                        
                            ?>
                        </div>
                    </div>
                </div>
                <!-- END NAV TICKET -->
                <!-- BEGIN TICKET -->

                <div class="col-md-7">
                    <div class="grid support-content">
                        <div class="grid-body">
                            <h2>Issues</h2>

                            <hr>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default active">162 Ouvert</button>
                                <button type="button" class="btn btn-default">95,721 Fermé</button>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    Trier
                                    par: <strong>Nouveaux</strong> <span class="caret"></span></button>
                                <ul class="dropdown-menu fa-padding" role="menu">
                                    <li><a href="#"><i class="fa fa-check"></i> Dernier</a></li>
                                    <li><a href="#"><i class="fa"> </i> Autres</a></li>
                                </ul>

                            </div>
                            <div class="padding"></div>

                            <div class="row">
                                <?= $contenu ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END TICKET -->
            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <footer id="piedBlog">
        <center>
            Système ticketing POO
        </center>

    </footer>
</body>

</html>