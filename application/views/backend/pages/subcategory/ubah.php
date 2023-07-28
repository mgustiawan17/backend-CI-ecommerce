<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Subcategory</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
        <form action="<?= base_url('Subcategory/ubah/'.$dataSubcategory->id_subcategory.'/'.$dataSubcategory->id_category)?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name_subcategory" value="<?= $dataSubcategory->name_subcategory?>" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Image</label>
                <img src="<?= base_url('images/subcategory/'.$dataSubcategory->image_subcategory)?>" alt="" width="150" height="150"><br><br>
                <input type="file" name="image_subcategory" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Description</label><br>
                <textarea name="desc_subcategory" id="" cols="30" rows="5" class="form-control"><?= $dataSubcategory->desc_subcategory?></textarea>
            </div><br>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</main>