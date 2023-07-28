<?php 



class Carousel extends CI_Controller
{
    function index() {
        $data['dataCarousel'] = $this->mCarousel->selectAll();

        //cara untuk manggil file viewnya
        $page = [
            "page" => $this->load->view('backend/pages/carousel/carousel', $data, true)
        ];

        //panggil file main dengan page carousel
        return $this->load->view('backend/main', $page);
    }

    function formTambah() {
        $page = [
            "page" => $this->load->view('backend/pages/carousel/tambah', null, true)
        ];

        //panggil file main dengan page carousel
        return $this->load->view('backend/main', $page);
    }

    function tambah() {
        $data = $this->input->post();
        $data['id_carousel'] = rand(11111,99999);

        $config['upload_path'] = './images/carousel/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('img_carousel')) {
            $image = $this->upload->data();
            $data['img_carousel'] = $image['file_name'];

            $insert = $this->mCarousel->insert($data);
            if ($insert > 0) {
                echo "
                    <script>
                        alert('Data berhasil di tambah');
                        window.location.href = '". base_url('carousel/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di tambah');
                        window.location.href = '". base_url('carousel/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('carousel/index') ."';
                </script>
            ";
    }

    function formUbah($idCarousel) {
        $data['dataCarousel'] = $this->mCarousel->selectBy($idCarousel);
        // die(json_encode($data['datacarousel']));
        $page = [
            "page" => $this->load->view('backend/pages/carousel/ubah', $data, true)
        ];

        //panggil file main dengan page carousel
        return $this->load->view('backend/main', $page);
    }

    function ubah($idCarousel) {
        $data = $this->input->post();

        $config['upload_path'] = './images/carousel/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '.png';
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if (!file_exists($_FILES['img_carousel']['tmp_name'])) {
            $update = $this->mCarousel->update($idCarousel, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('carousel/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('carousel/index') ."';
                    </script>
                ";
            }
        }
        if ($this->upload->do_upload('img_carousel')) {
            $image = $this->upload->data();
            $data['img_carousel'] = $image['file_name'];

            $update = $this->mCarousel->update($idCarousel, $data);
            if ($update) {
                echo "
                    <script>
                        alert('Data berhasil di update');
                        window.location.href = '". base_url('carousel/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di update');
                        window.location.href = '". base_url('carousel/index') ."';
                    </script>
                ";
            }
        }
        echo "
            <script>
                alert('".$this->upload->display_errors()."');
                    window.location.href = '". base_url('carousel/index') ."';
                </script>
            ";

    }

    function hapus($idCarousel){
        $oldData = $this->mCarousel->selectBy($idCarousel);
        
        if (file_exists('images/carousel/'. $oldData->image_carousel)) {
            unlink('images/carousel/'. $oldData->image_carousel);
        }

        $delete = $this->mCarousel->delete($idCarousel);

        if ($delete) {
                echo "
                    <script>
                        alert('Data berhasil di hapus');
                        window.location.href = '". base_url('carousel/index') ."';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data gagal di hapus');
                        window.location.href = '". base_url('carousel/index') ."';
                    </script>
                ";
            }
    }

}



?>