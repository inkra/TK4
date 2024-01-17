<?php

namespace Models;
use Libraries\Database;

class Model_barang
{
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    function simpanData($IdBarang, $NamaBarang, $Keterangan, $Satuan, $IdSupplier)
    {
        $rs = $this->dbh->prepare("INSERT INTO barang (IdBarang, NamaBarang, Keterangan, Satuan, IdSupplier) VALUES (?, ?, ?, ?, ?)");
        $rs->execute([$IdBarang, $NamaBarang, $Keterangan, $Satuan, $IdSupplier]);
    }

    function lihatData()
    {
        $rs = $this->dbh->query("SELECT barang.*, suppliers.NamaSupplier FROM barang 
                                LEFT JOIN suppliers ON barang.IdSupplier = suppliers.IdSupplier");
        return $rs;
    }

    function lihatDataDetail($IdBarang)
    {
        $rs = $this->dbh->prepare("SELECT * FROM barang WHERE IdBarang=?");
        $rs->execute([$IdBarang]);
        return $rs->fetch();
    }

    function updateData($IdBarang, $NamaBarang, $Keterangan, $Satuan, $IdSupplier)
    {
        $rs = $this->dbh->prepare("UPDATE barang SET NamaBarang=?, Keterangan=?, Satuan=?, IdSupplier=? WHERE IdBarang=?");
        $rs->execute([$NamaBarang, $Keterangan, $Satuan, $IdSupplier, $IdBarang]);
    }

    function hapusData($IdBarang)
    {
        $rs = $this->dbh->prepare("DELETE FROM barang WHERE IdBarang=?");
        $rs->execute([$IdBarang]);
    }
}
