<?php
ob_start();
?>
<div>Content for page list Activities </div>


<form class="max-w-sm mx-auto" method="POST" action="index.php?action=addNewActivity">
  <div class="mb-5">
    <label for="name_activity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activity Name</label>
    <input type="text" name="name_activity" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Name Activity" required />
  </div>
  <div class="mb-5">
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
    <input type="tsext" name="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
  </div>
  <div class="mb-5">
    <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">date debut</label>
    <input type="date" name="start_date" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
  </div>
  <div class="mb-5">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">date fin</label>
    <input type="date" name="end_date" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
  </div>
  <div class="mb-5">
    <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacity</label>
    <input type="number" name="capacity" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
  </div>
  <div class="flex items-start mb-5">
    
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ADD NEW ACTIVITY</button>
</form>

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
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["name_activity"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["description"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["start_date"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["end_date"]?></td>
                    <td class="px-4 py-2 border-b"><?= $activities[$i]["capacity"]?></td>    
                    <td class="px-4 py-2 border-b"><a href="index.php?action=DeleteActivity&id=<?=$activities[$i]["id_activity"]?>">supprimer l'activity</a></td>
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
require_once("Views/layoutAdmin.php");