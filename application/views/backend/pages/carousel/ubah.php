<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Carousel</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
        <form action="<?= base_url('Carousel/ubah/'.$dataCarousel->id_carousel)?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Image</label>
                <img src="<?= base_url('images/carousel/'. $dataCarousel->img_carousel)?>" alt="" width="150" height="150"><br><br>
                <input type="file" name="img_carousel" class="form-control">
            </div><br>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</main>