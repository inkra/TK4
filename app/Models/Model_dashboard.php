<?php

namespace Models;
use Libraries\Database;

class Model_dashboard
{
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    function getDataPembelian()
    {
        $rs = $this->dbh->query("SELECT pembelian.*, barang.NamaBarang FROM pembelian LEFT JOIN barang ON pembelian.IdBarang = barang.IdBarang");
        return $rs;
    }

    function getDataPenjualan()
    {
        $rs = $this->dbh->query("SELECT penjualan.*, barang.NamaBarang FROM penjualan LEFT JOIN barang ON penjualan.IdBarang = barang.IdBarang");
        return $rs;
    }

    function getTotalPembelian()
    {
        $rs = $this->dbh->query("SELECT SUM(hargaBeli) AS totalHargaBeli FROM pembelian");
        $total = $rs->fetchColumn();
        return $total;
    }

    function getTotalPenjualan()
    {
        $rs = $this->dbh->query("SELECT SUM(hargaJual) AS totalHargaJual FROM penjualan");
        $total = $rs->fetchColumn();
        return $total;
    }

}