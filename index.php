<?php
require_once('data/db.php');
require_once('data/config.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/js.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="css/style.css" rel="stylesheet" />
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootbox.min.js"></script>

        <title>Logovacka</title>
    </head>
    <body>
<?php
           //zistenie zhody
            $query1 = "SELECT * FROM zaznamy";
            $select = mysqli_query($mysqli, $query1);

            while($vypis=mysqli_fetch_assoc($select))
            {
                $datum_cas[] = ($vypis['cas'].'-'.$vypis['datum'].'-'.$vypis['stav']);
               
            }


          //   print_r($datum_cas);
            // na testovacie ucely
             echo '<br />';



        ?>

        <?php







        echo '<table border="1">';
        echo'<tr>';
        echo'<th></th>';
        for($z = 10; $z < 22; $z++)
        {
            echo"<th>$z:00</th>";
        }
        for($x = 0; $x < 7; $x++)
        {
            $date = date('Y-m-d', time()+($x*86400));
            $date1 = date('d.m.Y', time()+($x*86400));
            echo'<tr>';
            echo'<th class="prvy-stlpec">'.$date1.'</th>';
            for($y = 10; $y < 22; $y++)
            {
                $cas = "$y";
                $datum = $date;
                $idx = ($y.'-'.$date.'-1');
                $idx1 = ($y.'-'.$date.'-2');

                if(array_search($idx1, $datum_cas)){
                    $trieda = 'potvrdena';
                    $text = 'P';
                    $onclick = '';
                }
                elseif(array_search($idx, $datum_cas)){
                    $trieda = 'rezervovana';
                    $text = 'R';
                    $onclick = '';
                }
                else{
                    $trieda = 'volna';
                    $text = 'V';
                    $onclick = "onclick=\"rezervuj('$datum', '$cas')\""; 
                   // $onclick = "onclick=\"ddd()\"";
                }




                echo "<td><label class='$trieda' $onclick><span>$text</span></label></td>";

            }

            echo'</tr>';
        }
        echo'</table>';

      

       ?>




    </body>
</html>
