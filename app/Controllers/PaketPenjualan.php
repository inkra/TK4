<?php

namespace Controllers;


class PaketPenjualan
{
    public function __construct()
    {
    }

    public function index()
    {
        require_once 'app/Views/index.php';
    }

    function show_data(){
      require_once('app/Views/paketPenjualan.php');

    }
}