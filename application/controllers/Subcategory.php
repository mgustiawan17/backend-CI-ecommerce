<?php 



class Subcategory extends CI_Controller
{
    function index($idCategory) {
        $data['dataSubcategory'] = $this->mSubcategory->selectAll('*',$idCategory);
        $data['id_category'] = $idCategory;

        //cara untuk manggil file viewnya
        $page = [
            "page" => $this->load->view('backend/pages/subcategory/subcategory', $data, true)
        ];

        //panggil file main dengan page subcategory
        return $this->load->view('backend/main', $page);
    }

    function formTambah($idCategory) {
        $data['id_category'] = $idCategory;
        $page = [
            "page" => $this->load->view('backend/pages/subcategory/tambah', $data, true)
        ];

        //panggil file main dengan page subcategory
        return $this->load->view('backend/main', $page);
    }

    function tambah($idCategory) {
        $data = $this->input->post();
        $data['id_subcategory'] = rand(11111,99999);
        $data['id_category'] = $idCategory;

        $config['upload_path'] = './images/subcategory/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image_subcategory')) {
            $image = $this->upload->data();
            $data['image_subcategory'] = $image['file_name'];

            $insert = $this->mSubcategory->insert($data);
            if ($insert > 0) {
                echo "
                    <script>
                        alert('Data berhasil di tambah');
                        window.location.href = '". base_url('subcategory/index/'.$idCategory) ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di tambah');
                        window.location.href = '". base_url('subcategory/index/'.$idCategory) ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('subcategory/index/'.$idCategory) ."';
                </script>
            ";
    }

    function formUbah($idCategory) {
        $data['id_category'] = $idCategory;
        $data['dataSubcategory'] = $this->mSubcategory->selectBy($idCategory);
        // die(json_encode($data['datasubcategory']));
        $page = [
            "page" => $this->load->view('backend/pages/subcategory/ubah', $data, true)
        ];

        //panggil file main dengan page subcategory
        return $this->load->view('backend/main', $page);
    }

    function ubah($idSubcategory,$idCategory) {
        $data = $this->input->post();
        $data['id_category'] = $idCategory;

        $config['upload_path'] = './images/subcategory/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if (!file_exists($_FILES['image_subcategory']['tmp_name'])) {
            $update = $this->mSubcategory->update($idSubcategory, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('subcategory/index/'.$idCategory) ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('subcategory/index/'.$idCategory) ."';
                    </script>
                ";
            }
        }
        if ($this->upload->do_upload('image_subcategory')) {
            $image = $this->upload->data();
            $data['image_subcategory'] = $image['file_name'];

            $update = $this->mSubcategory->update($idSubcategory, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('subcategory/index/'.$idCategory) ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('subcategory/index/'.$idCategory) ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('subcategory/index/'.$idCategory) ."';
                </script>
            ";

    }

    function hapus($idSubcategory, $idCategory){
        $data['id_category'] = $idCategory;
        $oldData = $this->mSubcategory->selectBy($idSubcategory);
        
        if (file_exists('images/subcategory/'. $oldData->image_subcategory)) {
            unlink('images/subcategory/'. $oldData->image_subcategory);
        }

        $delete = $this->mSubcategory->delete($idSubcategory);

        if ($delete) {
                echo "
                    <script>
                        alert('Data berhasil di hapus');
                        window.location.href = '". base_url('subcategory/index/'.$idCategory) ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di hapus');
                        window.location.href = '". base_url('subcategory/index/'.$idCategory) ."';
                    </script>
                ";
            }
    }

}



?>