<?php 



class Product extends CI_Controller
{
    function index() {
        $data['dataProduct'] = $this->mProduct->selectAll();

        //cara untuk manggil file viewnya
        $page = [
            "page" => $this->load->view('backend/pages/product/product', $data, true)
        ];

        //panggil file main dengan page product
        return $this->load->view('backend/main', $page);
    }

    function formTambah() {
        $data['subcategory'] = $this->mSubcategory->selectAll('*',null);
        $page = [
            "page" => $this->load->view('backend/pages/product/tambah', $data, true)
        ];

        //panggil file main dengan page product
        return $this->load->view('backend/main', $page);
    }

    function tambah() {
        $data = $this->input->post();
        $data['id_product'] = rand(11111,99999);

        $config['upload_path'] = './images/product/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image_product')) {
            $image = $this->upload->data();
            $data['image_product'] = $image['file_name'];

            $insert = $this->mProduct->insert($data);
            if ($insert > 0) {
                echo "
                    <script>
                        alert('Data berhasil di tambah');
                        window.location.href = '". base_url('product/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di tambah');
                        window.location.href = '". base_url('product/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('product/index') ."';
                </script>
            ";
    }

    function formUbah($idProduct) {
        $data['dataProduct'] = $this->mProduct->selectBy($idProduct);
        $data['dataSubcategory'] = $this->mSubcategory->selectAll('*',null);
        // die(json_encode($data['dataproduct']));
        $page = [
            "page" => $this->load->view('backend/pages/product/ubah', $data, true)
        ];

        //panggil file main dengan page product
        return $this->load->view('backend/main', $page);
    }

    function ubah($idProduct) {
        $data = $this->input->post();

        $config['upload_path'] = './images/product/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if (!file_exists($_FILES['image_product']['tmp_name'])) {
            $update = $this->mProduct->update($idProduct, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('product/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('product/index') ."';
                    </script>
                ";
            }
        }
        if ($this->upload->do_upload('image_product')) {
            $image = $this->upload->data();
            $data['image_product'] = $image['file_name'];

            $update = $this->mProduct->update($idProduct, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('product/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('product/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('product/index') ."';
                </script>
            ";

    }

    function hapus($idProduct){
        $oldData = $this->mProduct->selectBy($idProduct);
        
        if (file_exists('images/product/'. $oldData->image_product)) {
            unlink('images/product/'. $oldData->image_product);
        }

        $delete = $this->mProduct->delete($idProduct);

        if ($delete) {
                echo "
                    <script>
                        alert('Data berhasil di hapus');
                        window.location.href = '". base_url('product/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di hapus');
                        window.location.href = '". base_url('product/index') ."';
                    </script>
                ";
            }
    }

}



?>