<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
        <form action="<?= base_url('Category/ubah/'.$dataCategory->id_category)?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name_category" value="<?= $dataCategory->name_category?>" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Image</label>
                <img src="<?= base_url('images/category/'.$dataCategory->image_category)?>" alt="" width="150" height="150"><br><br>
                <input type="file" name="image_category" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Description</label><br>
                <textarea name="desc_category" id="" cols="30" rows="5" class="form-control"><?= $dataCategory->desc_category?></textarea>
            </div><br>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</main>