<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body class="w-full">
    <nav class="w-full bg-indigo-950 h-10 flex">
        <div class="container flex flex-wrap justify-end items-center mx-auto">
            <div class="flex items-center mr-10 text-white">
                <img src="../public/image/user.svg" alt="" class="w-6 h-6 bg-indigo-800/50 rounded-full mr-2">
                <h1>admin</h1>
            </div>
        </div>
    </nav>
    <div class="w-full flex justify-start">
        <div class="none sm:block sm:h-screen sm:w-1/6 bg-indigo-950 rounded-br-lg rounded-bl-lg">
            <div class="flex flex-col justify-center items-center">
                <div class="border-b-2 border-slate-400 py-5 w-52 my-10">
                    <img src="../public/image/logo17.png" alt="" class="w-14 h-14 mx-auto">
                </div>
                <ul class="flex flex-col w-full justify-start items-center gap-5">
                    <li><a href="home.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">home</a></li>
                    <ul class="flex flex-col w-full justify-start items-center gap-5">
                        <li><a href="siswa.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">data
                                siswa</a></li>
                        <li><a href="petugas.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">data
                                petugas</a></li>
                        <li><a href="kelas.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">data
                                kelas</a></li>
                        <li><a href="spp.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">data
                                spp</a></li>
                    </ul>
            </div>
            <div class="text-white flex justify-center items-center content-between my-72">
                <button class="flex items-center gap-2 bg-blue-900/50 w-28 h-8 rounded-lg justify-center">
                    <img src="../public/image/logout.svg" alt="" srcset="" class="w-5 h-5">
                    <a href="#">logout</a>
                </button>
            </div>
        </div>
        <div class="w-10/12">
            <div class="w-full flex justify-end my-10 -mx-10">
                <button class="bg-blue-500 w-52 h-7 rounded-lg">Tambah Siswa</button>
            </div>
            <div>

            </div>
        </div>
    </div>
</body>

</html>