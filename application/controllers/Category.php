<?php 



class Category extends CI_Controller
{
    function index() {
        $data['dataCategory'] = $this->mCategory->selectAll();

        //cara untuk manggil file viewnya
        $page = [
            "page" => $this->load->view('backend/pages/category/category', $data, true)
        ];

        //panggil file main dengan page category
        return $this->load->view('backend/main', $page);
    }

    function formTambah() {
        $page = [
            "page" => $this->load->view('backend/pages/category/tambah', null, true)
        ];

        //panggil file main dengan page category
        return $this->load->view('backend/main', $page);
    }

    function tambah() {
        $data = $this->input->post();
        $data['id_category'] = rand(11111,99999);

        $config['upload_path'] = './images/category/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image_category')) {
            $image = $this->upload->data();
            $data['image_category'] = $image['file_name'];

            $insert = $this->mCategory->insert($data);
            if ($insert > 0) {
                echo "
                    <script>
                        alert('Data berhasil di tambah');
                        window.location.href = '". base_url('category/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di tambah');
                        window.location.href = '". base_url('category/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('category/index') ."';
                </script>
            ";
    }

    function formUbah($idCategory) {
        $data['dataCategory'] = $this->mCategory->selectBy($idCategory);
        // die(json_encode($data['datacategory']));
        $page = [
            "page" => $this->load->view('backend/pages/category/ubah', $data, true)
        ];

        //panggil file main dengan page category
        return $this->load->view('backend/main', $page);
    }

    function ubah($idCategory) {
        $data = $this->input->post();

        $config['upload_path'] = './images/category/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if (!file_exists($_FILES['image_category']['tmp_name'])) {
            $update = $this->mCategory->update($idCategory, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('category/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('category/index') ."';
                    </script>
                ";
            }
        }
        if ($this->upload->do_upload('image_category')) {
            $image = $this->upload->data();
            $data['image_category'] = $image['file_name'];

            $update = $this->mCategory->update($idCategory, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('category/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('category/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('category/index') ."';
                </script>
            ";

    }

    function hapus($idCategory){
        $oldData = $this->mCategory->selectBy($idCategory);
        
        if (file_exists('images/category/'. $oldData->image_category)) {
            unlink('images/category/'. $oldData->image_category);
        }

        $delete = $this->mCategory->delete($idCategory);

        if ($delete) {
                echo "
                    <script>
                        alert('Data berhasil di hapus');
                        window.location.href = '". base_url('category/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di hapus');
                        window.location.href = '". base_url('category/index') ."';
                    </script>
                ";
            }
    }

}



?>