<?php

namespace Controllers;
use Models\Model_barang;

class Barang
{
    public function __construct()
    {
        $this->barang = new Model_barang();
    }

    public function index()
    {
        require_once 'app/Views/index.php';
    }

    function show_data()
    {
        if(!isset($_GET['i']))
        {
            $rs = $this->barang->lihatData();
            require_once('app/Views/barangList.php');
        }
        else
        {
            $rs = $this->barang->lihatDataDetail($_GET['i']);
            require_once('app/Views/barangDetail.php');
        }
    }

    function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $IdBarang =  $_POST['IdBarang'];
        $NamaBarang = $_POST['NamaBarang'];
        $Keterangan = $_POST['Keterangan'];
        $Satuan = $_POST['Satuan'];
        $IdSupplier = $_POST['IdSupplier'];

        $this->barang->simpanData($IdBarang, $NamaBarang, $Keterangan, $Satuan, $IdSupplier);
        $rs = $this->barang->lihatData();
        require_once('app/Views/barangList.php');
        }
    }

    function update()
    {
        if (isset($_GET['i'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $IdBarang = $_POST['IdBarang'];
                $NamaBarang = $_POST['NamaBarang'];
                $Keterangan = $_POST['Keterangan'];
                $Satuan = $_POST['Satuan'];
                $IdSupplier = $_POST['IdSupplier'];

                $this->barang->updateData($IdBarang, $NamaBarang, $Keterangan, $Satuan, $IdSupplier);

                $rs = $this->barang->lihatData();
                require_once('app/Views/barangList.php');
            } else {
                $barang = $this->barang->lihatDataDetail($_GET['i']);
                require_once('app/Views/editBarang.php');
            }
        }
    }

    function delete()
    {
        if (isset($_GET['i'])) {
            $this->barang->hapusData($_GET['i']);
            $rs = $this->barang->lihatData();
            require_once('app/Views/barangList.php');
        }
    }
}
