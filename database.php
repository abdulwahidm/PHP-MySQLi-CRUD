<?php
class Database {
    private $host = "localhost";
    private $db_name = "db_akademik";
    private $username = "root";
    private $password = "";
    private $connect;

    public function koneksiDatabase() {
      try {
          $this->connect = new mysqli($this->host, $this->username, $this->password, $this->db_name);
  
          if ($this->connect->connect_error) {
              throw new Exception("Koneksi database gagal: " . $this->connect->connect_error);
          }
  
          return $this->connect;
      } catch (Exception $e) {
          die("Terjadi kesalahan: " . $e->getMessage());
      }
  }
  

    public function tampil() {
        $query = "SELECT * FROM mahasiswa";
        $result = $this->connect->query($query);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function simpan($nama, $alamat, $umur) {
        $statement = $this->connect->prepare("INSERT INTO mahasiswa (nama, alamat, umur) VALUES (?, ?, ?)");
        $statement->bind_param("ssi", $nama, $alamat, $umur);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>