<?php
/**
 * Controller User
 * Mengatur tampilan daftar user dan detail user
 */
class User extends Controller
{
    // Method utama, routing berdasarkan parameter id
    public function index()
    {
        $data["judul"] = "Daftar Pengguna (User)";
        $data['users'] = $this->model('User_model')->getAllUsers();
        $this->view('templates/header', $data);
        $this->view('list', $data);
        $this->view('templates/footer');
    }

    // Tampilkan detail user berdasarkan id
    public function detail($id)
    {
        $data["judul"] = "Detail user";
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('templates/header', $data);
        $this->view('detail', $data);
        $this->view('templates/footer');
    }

    // tampilkan form tambah
    public function tambah()
    {
        $data['judul'] = 'Tambah User';
        $this->view('templates/header', $data);
        $this->view('tambah', $data);
        $this->view('templates/footer');
    }

    // proses tambah (handle POST)
    public function prosesTambah()
    {
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Data user berhasil ditambahkan.', 'success');
        } else {
            Flasher::setFlash('Gagal', 'Data user gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASEURL . '/user');
        exit;
    }

    // tampilkan form edit
    public function edit($id)
    {
        $data['user'] = $this->model('User_model')->getUserById($id);
        $data['judul'] = 'Edit User: ' . $data['user']['name'];
        $this->view('templates/header', $data);
        $this->view('edit', $data);
        $this->view('templates/footer');
    }

    // proses edit
    public function prosesEdit()
    {
        if ($this->model('User_model')->editDataUser($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Data user berhasil diubah.', 'success');
        } else {
            Flasher::setFlash('Gagal', 'Data user gagal diubah.', 'danger');
        }
        header('Location: ' . BASEURL . '/user');
        exit;
    }

    // hapus
    public function hapus($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            Flasher::setFlash('Berhasil', 'Data user berhasil dihapus.', 'success');
        } else {
            Flasher::setFlash('Gagal', 'Data user gagal dihapus.', 'danger');
        }
        header('Location: ' . BASEURL . '/user');
        exit;
    }
}