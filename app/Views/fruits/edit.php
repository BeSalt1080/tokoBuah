<div class="flex flex-col text-lg">
    <div class="text-center p-9 text-2xl">
        Edit Fruits
    </div>
    <div class="flex justify-center gap-6">
        <div class="w-1/4">
            <label id="image-label" class="cursor-pointer rounded-xl border-2 border-slate-300 border-dashed border-spacing-1 h-full block bg-gray-100 group" for="upload-image">
                <div id="preview-container" class="hidden w-full">
                    <div class="grid w-full grid-cols-1 grid-rows-1">
                        <div id="edit-layer" class="w-full text-center self-center grid bg-slate-600 opacity-0 col-start-1 row-start-1 z-10 group-hover:opacity-60 ease-in-out duration-100 h-full rounded-xl">
                            <div class="text-white self-center text-xl">
                                Change Image
                            </div>
                        </div>
                        <img id="image-preview" class="w-full col-start-1 row-start-1 group-hover:backdrop-blur rounded-xl" src="">
                    </div>
                </div>
                <div id="upload-icon" class="grid grid-cols-3 grid-rows-3 h-full items-center">
                    <div class="col-start-1 row-start-2 col-span-3">
                        <div class="flex justify-center">
                            <svg fill="#d0d0d0" height="100px" width="100px" viewBox="0 0 374.116 374.116">
                                <g>
                                    <path d="M344.058,207.506c-16.568,0-30,13.432-30,30v76.609h-254v-76.609c0-16.568-13.432-30-30-30c-16.568,0-30,13.432-30,30
                                    v106.609c0,16.568,13.432,30,30,30h314c16.568,0,30-13.432,30-30V237.506C374.058,220.938,360.626,207.506,344.058,207.506z" />
                                    <path d="M123.57,135.915l33.488-33.488v111.775c0,16.568,13.432,30,30,30c16.568,0,30-13.432,30-30V102.426l33.488,33.488
                                    c5.857,5.858,13.535,8.787,21.213,8.787c7.678,0,15.355-2.929,21.213-8.787c11.716-11.716,11.716-30.71,0-42.426L208.271,8.788
                                    c-11.715-11.717-30.711-11.717-42.426,0L81.144,93.489c-11.716,11.716-11.716,30.71,0,42.426
                                    C92.859,147.631,111.855,147.631,123.57,135.915z" />
                                </g>
                            </svg>
                        </div>
                        <div class="text-gray-400 text-center">
                            Upload Image
                        </div>
                    </div>
                </div>
            </label>
        </div>
        <div class="w-1/4">
            <form class="flex flex-col gap-0 group" action="<?= url_to('update') ?>" method="post" enctype="multipart/form-data">
            
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
                <input class="hidden" id="upload-image" type="file" name="image" accept="image/*" required>
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
            imagePreview.src = "";
            previewContainer.classList.add('hidden');
            imageLabel.classList.add('border-dashed');
            imageLabel.classList.add('h-full');
            imageLabel.classList.remove('border-green-400');
            imageLabel.classList.add('border-slate-300');
            uploadIcon.classList.remove('hidden');
            alert('That is not an image');
            return;
        }
        previewContainer.classList.remove('hidden');
        imageLabel.classList.remove('h-full');
        imageLabel.classList.remove('border-slate-300');
        imageLabel.classList.remove('border-dashed');
        imageLabel.classList.add('border-green-400');
        uploadIcon.classList.add('hidden');
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