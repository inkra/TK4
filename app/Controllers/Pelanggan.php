<?php

namespace Controllers;
use Models\Model_pelanggan;

class Pelanggan
{
    public function __construct()
    {
        $this->pelanggan = new Model_pelanggan();
    }

    public function index()
    {
        require_once 'app/Views/index.php';
    }

    function show_data()
    {
        if(!isset($_GET['i']))
        {
            $rs = $this->pelanggan->lihatData();
            require_once('app/Views/pelangganList.php');
        }
        else
        {
            $rs = $this->pelanggan->lihatDataDetail($_GET['i']);
            require_once('app/Views/pelangganDetail.php');
        }
    }

    function save()
    {
        $IdPelanggan =  $_POST['IdPelanggan'];
        $NamaPelanggan = $_POST['NamaPelanggan'];
        $NoHpPelanggan = $_POST['NoHpPelanggan'];
        $AlamatPelanggan = $_POST['AlamatPelanggan'];

        $this->pelanggan->simpanData($IdPelanggan, $NamaPelanggan, $NoHpPelanggan, $AlamatPelanggan);
        $rs = $this->pelanggan->lihatData();
        require_once('app/Views/pelangganList.php');
    }

    function update()
    {
        if (isset($_GET['i'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $IdPelanggan = $_POST['IdPelanggan'];
                $NamaPelanggan = $_POST['NamaPelanggan'];
                $NoHpPelanggan = $_POST['NoHpPelanggan'];
                $AlamatPelanggan = $_POST['AlamatPelanggan'];

                $this->pelanggan->updateData($IdPelanggan, $NamaPelanggan, $NoHpPelanggan, $AlamatPelanggan);

                $rs = $this->pelanggan->lihatData();
                require_once('app/Views/pelangganList.php');
            } else {
                $pelanggan = $this->pelanggan->lihatDataDetail($_GET['i']);
                require_once('app/Views/editPelanggan.php');
            }
        }
    }

    function delete()
    {
        if (isset($_GET['i'])) {
            $this->pelanggan->hapusData($_GET['i']);
            $rs = $this->pelanggan->lihatData();
            require_once('app/Views/pelangganList.php');
        }
    }
}
