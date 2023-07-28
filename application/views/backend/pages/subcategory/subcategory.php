<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Subcategory</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Subcategory
                            </div>
                            <div class="card-body">

                                <a href="<?= base_url('Subcategory/formTambah/'.$id_category)?>" class="btn btn-primary">Tambah Data Subcategory</a><br><br>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Subcategory</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataSubcategory as $index => $item) : ?>
                                        <tr>
                                            <td><?= $index += 1 ?></td>
                                            <td><a href="<?= base_url('Subsubcategory/index/'.$item->id_subcategory)?>"><?= $item->name_subcategory ?></a></td>
                                            <td><?= $item->desc_subcategory ?></td>
                                            <td>
                                                <img src="<?= base_url('images/subcategory/' . $item->image_subcategory)?>" alt="<?= $item->image_subcategory?>" width="150" height="150">
                                            </td>
                                            <td>
                                               <a href="<?= base_url('Subcategory/formUbah/' . $item->id_subcategory.'/'.$item->id_category)?>" class="btn btn-warning">Ubah</a>
                                               <a href="<?= base_url('Subcategory/hapus/' . $item->id_subcategory.'/'.$item->id_category)?>" onclick="return confirm('Anda ingin hapus?')" class="btn btn-danger">Hapus</a>
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