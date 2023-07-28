<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        <form action="<?= base_url('Product/tambah')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name_product" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Subcategory</label>
                <select name="id_subcategory" class="form-select">
                    <?php foreach ($subcategory as $item) : ?>
                        <option value="<?= $item->id_subcategory ?>"><?= $item->name_subcategory?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Stock</label>
                <input type="text" name="stock_product" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price_product" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image_product" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Description</label><br>
                <textarea name="desc_product" id="" cols="30" rows="5" class="form-control"></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</main>