<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>For Visiteur</title>
</head>
<body>
<header class="px-10 relative flex flex-col items-center align-center w-full">
    <nav id="nav" class="flex z-20 items-center justify-around shadow-md shadow-gray-600 text-white bg-black m-5 py-4 px-3 rounded-md fixed mx-10 top-0 w-full max-w-[900px]" >
        <h2 class="uppercase text-lg font-semibold tracking-wide">Urban<span class="lowercase text-blue-600">Sport</span></h2>
       <ul class="flex gap-10 items-center" id="links">
    <li class="cursor-pointer hover:text-green-600">
        <a href="http://localhost/System-gestion-salle-sport-URBANSPORT2/index.php?action=allActivities">Activities</a>
    </li>
    
    <?php if (!isset($_SESSION["userId"])) { ?>
        <!-- Links for non-logged-in users -->
        <li class="cursor-pointer hover:text-green-600">
            <a href="../Views/layoutAdmin.php">Dashboard</a>
        </li>
        <li class="underline cursor-pointer hover:text-green-600">
            <a href="../public/signin.php">Login</a>
        </li>
        <li class="border border-md border-green-600 px-5 py-1 hover:bg-green-600 hover:text-white cursor-pointer rounded-md">
            <a href="../public/signup.php">Sign up</a>
        </li>
    <?php } else { 
        if(isset($_SESSION["user_id"])) { ?>
        <!-- Links for logged-in users -->
        <?php if (isset($_SESSION["role"])) { ?>
            <?php if ($_SESSION["role"] === "lawyer") { ?>
                <li class="cursor-pointer hover:text-green-600">
                    <a href="../utilities/lawyer-dashboard.php">Dashboard</a>
                </li>
            <?php } elseif ($_SESSION["role"] === "client") { ?>
                <li class="cursor-pointer hover:text-green-600">
                    <a href="../public/lawyers.php">Lawyers</a>
                </li>
                <li class="cursor-pointer hover:text-green-600">
                    <a href="../utilities/client-dashboard.php">Dashboard</a>
                </li>
            <?php } ?>
        <?php } ?>
        <li class="underline cursor-pointer hover:text-green-600">
            <a href="../public/logout.php">Logout</a>
        </li>
    <?php } } ?>
    </ul>
        <i id="open" class="cursor-pointer text-xl fa-solid fa-bars "></i>
        <i id="close" class="cursor-pointer text-xl fa-solid fa-xmark"></i>
    </nav>
    <?=$content?>
</body>
</html>