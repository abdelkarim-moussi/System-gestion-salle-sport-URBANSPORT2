<?php
ob_start();
?>

<div class="max-w-7xl mx-auto py-8 px-4">

    <table class="min-w-[100%] table-auto bg-white border-collapse shadow-md rounded-lg">
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
            for ($i = 0 ; $i < count($activities) ; $i++) {
                    ;
                   
                ?>

                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["name_activity"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["description"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["start_date"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["end_date"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["capacity"]?></td>    
                    <td class="px-4 py-2 border-b"><a href="index.php?action=annulerReservation&idres=<?=$activities[$i]["id_activity"]?>">annuler la reservation</a></td>
                </tr>
                <?php
 }    
                ?>
            
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once("Views/layoutVisiteur.php");