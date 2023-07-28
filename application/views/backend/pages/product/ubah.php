<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
        <form action="<?= base_url('Product/ubah/'.$dataProduct->id_product)?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name_product" value="<?= $dataProduct->name_product?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Subcategory</label>
                <select name="id_subcategory" class="form-select">
                    <?php foreach ($dataSubcategory as $item) : ?>
                        <?php 
                            $isSelected = ($item->id_subcategory == $dataProduct->id_subcategory) ? 'selected' : '';
                        ?>  
                        <option value="<?= $item->id_subcategory ?>" <?= $isSelected?> ><?= $item->name_subcategory?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Stock</label>
                <input type="text" name="stock_product" value="<?= $dataProduct->stock_product?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price_product" value="<?= $dataProduct->price_product?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image_product" value="<?= $dataProduct->image_product?>" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Description</label><br>
                <textarea name="desc_product" id="" cols="30" rows="5" class="form-control"><?= $dataProduct->desc_product?></textarea>
            </div><br>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</main>