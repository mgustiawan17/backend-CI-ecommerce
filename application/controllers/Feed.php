<?php 



class Feed extends CI_Controller
{
    function index() {
        $data['dataFeed'] = $this->mFeed->selectAll();

        //cara untuk manggil file viewnya
        $page = [
            "page" => $this->load->view('backend/pages/feed/feed', $data, true)
        ];

        //panggil file main dengan page feed
        return $this->load->view('backend/main', $page);
    }

    function formTambah() {
        $page = [
            "page" => $this->load->view('backend/pages/feed/tambah', null, true)
        ];

        //panggil file main dengan page feed
        return $this->load->view('backend/main', $page);
    }

    function tambah() {
        $data = $this->input->post();
        $data['id_feed'] = rand(11111,99999);

        $config['upload_path'] = './images/feed/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image_feed')) {
            $image = $this->upload->data();
            $data['image_feed'] = $image['file_name'];

            $insert = $this->mFeed->insert($data);
            if ($insert > 0) {
                echo "
                    <script>
                        alert('Data berhasil di tambah');
                        window.location.href = '". base_url('feed/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di tambah');
                        window.location.href = '". base_url('feed/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('feed/index') ."';
                </script>
            ";
    }

    function formUbah($idFeed) {
        $data['dataFeed'] = $this->mFeed->selectBy($idFeed);
        // die(json_encode($data['datafeed']));
        $page = [
            "page" => $this->load->view('backend/pages/feed/ubah', $data, true)
        ];

        //panggil file main dengan page feed
        return $this->load->view('backend/main', $page);
    }

    function ubah($idFeed) {
        $data = $this->input->post();

        $config['upload_path'] = './images/feed/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if (!file_exists($_FILES['image_feed']['tmp_name'])) {
            $update = $this->mFeed->update($idFeed, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('feed/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('feed/index') ."';
                    </script>
                ";
            }
        }
        if ($this->upload->do_upload('image_feed')) {
            $image = $this->upload->data();
            $data['image_feed'] = $image['file_name'];

            $update = $this->mFeed->update($idFeed, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('feed/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('feed/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('feed/index') ."';
                </script>
            ";

    }

    function hapus($idFeed){
        $oldData = $this->mFeed->selectBy($idFeed);
        
        if (file_exists('images/feed/'. $oldData->image_feed)) {
            unlink('images/feed/'. $oldData->image_feed);
        }

        $delete = $this->mFeed->delete($idFeed);

        if ($delete) {
                echo "
                    <script>
                        alert('Data berhasil di hapus');
                        window.location.href = '". base_url('feed/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di hapus');
                        window.location.href = '". base_url('feed/index') ."';
                    </script>
                ";
            }
    }

}



?>