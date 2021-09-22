<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de" xml:lang="de">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Tabelle</title>
        <link rel="stylesheet" type="text/css" href="styles.css" />
    </head>

    <body>
        <div id="background">
            <div id="intro6tabelle">
                <div id="intro6background">
                    <p id="intro6font">Alle Daten von Kunden</p>
                    <hr id="hrpic"><br>
                    <p id="intro6font1">Diese Tabelle speichert alle Daten von Kunden</p>
                </div>

                <div id="intro6inhalt">

        <?php 
            $f = fopen("Text/log.txt", "r");

            if ($f == NULL)
            {
                echo '<p id="intro6left">Datei existiert nicht.</p>';
            }

            else
            {
                if(isset($_POST['schreiben']))
                {
                    $vorname = $_POST['Vorname'];
                    $nachname = $_POST['Nachname'];
                    $mail = $_POST['Mail'];
                    $frage = $_POST['frage'];

                    fputs($f, $vorname . "\t");
                    fputs($f, $nachname . "\t");
                    fputs($f, $mail . "\t");
                    fputs($f, $frage . "\n");
                }

                $dummy = filesize("Text/log.txt");

                if($dummy == 0)
                {
                    echo '<p id="intro6left">es ist nichts drin.</p>';
                    fclose($f);
                }

                else
                {
                    echo "<center>";
                    echo '<table border = "3" id="customers">';
                    echo '<tr>';
                    echo '<th>Datum</th>';
                    echo '<th>Vorname</th>';
                    echo '<th>Nachname</th>';
                    echo '<th>Telefonnummer</th>';
                    echo '<th>E-Mail</th>';
                    echo '<th>Adresse</th>';
                    echo '<th>Hausnummer</th>';
                    echo '<th>Wunsch</th>';
                    echo '<th>Vorhangsnummer</th>';
                    echo '<th>Wunschtermin1</th>';
                    echo '<th>Wunschtermin2</th>';
                    echo '<th>Wunschtermin3</th>';
                    echo '</tr>';

                    while (!feof($f)) 
                    {
                        $zeile = fgets($f, 4096);
                        $zeileAnzahl = explode("\t",$zeile);
                        echo '<tr>';

                        foreach($zeileAnzahl as $zeilenelement)
                        {
                            echo '<td>' . $zeilenelement . '</td>';
                        }

                        echo '</tr>';
                    }
                    echo '</table>';
                    echo "</center>";
                    fclose($f);
                }
            }
        ?>

        <br><a href="bestellen.php" id="link_tabelle">Züruck</a>

        </div>
            </div>
                </div>

                <div id="kopf">
            <table>
                <tr>
                    <td><a href="home.php"><img src="Bilder/logo.png" alt="logo" id="logo" /></a></td>
                    <td><a href="Impressum.php">Impressum</a></td>
                    <td><a href="https://berufskolleg.de/kontakt-2">Kontakt</a></td>
                    <td><a href="https://wikipedia.com">Quelle</a></td>
                    <td><a href="https://berufskolleg.de">Schule</a></td>
                    <td><a href="https://imgur.com">Bilder</a></td>
                </tr>
            </table>
        </div>
    </body>
</html>