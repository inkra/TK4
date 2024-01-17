<?php

namespace Controllers;
use Models\Model_pengguna;

class Pengguna
{
    public function __construct()
    {
        $this->pengguna = new Model_pengguna();
    }

    public function index()
    {
        require_once 'app/Views/index.php';
    }

    function show_data()
    {
        if(!isset($_GET['i']))
        {
            $rs = $this->pengguna->lihatData();
            require_once('app/Views/penggunaList.php');
        }
        else
        {
            $rs = $this->pengguna->lihatDataDetail($_GET['i']);
            require_once('app/Views/penggunaDetail.php');
        }
    }

    function save()
    {
        $IdPengguna =  $_POST['IdPengguna'];
        $NamaPengguna = $_POST['NamaPengguna'];
        $Password = $_POST['Password'];
        $NamaDepan = $_POST['NamaDepan'];
        $NamaBelakang = $_POST['NamaBelakang'];
        $NoHP = $_POST['NoHP'];
        $Alamat = $_POST['Alamat'];
        $IdAkses = $_POST['IdAkses'];

        $this->pengguna->simpanData($IdPengguna, $NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHP, $Alamat, $IdAkses);
        $rs = $this->pengguna->lihatData();
        require_once('app/Views/penggunaList.php');
    }

    function update()
    {
        if (isset($_GET['i'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $IdPengguna = $_POST['IdPengguna'];
                $NamaPengguna = $_POST['NamaPengguna'];
                $Password = $_POST['Password'];
                $NamaDepan = $_POST['NamaDepan'];
                $NamaBelakang = $_POST['NamaBelakang'];
                $NoHP = $_POST['NoHP'];
                $Alamat = $_POST['Alamat'];
                $IdAkses = $_POST['IdAkses'];

                $this->pengguna->updateData($IdPengguna, $NamaPengguna, $Password, $NamaDepan, $NamaBelakang, $NoHP, $Alamat, $IdAkses);

                $rs = $this->pengguna->lihatData();
                require_once('app/Views/penggunaList.php');
            } else {
                $pengguna = $this->pengguna->lihatDataDetail($_GET['i']);
                require_once('app/Views/editPengguna.php');
            }
        }
    }

    function delete()
    {
        if (isset($_GET['i'])) {
            $this->pengguna->hapusData($_GET['i']);
            $rs = $this->pengguna->lihatData();
            require_once('app/Views/penggunaList.php');
        }
    }
}
