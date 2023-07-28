<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Feed</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        <form action="<?= base_url('Feed/tambah')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title_feed" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="category_feed" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image_feed" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Description</label><br>
                <textarea name="desc_feed" id="" cols="30" rows="5" class="form-control"></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</main>