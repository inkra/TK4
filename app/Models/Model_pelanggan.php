<?php

namespace Models;
use Libraries\Database;

class Model_pelanggan
{
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    function simpanData($IdPelanggan, $NamaPelanggan, $NoHpPelanggan, $AlamatPelanggan)
    {
        $rs = $this->dbh->prepare("INSERT INTO pelanggan (IdPelanggan, NamaPelanggan, NoHpPelanggan, AlamatPelanggan) VALUES (?, ?, ?, ?)");
        $rs->execute([$IdPelanggan, $NamaPelanggan, $NoHpPelanggan, $AlamatPelanggan]);
    }

    function lihatData()
    {
        $rs = $this->dbh->query("SELECT * FROM pelanggan");
        return $rs;
    }

    function lihatDataDetail($IdPelanggan)
    {
        $rs = $this->dbh->prepare("SELECT * FROM pelanggan WHERE IdPelanggan=?");
        $rs->execute([$IdPelanggan]);
        return $rs->fetch();
    }

    function updateData($IdPelanggan, $NamaPelanggan, $NoHpPelanggan, $AlamatPelanggan)
    {
        $rs = $this->dbh->prepare("UPDATE pelanggan SET NamaPelanggan=?, NoHpPelanggan=?, AlamatPelanggan=? WHERE IdPelanggan=?");
        $rs->execute([$NamaPelanggan, $NoHpPelanggan, $AlamatPelanggan, $IdPelanggan]);
    }

    function hapusData($IdPelanggan)
    {
        $rs = $this->dbh->prepare("DELETE FROM pelanggan WHERE IdPelanggan=?");
        $rs->execute([$IdPelanggan]);
    }
}
