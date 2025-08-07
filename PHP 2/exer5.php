 <!DOCTYPE html>
 <html>
   <head>
     <title>Quadrados</title>
   </head>
   <body>
     <table>
       <tr>
         <th>Tempo</th>
         <th>Montante</th>
         <th>Juro</th>
       </tr>
       <?php
       $capital = $_GET['cap'];
       $taxa = $_GET['tax'];
       $tempo = $_GET['tempo'];
       $numero = 0;


while ($numero <= $tempo - 1):
    ++$numero . "<br>";
    if ($numero >= 0):
    $Juro = $capital * $taxa * $numero/100;
    $montante = $capital + $Juro ?>
       <tr>
         <td><?= $numero ?></td>
         <td><?= $montante ?></td>
         <td><?= $Juro ?></td>
       </tr>
       <?php
endif;
endwhile;


?>
     </table>
   </body>
 </html>