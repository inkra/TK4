<?php

namespace Controllers;
use Models\Model_hak_akses;

class HakAkses
{
    public function __construct()
    {
        $this->HakAkses = new Model_hak_akses();
    }

    public function index()
    {
        require_once 'app/Views/index.php';
    }

    function show_data()
    {
        if (!isset($_GET['i'])) {
            $rs = $this->HakAkses->lihatData();
            require_once('app/Views/hakAksesList.php');
        } else {
            $rs = $this->HakAkses->lihatDataDetail($_GET['i']);
            require_once('app/Views/hakAksesDetail.php');
        }
    }

    function save()
    {
        $IdAkses = $_POST['IdAkses'];
        $NamaAkses = $_POST['NamaAkses'];
        $Keterangan = $_POST['Keterangan'];

        $this->HakAkses->simpanData($IdAkses, $NamaAkses, $Keterangan);
        $rs = $this->HakAkses->lihatData();
        require_once('app/Views/hakAksesList.php');
    }

    function update()
    {
        if (isset($_GET['i'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $IdAkses = $_POST['IdAkses'];
                $NamaAkses = $_POST['NamaAkses'];
                $Keterangan = $_POST['Keterangan'];

                $this->HakAkses->updateData($IdAkses, $NamaAkses, $Keterangan);

                $rs = $this->HakAkses->lihatData();
                require_once('app/Views/hakAksesList.php');
            } else {
                $HakAkses = $this->HakAkses->lihatDataDetail($_GET['i']);
                require_once('app/Views/editHakAkses.php');
            }
        }
    }

    function delete()
    {
        if (isset($_GET['i'])) {
            $this->HakAkses->hapusData($_GET['i']);
            $rs = $this->HakAkses->lihatData();
            require_once('app/Views/hakAksesList.php');
        }
    }
}
