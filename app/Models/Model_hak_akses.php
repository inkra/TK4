<?php

namespace Models;
use Libraries\Database;

class Model_hak_akses
{
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    function simpanData($IdAkses, $NamaAkses, $Keterangan)
    {
        $rs = $this->dbh->prepare("INSERT INTO HakAkses (IdAkses, NamaAkses, Keterangan) VALUES (?, ?, ?)");
        $rs->execute([$IdAkses, $NamaAkses, $Keterangan]);
    }

    function lihatData()
    {
        $rs = $this->dbh->query("SELECT * FROM HakAkses");
        return $rs;
    }

    function lihatDataDetail($IdAkses)
    {
        $rs = $this->dbh->prepare("SELECT * FROM HakAkses WHERE IdAkses=?");
        $rs->execute([$IdAkses]);
        return $rs->fetch();
    }

    function updateData($IdAkses, $NamaAkses, $Keterangan)
    {
        $rs = $this->dbh->prepare("UPDATE HakAkses SET NamaAkses=?, Keterangan=? WHERE IdAkses=?");
        $rs->execute([$NamaAkses, $Keterangan, $IdAkses]);
    }

    function hapusData($IdAkses)
    {
        $rs = $this->dbh->prepare("DELETE FROM HakAkses WHERE IdAkses=?");
        $rs->execute([$IdAkses]);
    }
}
