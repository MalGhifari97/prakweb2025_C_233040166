<?php
/**
 * Model User
 * Menangani semua operasi database yang berkaitan dengan tabel users
 */
class User_model
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Mengambil semua data pengguna dari database
     */
    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    /**
     * Mengambil data pengguna berdasarkan ID
     * $id ID pengguna yang ingin diambil
     */
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    /**
     * Tambah data user (hanya name dan email)
     */
    public function tambahDataUser($data)
    {
        $query = "INSERT INTO " . $this->table . " (name, email) VALUES (:name, :email)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    /**
     * Edit data user (hanya name dan email)
     */
    public function editDataUser($data)
    {
        $query = "UPDATE " . $this->table . " SET name = :name, email = :email WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    /**
     * Hapus data user
     */
    public function hapusDataUser($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}