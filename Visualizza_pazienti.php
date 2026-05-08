<!DOCTYPE HTML>

<html>
	<head>
		<title>Inserisci il vino</title>
		<link rel="stylesheet" href="style.css">
		<style>
			div {
					margin-bottom: 15px;
				}
		</style>
	</head>
	<body>
	    <nav>
            <a href="index.html">Home</a>
            <a href="VisualizzazioneVini.php">Inventario</a>
            <a href="inserisci_vino.php">Inserisci Vino</a>
            <a href="modifica_vino.php">Modifica vino</a>
        </nav>
		<form action="applica_modifica_vino.php" method="POST">
			<div>
				<h2>Modifica vino</h2<br>
			</div>
				<div class="form-group">
                    <label for="vino">Vino:</label>
                    <select id="vino" name="vino">
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
                        $sql = "SELECT Idm, M.Nome
                                FROM Medico as M;";
                        $ris = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($ris) > 0) {
                                            while($riga = mysqli_fetch_assoc($ris)) {
                                                echo "<td>" . htmlspecialchars($riga["M.Nome"]) . "</td>";
                                                echo '<option value="'.htmlspecialchars($riga["Idm"]).'">'.htmlspecialchars($riga["NomeVino"]).'</option>';
                                            }
                        }
                        ?>
                </select>
            </div>
            <button type="submit">Modifica</button>
        </form>
	</body>
</html>
