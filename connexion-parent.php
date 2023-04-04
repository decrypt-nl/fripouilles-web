<?php 
require_once('config.php');

$sql ="CALL ListeAteliers()";
$stmt = $bdd->prepare($sql);
$stmt->execute();
?>

<h1>Liste des ateliers</h1>
 <table>
   <thead>
     <tr>
       <th>ID</th>
       <th>Name</th>
     </tr>
   </thead>
   <tbody>
        <?php foreach ($stmt as $row) { ?>
                <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['nom']); ?></td>
                </tr>
            <?php } ?>
   </tbody>
 </table>