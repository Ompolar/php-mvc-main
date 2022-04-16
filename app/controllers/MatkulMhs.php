<?php 

class MatkulMhs extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Mata kuliah Mahasiswa';
        $data['mkm'] = $this->model('MatkulMhs_model')->getAllMatkulMhs();
        $this->view('templates/header', $data);
        $this->view('matkulmhs/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mata kuliah Mahasiswa';
        $data['mkm'] = $this->model('MatkulMhs_model')->getMatkulMhsById($id);
        $this->view('templates/header', $data);
        $this->view('matkulmhs/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('MatkulMhs_model')->tambahDataMatkulMhs($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/matkulmhs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/matkulmhs');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('MatkulMhs_model')->hapusDataMatkulMhs($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/matkulmhs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/matkulmhs');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('MatkulMhs_model')->getMatkulMhsById($_POST['id']));
    }

    public function ubah()
    {
        if( $this->model('MatkulMhs_model')->ubahDataMatkulMhs($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/matkulmhs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/matkulmhs');
            exit;
        } 
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mata kuliah Mahasiswa';
        $data['mhs'] = $this->model('MatkulMhs_model')->cariDataMatkulMhs();
        $this->view('templates/header', $data);
        $this->view('matkulmhs/index', $data);
        $this->view('templates/footer');
    }

}