<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/output.css">

</head>

<body class="w-full">
    <div>

        <?php
        include '../components/sidebar.php' ?>
    </div>
    <div class="w-full flex justify-end">
        <div class="flex w-full flex-wrap h-52 justify-end items-center mr-5 gap-5">
            <div
                class="flex flex-col bg-green-700/75 w-72 h-32 items-center justify-center gap-5 rounded-lg hover:bg-green-500/75 hover:shadow-xl hover:translate-x-1 hover:translate-y-1">
                <h1 class="font-bold text-start w-full px-5 pb-5 text-xl text-slate-200">data siswa</h1>
                <a href="siswa.php"
                    class="flex items-center gap-2 bg-blue-900/50 w-28 h-8 rounded-lg justify-center">lihat<svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
            <div
                class="flex flex-col bg-blue-700/75 w-72 h-32 items-center justify-center gap-5 rounded-lg hover:bg-blue-500/75 hover:shadow-xl hover:translate-x-1 hover:translate-y-1">
                <h1 class="font-bold text-start w-full px-5 pb-5 text-xl text-slate-200">data petugas</h1>
                <a href="petugas.php"
                    class="flex items-center gap-2 bg-blue-900/50 w-28 h-8 rounded-lg justify-center">lihat<svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
            <div
                class="flex flex-col bg-indigo-700/75 w-72 h-32 items-center justify-center gap-5 rounded-lg hover:bg-indigo-500/75 hover:shadow-xl hover:translate-x-1 hover:translate-y-1">
                <h1 class="font-bold text-start w-full px-5 pb-5 text-xl text-slate-200">data kelas</h1>
                <a href="kelas.php"
                    class="flex items-center gap-2 bg-blue-900/50 w-28 h-8 rounded-lg justify-center">lihat<svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
            <div
                class="flex flex-col bg-red-700/75 w-72 h-32 items-center justify-center gap-5 rounded-lg hover:bg-red-500/75 hover:shadow-xl hover:translate-x-1 hover:translate-y-1">
                <h1 class="font-bold text-start w-full px-5 pb-5 text-xl text-slate-200">data spp</h1>
                <a href="spp.php"
                    class="flex items-center gap-2 bg-blue-900/50 w-28 h-8 rounded-lg justify-center">lihat<svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

        </div>
    </div>
    </div>
    <script src="../js/index.js"></script>
</body>

</html>