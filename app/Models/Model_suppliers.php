<?php

    /**
     * Model mahasiswa berfungsi untuk menjalankan query
     * Sebelum menggunakan query, load dulu library database
     */

    namespace Models;
    use Libraries\Database;

    class Model_suppliers
    {
        public function __construct()
        {
            $db = new Database();
            $this->dbh = $db->getInstance();
        }

        function simpanData($IdSupplier, $NamaSupplier, $NoHpSupplier, $AlamatSupplier)
{
    $rs = $this->dbh->prepare("INSERT INTO suppliers (IdSupplier, NamaSupplier, NoHpSupplier, AlamatSupplier) VALUES (?, ?, ?, ?)");
    $rs->execute([$IdSupplier, $NamaSupplier, $NoHpSupplier, $AlamatSupplier]);
}


        function lihatData()
        {

            $rs = $this->dbh->query("SELECT * FROM suppliers");
            return $rs;
        }

        function lihatDataDetail($IdSupplier)
        {

            $rs = $this->dbh->prepare("SELECT * FROM suppliers WHERE IdSupplier=?");
            $rs->execute([$IdSupplier]);
            return $rs->fetch();// kalau hasil query hanya satu, gunakan method fetch() bawaan PDO
        }

        function updateData($IdSupplier, $NamaSupplier, $NoHpSupplier, $AlamatSupplier)
{
    $rs = $this->dbh->prepare("UPDATE suppliers SET NamaSupplier=?, NoHpSupplier=?, AlamatSupplier=? WHERE IdSupplier=?");
    $rs->execute([$NamaSupplier, $NoHpSupplier, $AlamatSupplier, $IdSupplier]);
    // No need to fetch here since it's an UPDATE query
}

    function hapusData($IdSupplier)
    {
        $rs = $this->dbh->prepare("DELETE FROM suppliers WHERE IdSupplier=?");
        $rs->execute([$IdSupplier]);
        return $rs->fetch();
    }

    }