<?php
ob_start();

?>

<div class="flex items-center justify-center">
    <div class="bg-white w-1/3 mt-10 rounded-lg">
        <form method="post" action="index.php?action=UpdateProfile">
            <div class="flex items-center justify-center pt-10 flex-col">
                <img id="profile_display"
                    src="https://i.pinimg.com/originals/a8/bc/90/a8bc90ea196737604770aaf9c2d56a51.jpg"
                    class="rounded-full w-32">
                
                <h1 class="text-gray-800 font-semibold text-xl mt-5">
                    <span id="firstname_display"><?=$result["firstname"]?></span>
                    <input type="text" id="firstname_edit" name="first_name" value="<?=$result["firstname"]?>"
                        class="hidden">
                </h1>
                <h1 class="text-gray-500 text-sm">
                    <span id="lastname_display"><?=$result["lastname"]?></span>
                    <input type="text" id="lastname_edit" name="last_name" value="<?=$result["lastname"]?>" class="hidden">
                </h1>
                <h1 class="text-gray-500 text-sm">
                    <span id="email_display"><?=$result["email"]?></span>
                    <input type="email" id="email_edit" name="email" value="<?=$result["email"]?>" class="hidden">
                </h1>
                
            </div>

            <div class="flex justify-between p-4">
                <div>
                    <h1 class="text-xs uppercase text-gray-500">Membership</h1>
                    <h1 class="text-xs text-yellow-500">Gold Member</h1>
                </div>
                <div id="renew">
                    <button type="submit" 
                        class="text-xs text-green-300 border-2 py-1 px-2 border-green-300">Renew</button>
                </div>
            </div>
            <div class="flex items-center justify-center mt-3 mb-6 flex-col">
                <h1 class="text-xs text-gray-500">Get Connected</h1>
                <div class="flex mt-2">
                    <img src="https://www.iconsdb.com/icons/preview/gray/facebook-xxl.png" alt=""
                        class="w-6 border-2 p-1 rounded-full mr-3">
                    <img src="https://www.iconsdb.com/icons/preview/gray/twitter-xxl.png" alt=""
                        class="w-6 border-2 p-1 rounded-full mr-3">
                    <img src="https://www.iconsdb.com/icons/preview/gray/google-plus-xxl.png" alt=""
                        class="w-6 border-2 p-1 rounded-full mr-3">
                    <img src="https://www.iconsdb.com/icons/preview/gray/instagram-6-xxl.png" alt=""
                        class="w-6 border-2 p-1 rounded-full">
                </div>
        </form>

    </div>
    <button onclick="toggleEditMode()" class="mt-4 px-4 py-2 bg-blue-500 text-white">Edit</button>

</div>
</div>
<script>
function toggleEditMode() {
    const fullNameDisplay = document.getElementById('firstname_display');
    const renew = document.getElementById('renew');
    const label_display = document.getElementById('lastname_display');
    const label_edit = document.getElementById('lastname_edit');
    const fullNameEdit = document.getElementById('firstname_edit');
    const emailDisplay = document.getElementById('email_display');
    const telephone_display = document.getElementById('telephone_display');
    const emailEdit = document.getElementById('email_edit');
    const telephone_edit = document.getElementById('telephone_edit');
    const elements = [fullNameDisplay, fullNameEdit, emailDisplay, emailEdit,
    ,telephone_display,telephone_edit,label_edit,label_display,renew
    ];

    elements.forEach(el => el.classList.toggle('hidden'));
}
</script>
<?php

$content = ob_get_clean();
require_once("Views/layoutMember.php");