<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Carousel</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        <form action="<?= base_url('Carousel/tambah')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="img_carousel" class="form-control">
            </div><br>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</main>