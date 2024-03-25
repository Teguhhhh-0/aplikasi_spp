<?php
session_start();
include '../config/config.php';
if (!isset ($_SESSION['username'])) {
    header("Location: ../admin/home.php");
    exit();
}

// Ambil informasi username dan level akun dari session
$username = $_SESSION['username'];
$level = $_SESSION['level'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/output.css">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <nav class="w-full bg-indigo-950 h-10 flex">
        <div class="flex w-full justify-start items-center mx-auto">
            <div class="flex w-full justify-between items-center mr-10 text-white">
                <button id="toggle" class="mx-10 md:hidden sm:hidden block">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
                <div class="flex justify-end w-full">
                    <img src="../public/image/user.svg" alt="" class="w-6 h-6 bg-indigo-800/50 rounded-full mr-2">
                    <h1 class="opacity-0 relative sm:right-0 right-0 sm:opacity-100">
                        <?= $username; ?>
                    </h1>
                </div>

            </div>
        </div>
    </nav>
    <div class="w-full flex">
        <div class="nav sm:block h-screen sm:w-1/6 md:10/12 w-full absolute bg-indigo-950 rounded-br-lg rounded-bl-lg">
            <div class="flex flex-col justify-center items-center">
                <div class="border-b-2 border-slate-400 py-5 max-w-fit my-10">
                    <img src="../public/image/logo17.png" alt="" class="w-14 h-14 mx-auto">
                </div>
                <ul class="flex flex-col w-full justify-start items-center gap-5">
                    <li><a href="petugas_dashboard.php"
                            class="text-white my-5 shadow-lg text-center rounded-lg py-1">home</a></li>
                    <ul class="flex flex-col w-full justify-start items-center gap-5">
                        <li><a href="pembayaran.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">
                                pembayaran</a></li>
                        <li><a href="history.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">
                                history</a></li>
            </div>
            <div class="text-white flex justify-center items-start absolute bottom-24 left-16">
                <form action="../admin/logout.php" method="POST">
                    <button class="flex items-center gap-2 bg-blue-900/50 w-28 h-8 rounded-lg justify-center">
                        <img src="../public/image/logout.svg" alt="" srcset="" class="w-5 h-5">
                        logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/nav.js"></script>
</body>

</html>