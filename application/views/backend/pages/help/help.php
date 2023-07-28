<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Help</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Help
                            </div>
                            <div class="card-body">

                                <a href="<?= base_url('Help/formTambah')?>" class="btn btn-primary">Tambah Data Help</a><br><br>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataHelp as $index => $item) : ?>
                                        <tr>
                                            <td><?= $index += 1 ?></td>
                                            <td><?= $item->name_help ?></td>
                                            <td><?= $item->desc_help ?></td>
                                            <td>
                                                <img src="<?= base_url('images/help/' . $item->image_help)?>" alt="<?= $item->image_help?>" width="150" height="150">
                                            </td>
                                            <td>
                                               <a href="<?= base_url('Help/formUbah/' . $item->id_help)?>" class="btn btn-warning">Ubah</a>
                                               <a href="<?= base_url('Help/hapus/' . $item->id_help)?>" onclick="return confirm('Anda ingin hapus?')" class="btn btn-danger">Hapus</a>
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