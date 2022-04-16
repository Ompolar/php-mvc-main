<?php

class MatkulMhs_model
{
    private $table = 'matkulmhs';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatkulMhs()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' a LEFT JOIN matkul b ON a.id_matkul = b.id LEFT JOIN mahasiswa c ON a.id = c.id GROUP BY c.nama');
        return $this->db->resultSet();
    }

    public function getMatkulMhsById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' a LEFT JOIN matkul b ON a.id_matkul = b.id LEFT JOIN mahasiswa c ON a.id = c.id WHERE a.id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMatkulMhs($data)
    {
        $query = "INSERT INTO matkulmhs
                    VALUES
                  (:id, :id_matkul)";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('id_matkul', $data['id_matkul']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMatkulMhs($id)
    {
        $query = "DELETE FROM matkulmhs WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMatkulMhs($data)
    {
        $query = "UPDATE matkulmhs SET
                    id_matkul = :id_matkul
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id_matkul', $data['id_matkul']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMatkulMhs()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM matkulmhs WHERE id LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
