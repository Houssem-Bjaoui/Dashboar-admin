<?php
session_start();
include("functions.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!------------------ Inclusion du fichier css ---------------->
    <link rel="stylesheet" href="profile_style.css">
    <link rel="stylesheet" href="table_style.css">

    <!-----------style css pour les bouttons----------------->
    <style>
        /* Bouton valid */
        button.valid {
            background-color: blue;
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
            margin-right: 5px;
        }


        /* Bouton Delete */
        button.delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
            margin-right: 5px;
        }
    </style>


    <title>Dashboard| Admin</title>
</head>

<body>

    <!-- Barre de navigation -->

    <div class="container">
  

    <?php
include('template/nav_bar.php');
?>



        <!--======================= Contenu principal =======================-->

        <div class="main">
            <div class="topbar">
                <!-- Bouton pour ouvrir le menu de navigation -->
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

               
                
            </div>
            <div class="table-container">
                <h3>Manage Users</h3>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (getusers() as $i => $user) {
                            $i++;
                            echo '<tr>
                         <td>' . $i . '</td>
                         <td>' . $user[1] . '</td>
                         <td>' . $user[2] . '</td>
                         <td>
                         <a href="valid.php?id=' . $user[0] . '">
                             <button class="valid">Valid</button>
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



    <!--====================Javascript=================  -->
    <script src="main.js"></script>
    <!-- Inclure le script Ionicons pour les navigateurs modernes -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>




</body>

</html>