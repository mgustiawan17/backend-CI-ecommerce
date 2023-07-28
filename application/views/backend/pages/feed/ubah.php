<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Feed</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ubah</li>
            </ol>
        <form action="<?= base_url('Feed/ubah/'.$dataFeed->id_feed)?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title_feed" value="<?= $dataFeed->title_feed?>" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="category_feed" value="<?= $dataFeed->category_feed?>" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Image</label>
                <img src="<?= base_url('images/feed/'.$dataFeed->image_feed)?>" alt="" width="150" height="150"><br><br>
                <input type="file" name="image_feed" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Description</label><br>
                <textarea name="desc_feed" id="" cols="30" rows="5" class="form-control"><?= $dataFeed->desc_feed?></textarea>
            </div><br>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</main>