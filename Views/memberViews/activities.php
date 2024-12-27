<?php
ob_start();
?>
<div>Content for page list Activities </div>

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
       
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <?php
            for ($i = 0 ; $i < count($activities) ; $i++) {
                    ;
                   
                ?>

                <tr class="hover:bg-gray-100">
                    <form action="index.php?action=reserverActivity&id=<?=$activities[$i]["id_activity"]?>" method="post">
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["name_activity"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["description"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["start_date"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["end_date"]?></td>
                    <td class="px-4 py-2 border-b"><input type="text" min=0 value="0" name="capacity" max=<?= $activities[$i]["capacity"]?>></td>    
                    <td class="px-4 py-2 border-b"><button type="submit">reserver l'activity</button></td></form>
                </tr>
                <?php
 }    
                ?>
            
        </tbody>
    </table>
</div>
<script>
    let addActivity = document.getElementById('addActivity');


addActivity.addEventListener("click",function(){
    document.getElementById("addActivityForm").classList.remove("hidden");
})
document.getElementById("subActivity").addEventListener('click',function(){
    document.getElementById("addActivityForm").classList.add("hidden");
})

</script>
<?php
$content = ob_get_clean();
require_once("Views/layoutMember.php");