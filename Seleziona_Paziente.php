<!DOCTYPE HTML>
<html>
<head>
<Titlte> Gestione Ospedale </title>
</head>

<body>
<h1> Ospedale </h1>
<h2> Gestione cartelle cliniche pazienti</h2>


 <form action="Visualizza_pazienti.php" method="POST">
 
 <?php
                        // --- PARTE PHP: LOGICA E CONNESSIONE ---
                        error_reporting(E_ALL);
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                    
                        $servername = "localhost";
                        $username = "valerio.conti_app";
                        $password = "VxChXGe5&qPB";
                        $db_name = "5DINF_Ospedale_valerio.conti";
                       
                        // Mi connetto
                        $conn = mysqli_connect($servername, $username, $password, $db_name);
                       
                        // Controllo la connessione
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                    
                        // Eseguo la query sulla tabella VINO con i JOIN corretti
                        $sql = "SELECT IdP, Nome
                                FROM Paziente;";
                        $ris = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($ris) > 0) {
                                            while($riga = mysqli_fetch_assoc($ris)) {
                                                echo "<td>" . htmlspecialchars($riga["Nome"]) . "</td>";
                                                echo '<option value="'.htmlspecialchars($riga["IdP"]).'">'.htmlspecialchars($riga["NomeP"]).'</option>';
                                            }
                        }
                        ?>
					 </select>
            </div>
            <button type="submit">Mostra Cartella Paziente</button>
        </form>
    </body>
</html>
