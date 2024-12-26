<?php
ob_start();


    

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
                <th class="px-4 py-2 text-left"></th>
                <th class="px-4 py-2 text-left">Send avis</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $date = new DateTime($row["datereservation"]);
                $dayNumber = $date->format("d");
                ?>

                <tr class="hover:bg-gray-100">
                    <form action="index.php?action=avis&idres=<?=$row["idreservation"]?>" method="post">
                    <td class="px-4 py-2 border-b"><?=$row["datereservation"]?></td>
                    <td class="px-4 py-2 border-b"><?=$row["matricule"]?></td>
                    <td class="px-4 py-2 border-b"><?=$row["full_name"]?></td>
                    <td class="px-4 py-2 border-b"><?=$row["label"]?></td>
                    <td class="px-4 py-2 border-b"><?=$row["numerotelephone"]?></td>
                    <td class="px-4 py-2 border-b"><?=$row["status"]?></td>
                    <td class="px-4 py-2 border-b"><input type="text" name="comment" value="<?=$row["comment"]?>"></td>
                    <td class="px-4 py-2 border-b"><input type="number" name="rate" max=5 value="<?=$row["rating"]?>"></td>
                    <td class="px-4 py-2 border-b">
                    <a class="text-red-400" href="index.php?action=annulerReservation&idReservation=<?=$row["idreservation"]?>&&date=<?=$row["datereservation"]?>">Reffuser la Reservation</a>
                    </td>
                    <td class="px-4 py-2 border-b"><input type="submit" value="send"></td>
                    </form>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php


$content = ob_get_clean();
require_once("Views/layoutMember.php");