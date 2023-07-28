<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Product
                            </div>
                            <div class="card-body">

                                <a href="<?= base_url('Product/formTambah')?>" class="btn btn-primary">Tambah Data Product</a><br><br>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Subcategory</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataProduct as $index => $item) : ?>
                                        <tr>
                                            <td><?= $index += 1 ?></td>
                                            <td><?= $item->name_product ?></td>
                                            <td><?= $item->subcategory ?></td> 
                                            <td><?= $item->stock ?></td>    
                                            <td><?= $item->price ?></td>
                                            <td>
                                                <img src="<?= base_url('images/product/' . $item->image)?>" alt="<?= $item->image?>" width="150" height="150">
                                            </td>
                                            <td><?= $item->description ?></td>
                                            <td>
                                               <a href="<?= base_url('Product/formUbah/' . $item->id_product)?>" class="btn btn-warning">Ubah</a>
                                               <a href="<?= base_url('Product/hapus/' . $item->id_product)?>" onclick="return confirm('Anda ingin hapus?')" class="btn btn-danger">Hapus</a>
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