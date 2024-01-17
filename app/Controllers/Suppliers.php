<?php namespace Controllers;
    use Models\Model_suppliers;
    class Suppliers
    {
        public function __construct()
        {
            $this->suppliers = new Model_suppliers();
        }

        public function index()
        {
            require_once 'app/Views/index.php';
        }

        function show_data()
        {
            if(!isset($_GET['i']))
            {
                //jika tidak ada parameter id yang dikirim, maka akan menampilkan semua data yang ada
                $rs = $this->suppliers->lihatData();
                require_once('app/Views/suppliersList.php');
            }
            else
            {
                //ada parameter id yang dikirim, tampilkan detail dari salah satu data yang dipilih
                $rs = $this->suppliers->lihatDataDetail($_GET['i']);
                require_once('app/Views/suppliersDetail.php');
            }
        }

        function save()
        {
            $IdSupplier =  $_POST['IdSupplier'];
            $NamaSupplier = $_POST['NamaSupplier'];
            $NoHpSupplier = $_POST['NoHpSupplier'];
            $AlamatSupplier = $_POST['AlamatSupplier'];

            //penyimpanan data ke model
            $this->suppliers->simpanData($IdSupplier,$NamaSupplier,$NoHpSupplier,$AlamatSupplier);
            $rs = $this->suppliers->lihatData();
            require_once('app/Views/suppliersList.php');
        }

        function update()
{
    if (isset($_GET['i'])) {
        // Check if the form is submitted for update
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $IdSupplier = $_POST['IdSupplier'];
            $NamaSupplier = $_POST['NamaSupplier'];
            $NoHpSupplier = $_POST['NoHpSupplier'];
            $AlamatSupplier = $_POST['AlamatSupplier'];

            // Update data in the model
            $this->suppliers->updateData($IdSupplier, $NamaSupplier, $NoHpSupplier, $AlamatSupplier);

            // Redirect to the list page or index page as needed
            $rs = $this->suppliers->lihatData();
            require_once('app/Views/suppliersList.php');
        } else {
            // Display the update form
            $supplier = $this->suppliers->lihatDataDetail($_GET['i']);
            require_once('app/Views/editSupplier.php');
        }
    }
}

    function delete(){
    if (isset($_GET['i'])) {
        $this->suppliers->hapusData($_GET['i']);
        $rs = $this->suppliers->lihatData();
        require_once('app/Views/suppliersList.php');
    }
    }
    }