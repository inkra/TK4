<?php

namespace Models;
use Libraries\Database;

class Model_pengguna
{
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    function simpanData($IdPengguna, $NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHP, $Alamat, $IdAkses)
    {
        $rs = $this->dbh->prepare("INSERT INTO pengguna (IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHP, Alamat, IdAkses) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $rs->execute([$IdPengguna, $NamaPengguna, md5($Password), $NamaDepan, $NamaBelakang, $NoHP, $Alamat, $IdAkses]);
    }

    function lihatData()
    {
        $rs = $this->dbh->query("SELECT pengguna.*, hakakses.NamaAkses FROM pengguna LEFT JOIN hakakses ON pengguna.IdAkses = hakakses.IdAkses");
        return $rs;
    }

    function lihatDataDetail($IdPengguna)
    {
        $rs = $this->dbh->prepare("SELECT * FROM pengguna WHERE IdPengguna=?");
        $rs->execute([$IdPengguna]);
        return $rs->fetch();
    }

    function updateData($IdPengguna, $NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHP, $Alamat, $IdAkses)
    {
        $rs = $this->dbh->prepare("UPDATE pengguna SET NamaPengguna=?, Password=?, NamaDepan=?, NamaBelakang=?, NoHP=?, Alamat=?, IdAkses=? WHERE IdPengguna=?");
        $rs->execute([$NamaPengguna, md5($Password), $NamaDepan, $NamaBelakang, $NoHP, $Alamat, $IdAkses, $IdPengguna]);
    }

    function hapusData($IdPengguna)
    {
        $rs = $this->dbh->prepare("DELETE FROM pengguna WHERE IdPengguna=?");
        $rs->execute([$IdPengguna]);
    }
}
