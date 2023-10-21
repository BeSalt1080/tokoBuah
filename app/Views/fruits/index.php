<div class="grid grid-cols-4 gap-8 p-8">
    <?php foreach ($data as $d) : ?>
        <div class="border shadow-md rounded-xl pb-0">
            <div class="p-10 pb-5">
                <div class="w-full h-80 overflow-hidden">
                    <img class="rounded-md " src="/<?= $d['image'] ?>" alt="<?= $d['image'] ?>">
                </div>

                <div class="p-3">
                    <div class="text-3xl"><?= $d['name'] ?></div>
                    <div class="text-xl">Rp <?= number_format($d['price'], 2, ',', '.') ?></div>
                </div>
            </div>
            <div class="flex">
                <a class="p-3 bg-yellow-300 font-semibold w-1/2 text-center hover:bg-yellow-200 hover:text-slate-800 transition-all ease-in-out rounded-bl-xl h-16 flex justify-center items-center" href="<?= url_to('edit', $d['id']) ?>"><div>Edit</div></a>
                <form class="w-1/2" action="<?= url_to('delete', $d['id']) ?>" method="post">
                    <button class="p-3 bg-red-600 text-white font-semibold w-full hover:bg-red-500 hover:text-slate-200 transition-all ease-in-out rounded-br-xl h-16" type="submit">Delete</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>