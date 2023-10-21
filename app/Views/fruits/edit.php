<div class="flex flex-col text-lg">
    <div class="text-center p-9 text-2xl">
        Edit Fruits
    </div>
    <div class="flex justify-center gap-6">
        <div class="w-1/4">
            <label id="image-label" class="cursor-pointer rounded-xl border-2 border-green-400 border-spacing-1 block bg-gray-100 group" for="upload-image">
                <div id="preview-container" class="w-full">
                    <div class="grid w-full grid-cols-1 grid-rows-1">
                        <div id="edit-layer" class="w-full text-center self-center grid bg-slate-600 opacity-0 col-start-1 row-start-1 z-10 group-hover:opacity-60 ease-in-out duration-100 h-full rounded-xl">
                            <div class="text-white self-center text-xl">
                                Change Image
                            </div>
                        </div>
                        <img id="image-preview" class="w-full col-start-1 row-start-1 group-hover:backdrop-blur rounded-xl" src="/<?= $fruit['image'] ?>">
                    </div>
                </div>
            </label>
        </div>
        <div class="w-1/4">
            <form class="flex flex-col gap-0 group" action="<?= url_to('update',$fruit['id']) ?>" method="post" enctype="multipart/form-data">
            
                <div>
                    <input class=" p-6 border-2 rounded-xl w-full peer outline-none focus:border-2 focus:border-red-400 valid:border-green-400 valid:border-2" id="name" type="text" name="name" value="<?= $fruit['name'] ?>" required>
                    <label class="text-gray-600 px-1 relative left-6 bottom-[3.4rem] peer-focus:text-base peer-focus:bottom-24 peer-focus:bg-white peer-valid:text-base peer-valid:bottom-24 peer-valid:bg-white peer-valid:text-green-600 ease-in-out transition-all select-none" for="name">Name</label>
                </div>
                <div>
                    <input class=" p-6 border-2 rounded-xl w-full peer outline-none focus:border-2 focus:border-red-400 valid:border-green-400 valid:border-2 appearance-none" id="price" type="text" name="price" value="<?= $fruit['price'] ?>" required>
                    <label class="text-gray-600 px-1 relative left-6 bottom-[3.4rem] peer-focus:text-base peer-focus:bottom-24 peer-focus:bg-white peer-valid:text-base peer-valid:bottom-24 peer-valid:bg-white peer-valid:text-green-600 ease-in-out transition-all select-none" for="price">Price</label>
                </div>
                <div>
                    <textarea class=" p-6 border-2 rounded-xl resize-none w-full peer outline-none focus:border-2 focus:border-red-400 valid:border-green-400 valid:border-2" id="description" name="description" rows="3" required><?= $fruit['description'] ?></textarea>
                    <label class="text-gray-600 px-1 relative left-6 bottom-[7.05rem] peer-focus:text-base peer-focus:bottom-[9.7rem] peer-focus:bg-white peer-valid:text-base peer-valid:bottom-[9.7rem] peer-valid:bg-white peer-valid:text-green-600 ease-in-out transition-all select-none" for="description">Description</label>
                </div>
                <input class="hidden" id="upload-image" type="file" name="image" accept="image/*">
                <input class=" p-6 border rounded-xl bg-green-500 text-white uppercase font-semibold pointer-events-auto cursor-pointer group-invalid:cursor-not-allowed group-invalid:pointer-events-none group-invalid:bg-gray-500" type="submit" value="submit">
            </form>
        </div>
    </div>
</div>
<!-- Image Preview Logic -->
<script type="module">
    const imageLabel = document.querySelector('#image-label');
    const imageInput = document.querySelector('#upload-image');
    const uploadIcon = document.querySelector('#upload-icon');
    const imagePreview = document.querySelector('#image-preview');
    const previewContainer = document.querySelector('#preview-container');
    const reader = new FileReader();
    imageInput.addEventListener('input', () => {
        reader.readAsDataURL(imageInput.files[0]);
    });
    reader.onloadend = function() {
        if (!reader.result.includes('data:image')) {
            imageInput.value = null;
            imagePreview.src = "/<?= $fruit['image'] ?>";
            alert('That is not an image');
            return;
        }
        imagePreview.src = reader.result;
    }
</script>
<!-- Price Input Logic -->
<script type="module">
    const priceInput = document.querySelector('#price');
    const decimal = /([0-9])+/g;
    priceInput.addEventListener('input', () => {
        let value = '';
        let number = priceInput.value.match(decimal);
        if (!number) {
            priceInput.value = null;
            return;
        }
        number.forEach(v => {
            value += v;
        });
        priceInput.value = value;
    });
</script>