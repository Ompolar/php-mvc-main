<?php 

class Matkul extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Mata Kuliah';
        $data['mtk'] = $this->model('Matkul_model')->getAllMatkul();
        $this->view('templates/header', $data);
        $this->view('matkul/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mata Kuliah';
        $data['mtk'] = $this->model('Matkul_model')->getMatkulById($id);
        $this->view('templates/header', $data);
        $this->view('matkul/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('Matkul_model')->tambahDataMatkul($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('Matkul_model')->hapusDataMatkul($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Matkul_model')->getMatkulById($_POST['id']));
    }

    public function ubah()
    {
        if( $this->model('Matkul_model')->ubahDataMatkul($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } 
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mata Kuliah';
        $data['mtk'] = $this->model('Matkul_model')->cariDataMatkul();
        $this->view('templates/header', $data);
        $this->view('matkul/index', $data);
        $this->view('templates/footer');
    }

}