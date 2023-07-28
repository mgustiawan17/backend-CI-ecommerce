<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Help</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
        <form action="<?= base_url('Help/ubah/'.$dataHelp->id_help)?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name_help" value="<?= $dataHelp->name_help?>" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Image</label>
                <img src="<?= base_url('images/help/'.$dataHelp->image_help)?>" alt="" width="150" height="150"><br><br>
                <input type="file" name="image_help" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Description</label><br>
                <textarea name="desc_help" id="" cols="30" rows="5" class="form-control"><?= $dataHelp->desc_help?></textarea>
            </div><br>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</main>