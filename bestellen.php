<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de" xml:lang="de">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Bestellung</title>
        <link rel="stylesheet" type="text/css" href="styles.css" />
    </head>

    <body>
        <?php
            $vorname = "";
            $nachname = "";
            $anrede = "";
            $email = "";
            $telnr = "";
            $adresse = "";
            $hausnr = "";
            $wunsch = "";
            $termin1_datum = "";
            $termin2_datum = "";
            $termin3_datum = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                if (isset($_POST['Vorname']))
                { //change name content only if the post value is set!
                    $vorname = filter_input (INPUT_POST, 'Vorname', FILTER_SANITIZE_STRING); //filter value
                }

                if (isset($_POST['Nachname']))
                { //change name content only if the post value is set!
                    $nachname = filter_input (INPUT_POST, 'Nachname', FILTER_SANITIZE_STRING); //filter value
                }

                if (isset($_POST['Anrede']))
                { //change name content only if the post value is set!
                    $anrede = filter_input (INPUT_POST, 'Anrede', FILTER_SANITIZE_STRING); //filter value
                }

                if (isset($_POST['Email']))
                { //change name content only if the post value is set!
                    $email = filter_input (INPUT_POST, 'Email', FILTER_SANITIZE_STRING); //filter value
                }

                if (isset($_POST['Telefon']))
                { //change name content only if the post value is set!
                    $telnr = filter_input (INPUT_POST, 'Telefon', FILTER_SANITIZE_STRING); //filter value
                }

                if (isset($_POST['Adresse']))
                { //change name content only if the post value is set!
                    $adresse = filter_input (INPUT_POST, 'Adresse', FILTER_SANITIZE_STRING); //filter value
                }

                if (isset($_POST['Hausnr']))
                { //change name content only if the post value is set!
                    $hausnr = filter_input (INPUT_POST, 'Hausnr', FILTER_SANITIZE_STRING); //filter value
                }

                if (isset($_POST['wunsch']))
                { //change name content only if the post value is set!
                    $wunsch = filter_input (INPUT_POST, 'wunsch', FILTER_SANITIZE_STRING); //filter value
                }

                if (isset($_POST['date1']))
                { //change name content only if the post value is set!
                    $termin1_datum = filter_input (INPUT_POST, 'date1', FILTER_SANITIZE_STRING); //filter value
                }

                if (isset($_POST['date2']))
                { //change name content only if the post value is set!
                    $termin2_datum = filter_input (INPUT_POST, 'date2', FILTER_SANITIZE_STRING); //filter value
                }

                if (isset($_POST['date3']))
                { //change name content only if the post value is set!
                    $termin3_datum = filter_input (INPUT_POST, 'date3', FILTER_SANITIZE_STRING); //filter value
                }
            }
        ?>
        <div id="background">
            <div id="intro6">
                <div id="intro6background">
                    <p id="intro6font">Termine</p>
                    <hr id="hrpic"><br>
                    <p id="intro6font1">Bitte die Felder ausfüllen</p>
                </div>

                <div id="intro6inhalt">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="myForm" id="idForm">
                        <p id="intro6left">Vorname*</p>
                        <p id="intro6right">Nachname*</p><br><br><br>
                        <input size="20" type="text" name="Vorname" value="<?php  echo $vorname;?>" required>
                        <input size="20" type="text" name="Nachname" value="<?php  echo $nachname;?>" required><br><br>

                        Mann*
                        <input type="radio" value="Herr" name="Anrede" required>
                        <div id="intro6right">
                        <input type="radio" value="Frau" name="Anrede" required>
                        Frau*
                        </div>
                        <br><br>

                        <hr id="hrinhalt"><br>

                        <p id="intro6left">Email*</p>
                        <p id="intro6right">Telefonnummer*</p><br><br><br>
                        <input size="20" type="text" name="Email" value="<?php  echo $email;?>" required>
                        <input size="20" type="text" name="Telefon" value="<?php  echo $telnr;?>" required><br><br>

                        <p id="intro6left">Adresse*</p>
                        <p id="intro6right">Hausnummer*</p><br><br><br>
                        <input size="20" type="text" name="Adresse" value="<?php  echo $adresse;?>" required>
                        <input size="20" type="text" name="Hausnr" value="<?php  echo $hausnr;?>" required><br><br>

                        <hr id="hrinhalt"><br>

                        <p>Erklären Sie uns was genau gemacht werden soll?</p>
                        <br>
                        <textarea name="wunsch" required>
                        <?php if(isset($_POST['wunsch'])) {  echo htmlentities ($_POST['wunsch']); }?>
                        </textarea>
                        <br><br>

                        <hr id="hrinhalt"><br>

                        Sie haben maximal 3 Terminwünsche<br><br>

                        <input type="date" name="date1" value="<?php  echo $termin1_datum;?>" required><br>
                        <input type="date" name="date2" value="<?php  echo $termin2_datum;?>" required><br>
                        <input type="date" name="date3" value="<?php  echo $termin3_datum;?>" required><br><br>
                        <hr id="hrinhalt"><br>

                        <input type="submit" name="Senden" value="Senden">
                        <input type="reset" value="Reset">
                        <a href="tabelle.php" id="link_bestellen">Alle User</a>
                        <br><br>

                    </form>

        <?php
            if(isset($_POST['Senden']))
            {
                $vorname = ucfirst($_POST['Vorname']);
                $nachname = ucfirst($_POST['Nachname']);
                $email = strtolower($_POST['Email']);
                
                $fehler_nachricht = array();
                $fehler_email = array();

                $telnr = trim($_POST['Telefon'], '\0');
                $adresse = $_POST['Adresse'];
                $hausnr = $_POST['Hausnr'];
                $anrede = $_POST['Anrede'];
                $wunsch = $_POST['wunsch'];

                $wunsch = str_replace("\n", ' ', $wunsch);
                $wunsch = str_replace("\t", ' ', $wunsch);

                $success = 1;
                
                if (strpos($email, '@') == NULL)
                {
                    $fehler_email[] = "In der Mail, '@' gibt es nicht.";
                    $success = 0;
                }

                $falchestelle = 0;

                if (strstr($email, '.') == NULL)
                {
                    $fehler_email[] = "In der Mail, '.' gibt es nicht.";
                    $success = 0;
                    $falchestelle = 1;
                }

                if($falchestelle == 0)
                {
                    if (strpos($_POST['Email'],".") == 0)
                    {
                        $fehler_nachricht[]= "In der Mail, '.' darf nicht an erster Stelle stehen!";
                        $success = 0;
                    }

                    $condition = 1;
                    $condition_1 = strlen(strchr($email, '@'));
                    $condition_2 = strlen(strchr($email, '.'));
    
                    //echo $condition_1 . "<br>";
                    //echo $condition_2 . "<br>";
                    $punkten = explode(".", $email);
    
                    if ($condition_1 < $condition_2 || strpos($email, '.') == NULL)
                    {
                        if ($punkten > 1)
                        {
                            if (strpos($email, '.') < strpos($email, '@') && 
                                strrpos($email, '.') > strpos($email, '@'))
                            {
                                $condition = 0;
                            }
                        }
    
                        if ($condition == 1)
                        {
                            $fehler_email[] = "In der Mail, '.' ist an der falsche Stelle.";
                            $success = 0;   
                        }
                    }
                }

                if (strlen($email) - 1 == strrpos($email, '.'))
                {
                    $fehler_email[] = "Nach einem '.' ist weiterer Inhalt erforderlich.";
                    $success = 0;
                }

                if (strlen($email) < 6)
                {
                    $fehler_email[] = "E-Mail darf mindestens 6 Zeichen sein.";
                    $success = 0;
                }

                if (strlen($email) > 320)
                {
                    $fehler_email[] = "E-Mail darf maximal 320 Zeichen sein.";
                    $success = 0;
                }

                if (strpos($email, ' ') != 0)
                {
                    $fehler_email[] = "E-Mail darf keine Leerzeichen haben.";
                    $success = 0;
                }

                //Ab hier bin ich schlau 
                $punkt = strpos($email, '@') + 1;
                if ($email[$punkt] == '.')
                {
                    $fehler_email[] = "Nach '@' darf kein '.' vorkommen"; 
                    $success = 0;
                }

                for ($i = -1; $i < strlen($email) - 1; $i++)
                {
                    if ($email[$i] != 'q' &&
                        $email[$i] != 'w' &&
                        $email[$i] != 'e' &&
                        $email[$i] != 'r' &&
                        $email[$i] != 't' &&
                        $email[$i] != 'z' &&
                        $email[$i] != 'u' &&
                        $email[$i] != 'i' &&
                        $email[$i] != 'o' &&
                        $email[$i] != 'p' &&
                        $email[$i] != 'a' &&
                        $email[$i] != 's' &&
                        $email[$i] != 'd' &&
                        $email[$i] != 'f' &&
                        $email[$i] != 'g' &&
                        $email[$i] != 'h' &&
                        $email[$i] != 'j' &&
                        $email[$i] != 'k' &&
                        $email[$i] != 'l' &&
                        $email[$i] != 'y' &&
                        $email[$i] != 'x' &&
                        $email[$i] != 'c' &&
                        $email[$i] != 'v' &&
                        $email[$i] != 'b' &&
                        $email[$i] != 'n' &&
                        $email[$i] != 'm' &&
                        $email[$i] != '.' &&
                        $email[$i] != '@' &&
                        $email[$i] != '0' &&
                        $email[$i] != '1' &&
                        $email[$i] != '2' &&
                        $email[$i] != '3' &&
                        $email[$i] != '4' &&
                        $email[$i] != '5' &&
                        $email[$i] != '6' &&
                        $email[$i] != '7' &&
                        $email[$i] != '8' &&
                        $email[$i] != '9')
                    {
                        $fehler_email[] = "E-Mail darf keine Sonderzeichen enthalten";
                        $success = 0;
                        break;
                    }
                }

                foreach ($fehler_email as $fehler) 
                {
                    echo '<div class="isa_error">';
                    echo ($fehler." <br />");
                    echo '</div>';
                }

                /*Fehler bei 4 weitere Felder
                  $telnr hat + an der falsche Stelle
                  $telnr enthält buchstaben
                  möglicher weise gibt es leertaste im $telnr also trim() benutzen ist wichtg
                  $adresse enthält hausnummer oder andere ziffern
                  $hausnr darf maximal 3 ziffern lang sein
                  $hausnr darf keine Buchstaben enthlalten

                */ 

                if (strpos($telnr, '+') != 0)
                {
                    $success = 0;
                    $fehler_nachricht[] = "Im Telefonnummer '+' ist an der falsche Stelle";
                }

                for ($i = -1; $i < strlen($telnr) - 1; $i++)
                {
                    if ($telnr[$i] != '0' &&
                        $telnr[$i] != '1' &&
                        $telnr[$i] != '2' &&
                        $telnr[$i] != '3' &&
                        $telnr[$i] != '4' &&
                        $telnr[$i] != '5' &&
                        $telnr[$i] != '6' &&
                        $telnr[$i] != '7' &&
                        $telnr[$i] != '8' &&
                        $telnr[$i] != '9' &&
                        $telnr[$i] != '+')
                        {
                            $fehler_nachricht[] = "Telefonnummer darf keine Buchstaben enthalten";
                            $success = 0;
                            break;
                        }
                }

                if (!preg_match("#^[a-zA-ZäöüÄÖÜß \-]+$#", $adresse))
                {
                    $fehler_nachricht[] = "Bitte die Hausnummer in Feld 'Hausnummer' eintragen";
                    $success = 0;
                }

                if (strlen($hausnr) > 3)
                {
                    $fehler_nachricht[] = "Die Hausnummer darf maximal 3 Ziffern lang sein";
                    $success = 0;
                }

                for ($i = -1; $i < strlen($hausnr) - 1; $i++)
                {
                    if ($hausnr[$i] != '0' &&
                        $hausnr[$i] != '1' &&
                        $hausnr[$i] != '2' &&
                        $hausnr[$i] != '3' &&
                        $hausnr[$i] != '4' &&
                        $hausnr[$i] != '5' &&
                        $hausnr[$i] != '6' &&
                        $hausnr[$i] != '7' &&
                        $hausnr[$i] != '8' &&
                        $hausnr[$i] != '9')
                    {
                        $fehler_nachricht[] = "Hausnummer darf keine Buchstaben enthalten";
                        $success = 0;
                        break;
                    }
                }

                $datum_heute = time();
                $termin1 = strtotime($_POST['date1']);
                $termin2 = strtotime($_POST['date2']);
                $termin3 = strtotime($_POST['date3']);
                $termin1 = date("w", $termin1);
                $termin2 = date("w", $termin2);
                $termin3 = date("w", $termin3);
                $tag = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");

                $termin1_datum = strtotime($_POST['date1']);
                $termin2_datum = strtotime($_POST['date2']);
                $termin3_datum = strtotime($_POST['date3']);
                $termin1_datum = date("d.m.Y", $termin1_datum);
                $termin2_datum = date("d.m.Y", $termin2_datum);
                $termin3_datum = date("d.m.Y", $termin3_datum);

                if ($termin1 == 0)
                {
                    $fehler_nachricht[] = "Sonntags arbeiten wir nicht";
                    $success = 0;
                }

                if ($termin2 == 0)
                {
                    $fehler_nachricht[] = "Sonntags arbeiten wir nicht";
                    $success = 0;
                }

                if ($termin3 == 0)
                {
                    $fehler_nachricht[] = "Sonntags arbeiten wir nicht";
                    $success = 0;
                }

                if ($termin1 == NULL)
                {
                    $fehler_nachricht[] = "Bitte alle 3 Wunschtermine wählen";
                    $success = 0;
                }

                if ($termin2 == NULL)
                {
                    $fehler_nachricht[] = "Bitte alle 3 Wunschtermine wählen";
                    $success = 0;
                }

                if ($termin3 == NULL)
                {
                    $fehler_nachricht[] = "Bitte alle 3 Wunschtermine wählen";
                    $success = 0;
                }
                
                if (strtotime($_POST['date1']) < time())
                {
                    $fehler_nachricht[] = "Bitte Wunschtermin1 nicht vor heute wählen";
                    $success = 0;
                }

                if (strtotime($_POST['date2']) < time())
                {
                    $fehler_nachricht[] = "Bitte Wunschtermin2 nicht vor heute wählen";
                    $success = 0;
                }

                if (strtotime($_POST['date3']) < time())
                {
                    $fehler_nachricht[] = "Bitte Wunschtermin3 nicht vor heute wählen";
                    $success = 0;
                }

                foreach ($fehler_nachricht as $fehler) 
                {
                    echo '<div class="isa_error">';
                    echo ($fehler." <br />");
                    echo '</div>';
                }

                if ($success == 1)
                {
                    echo '<div class="isa_success">';
                    echo "Erfolgreich erstellt!<br />";
                    echo '</div>';
                    

                    $jahr = date('Y');
                    $f = fopen("Text/vorgangsnummer.txt", "r");
                    $aktuell = fgets($f, 256);
                    fclose($f);

                    $f = fopen("Text/vorgangsnummer.txt", "w");
                    fputs($f, $aktuell + 1);
                    fclose($f);

                    $f = fopen("Text/log.txt", "a");
                    fputs($f, date("d.m.Y") . "\t" . $vorname . "\t" . $nachname . "\t" . $telnr . "\t" . $email . 
                    "\t" . $adresse . "\t" . $hausnr . "\t" . $wunsch . "\t" . $jahr . "." . $aktuell . "\t" . 
                    $termin1_datum . "\t" . $termin2_datum . "\t" . $termin3_datum . "\n");
                    fclose($f);

                    echo '<div class="isa_info">';
                    echo 'Sie haben folgendes eingetragen: </div>';
                    echo $anrede . " " . $nachname . ", " . $wunsch . "<br>" . "Ihre Vorgangsnummer: " . $jahr . "." . $aktuell;
                    echo "<script>$('.contactForm')[0].reset();</script>";
                }
            }
            /*ToDO
                    Tabele aufbauen
                    Fertig?
            */ 
        ?>
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