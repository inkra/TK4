<?php

namespace Controllers;
use Models\Model_dashboard;

class Dashboard{
    public function __construct(){
      $this->dashboard = new Model_dashboard();
    }

    public function index()
    {
        require_once 'app/Views/index.php';
    }

    function show_data(){
      $pembelianData = $this->dashboard->getDataPembelian();
      $penjualanData = $this->dashboard->getDataPenjualan();
      $totalPembelian = $this->dashboard->getTotalPembelian();
      $totalPenjualan = $this->dashboard->getTotalPenjualan();

      require_once('app/Views/Dashboard.php');

    }
}