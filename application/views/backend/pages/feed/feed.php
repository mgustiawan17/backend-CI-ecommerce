<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Feed</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Feed
                            </div>
                            <div class="card-body">

                                <a href="<?= base_url('Feed/formTambah')?>" class="btn btn-primary">Tambah Data Feed</a><br><br>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataFeed as $index => $item) : ?>
                                        <tr>
                                            <td><?= $index += 1 ?></td>
                                            <td><?= $item->title_feed ?></td>
                                            <td><?= $item->category_feed ?></td>
                                            <td><?= $item->desc_feed ?></td>
                                            <td>
                                                <img src="<?= base_url('images/feed/' . $item->image_feed)?>" alt="<?= $item->image_feed?>" width="150" height="150">
                                            </td>
                                            <td>
                                               <a href="<?= base_url('Feed/formUbah/' . $item->id_feed)?>" class="btn btn-warning">Ubah</a>
                                               <a href="<?= base_url('Feed/hapus/' . $item->id_feed)?>" onclick="return confirm('Anda ingin hapus?')" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>