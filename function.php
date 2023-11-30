<?php
session_start();
// koneksi all
include 'connect.php';

// koneksi aksi

class DataOperation {
    protected $connect;

    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function executeQuery($query) {
        return mysqli_query($this->connect, $query);
    }
}

class AddData extends DataOperation {
    public function execute($data) {
        $merek = $data['merek'];
        $nomor_seri = $data['nomor_seri'];
        $memori = $data['memori'];
        $harga = $data['harga'];
        $stok = $data['stok'];

        $query = "INSERT INTO tb_stock VALUE(null, '$merek', '$memori', '$nomor_seri', '$harga', '$stok')";
        return $this->executeQuery($query);
    }
}

class EditData extends DataOperation {
    public function execute($data) {
        $id_number = $data['id_number'];
        $merek = $data['merek'];
        $nomor_seri = $data['nomor_seri'];
        $memori = $data['memori'];
        $harga = $data['harga'];
        $stok = $data['stok'];

        $query = "UPDATE tb_stock SET brand='$merek' , serial_number='$nomor_seri' , memory='$memori' , price='$harga' , stock='$stok' WHERE id_number='$id_number';";
        return $this->executeQuery($query);
    }
}

class DeleteData extends DataOperation {
    public function execute($data) {
        $id_number = $data['delete'];

        $queryShow = "SELECT * FROM tb_stock WHERE id_number = '$id_number';";
        $sqlShow = $this->executeQuery($queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "DELETE FROM tb_stock WHERE id_number = '$id_number';";
        return $this->executeQuery($query);
    }
}

// Penggunaan polimorfisme
$connect = $database->connect(); 
$dataOperation = new DataOperation($connect);
$addData = new AddData($connect);
$editData = new EditData($connect);
$deleteData = new DeleteData($connect);

?>
