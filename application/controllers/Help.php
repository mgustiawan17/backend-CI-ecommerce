<?php 



class Help extends CI_Controller
{
    function index() {
        $data['dataHelp'] = $this->mHelp->selectAll();

        //cara untuk manggil file viewnya
        $page = [
            "page" => $this->load->view('backend/pages/help/help', $data, true)
        ];

        //panggil file main dengan page help
        return $this->load->view('backend/main', $page);
    }

    function formTambah() {
        $page = [
            "page" => $this->load->view('backend/pages/help/tambah', null, true)
        ];

        //panggil file main dengan page help
        return $this->load->view('backend/main', $page);
    }

    function tambah() {
        $data = $this->input->post();
        $data['id_help'] = rand(11111,99999);

        $config['upload_path'] = './images/help/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image_help')) {
            $image = $this->upload->data();
            $data['image_help'] = $image['file_name'];

            $insert = $this->mHelp->insert($data);
            if ($insert > 0) {
                echo "
                    <script>
                        alert('Data berhasil di tambah');
                        window.location.href = '". base_url('help/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di tambah');
                        window.location.href = '". base_url('help/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('help/index') ."';
                </script>
            ";
    }

    function formUbah($idHelp) {
        $data['dataHelp'] = $this->mHelp->selectBy($idHelp);
        // die(json_encode($data['datahelp']));
        $page = [
            "page" => $this->load->view('backend/pages/help/ubah', $data, true)
        ];

        //panggil file main dengan page help
        return $this->load->view('backend/main', $page);
    }

    function ubah($idHelp) {
        $data = $this->input->post();

        $config['upload_path'] = './images/help/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if (!file_exists($_FILES['image_help']['tmp_name'])) {
            $update = $this->mHelp->update($idHelp, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('help/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('help/index') ."';
                    </script>
                ";
            }
        }
        if ($this->upload->do_upload('image_help')) {
            $image = $this->upload->data();
            $data['image_help'] = $image['file_name'];

            $update = $this->mHelp->update($idHelp, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('help/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('help/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('help/index') ."';
                </script>
            ";

    }

    function hapus($idHelp){
        $oldData = $this->mHelp->selectBy($idHelp);
        
        if (file_exists('images/help/'. $oldData->image_help)) {
            unlink('images/help/'. $oldData->image_help);
        }

        $delete = $this->mHelp->delete($idHelp);

        if ($delete) {
                echo "
                    <script>
                        alert('Data berhasil di hapus');
                        window.location.href = '". base_url('help/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di hapus');
                        window.location.href = '". base_url('help/index') ."';
                    </script>
                ";
            }
    }

}



?>