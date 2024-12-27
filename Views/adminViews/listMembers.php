<?php
ob_start();
var_dump($Memebers);

?>
<div class="max-w-7xl mx-auto py-8 px-4">

<table class="min-w-full table-auto bg-white border-collapse shadow-md rounded-lg">
    <thead class="bg-green-500 text-white">
        <tr>
            <th class="px-4 py-2 text-left">Date Reservation</th>
            <th class="px-4 py-2 text-left">matricule</th>
            <th class="px-4 py-2 text-left">avocatName</th>
            <th class="px-4 py-2 text-left">Specialite</th>
            <th class="px-4 py-2 text-left">Phone Number</th>
            <th class="px-4 py-2 text-left">Status</th>
            <th class="px-4 py-2 text-left">Comment</th>
            <th class="px-4 py-2 text-left">Rating</th>
   
        </tr>
    </thead>
    <tbody class="text-gray-700">
        <?php
        for ($i = 0 ; $i < count($Memebers) ; $i++) {
                ;
               
            ?>

            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border-b"><?= $Memebers[$i]["firstname"]?></td>
                <td class="px-4 py-2 border-b"><?= $Memebers[$i]["lastname"]?></td>
                <td class="px-4 py-2 border-b"><?= $Memebers[$i]["email"]?></td>
                <td class="px-4 py-2 border-b"><?= $Memebers[$i]["email"]?></td>
                
                <td class="px-4 py-2 border-b"><a href="index.php?action=annulerReservation&idres=<?=$Memebers[$i]["id_user"]?>">supprimer ce compte</a></td>
            </tr>
            <?php
}    
            ?>
        
    </tbody>
</table>
</div>

<?php
$content = ob_get_clean();
require_once("Views/layoutAdmin.php");