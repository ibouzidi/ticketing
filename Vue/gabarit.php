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
        <a href="index.php?action=gestiontickets">
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
                                <li <?php  if ($_GET['action'] == "gestiontickets"
                                || $_GET['action'] == "editerticket"
                                || $_GET['action'] == "billet"
                                || $_GET['action'] == "rechercher"
                                || $_GET['action'] == "commenter"
                                ):?>class="active" <?php endif;?>>
                                    <a href="index.php?action=gestiontickets">Gestions des tickets
                                        <span class="pull-right">142</span></a>
                                </li>

                                <li <?php if($_GET['action'] == "gestionsetat" 
                                || $_GET['action'] == 'editetat'
                                || $_GET['action'] == 'supprimerEtat'):?>class="active" <?php endif;?>>
                                    <a href="index.php?action=gestionsetat">Gestions des Etats
                                        <span class="pull-right">52</span></a></li>

                                <li <?php if($_GET['action'] == "formajoutticket"):?>class="active" <?php endif;?>>
                                    <a href="index.php?action=formajoutticket">Ajouter un ticket</a></li>

                                <li <?php if($_GET['action'] == "formajoutetat"):?>class="active" <?php endif;?>>
                                    <a href="index.php?action=formajoutetat">Ajouter un etat</a></li>

                            </ul>

                        </div>
                    </div>
                </div>
                <!-- END NAV TICKET -->

                <div class="col-md-7">
                    <div class="grid support-content">
                        <div class="grid-body">
                            <h2>Issues</h2>

                            <hr>
                            <div class="padding"></div>


                            <?=$contenu?>


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