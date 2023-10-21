<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="flex justify-between px-4 bg-red-500 text-white font-semibold">
        <div class="text-2xl self-center">
            <a href="<?= url_to('index') ?>">Toko Buah</a>
        </div>
        <div class="flex">
            <a class="p-4 px-5 text-lg hover:bg-red-400 transition-all ease-in-out" href="<?= url_to('index') ?>">Home</a>
            <a class="p-4 px-5 text-lg hover:bg-red-400 transition-all ease-in-out" href="<?= url_to('create') ?> ">Create</a>
        </div>
    </nav>