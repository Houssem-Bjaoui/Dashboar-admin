<?php
session_start();

include('functions.php');



$hotels=gethotels();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclusion du fichier de style -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="table_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

 
    <title>Dashboard| Admin</title>
</head>


<body>

    <!-- Barre de navigation -->
    <div class="container-fluid p-0">
       
    <?php
include('template/nav_bar.php');
?>


        
        <!-- Contenu principal -->
        <div class="main">
            <div class="topbar">
                <!-- Bouton pour ouvrir le menu de navigation -->
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                
                <!-- button ajouter hotel -->
                <div class="button">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><strong>+Ajouter Hotel</strong></button>
                </div>
            </div>
            <div class="table-container">
                <h3>Manage Hotels</h3>
                <?php
                if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
                    print '
    <div class="alert alert-success">
        Hotel ajoutee avec succes
    </div>';
                }
                ?>

                <?php
                if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
                    print '
    <div class="alert alert-success">
        Hotel supprimee avec succes
    </div>';
                }
                ?>

<?php
                if (isset($_GET['edit']) && $_GET['edit'] == "ok") {
                    print '
    <div class="alert alert-success">
        Hotel modifiée avec succes
    </div>';
                }
                ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hotel Name</th>
                            <th>Ville</th>
                            <th>Pays</th>
                            <th>Etoiles</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($hotels as $i => $hotel) {
                            $i++;
                            echo '<tr>
                         <td>' . $i . '</td>
                         <td>' . $hotel[1] . '</td>
                         <td>' . $hotel[2] . '</td>
                         <td>' . $hotel[3] . '</td>
                         <td>' . $hotel[4] . '</td>
                         <td>

                         <button data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-success">Modify</button>

                         <a href="supprimer.php?idh=' . $hotel['0'] . '">
                             <button class="btn btn-danger">Delete</button>
                             </a>
                         </td>
                     </tr>';
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>


    </div>


    <!-- Ajout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Hotel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="ajouthotel.php" method="post">
                        <div class="form-group">
                            Nom de l'hotel:<input type="text" name="nom" class="form-control">

                        </div>
                        <div class="form-group">

                            Ville:<input type="text" name="ville" class="form-control">

                        </div>
                        <div class="form-group">

                            Pays:<input type="text" name="pays" class="form-control">
                            <div class="form-group">

                                Etoiles:<input type="text" name="etoile" class="form-control">

                            </div>

                        </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php foreach($hotels as $index => $hotel) { ?>
    <!-- Modifier Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Hotel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="modifier.php" method="post">
                        <input type="hidden" name="idh" value="<?php echo $hotel['0'] ?>" >
            
                        <div class="form-group">
                            Nom de l'hotel: <input type="text" name="nom" class="form-control" value="<?php echo $hotel['1'] ?>">
                        </div>
                        <div class="form-group">
                            Ville: <input type="text" name="ville" class="form-control" value="<?php echo $hotel['2'] ?>">
                        </div>
                        <div class="form-group">
                            Pays: <input type="text" name="pays" class="form-control" value="<?php echo $hotel['3'] ?>">
                        </div>
                        <div class="form-group">
                            Etoiles: <input type="text" name="etoile" class="form-control" value="<?php echo $hotel['4'] ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>



    

    <!--====================Javascript=================  -->
    <script src="main.js"></script>
    <!-- Inclure le script Ionicons pour les navigateurs modernes -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>