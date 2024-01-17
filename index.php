<?php 
	/**
	 * Bootstrap page
	 * Require file autoload dari vendor
	 */
	require_once __DIR__ . '/vendor/autoload.php';
	use Controllers\Suppliers;
	use Controllers\Pelanggan;
	use Controllers\HakAkses;
	use Controllers\Pengguna;
	use Controllers\Barang;

	/**
	 * Buat objek dari kelas Suppliers
	 */
	$controller = new Suppliers();
	

	//tentukan bagaimana halaman akan di-load
	if(!isset($_GET['act']))
	{
		//pemanggilan method yang akan di-run
		$controller->index();
	}
	else
	{
		switch($_GET['act'])
		{
			case 'home' : 
				$controller->index();
				break;
			
			case 'simpan' :
				$controller->save();
				break;

			case 'tampil-data' :
				$controller->show_data();
				break;

			case 'update' :
				$controller->update();
				break;
			
			case 'delete' :
				$controller->delete();
				break;
			default : 
				$controller->index();
				break;
		}
	}

	$controller = new Pelanggan();

	if (!isset($_GET['actPelanggan'])) {
		$controller->index();
	} else {
		switch ($_GET['actPelanggan']) {
			case 'home':
				$controller->index();
				break;
	
			case 'simpan':
				$controller->save();
				break;
	
			case 'tampil-data':
				$controller->show_data();
				break;
	
			case 'update':
				$controller->update();
				break;
	
			case 'delete':
				$controller->delete();
				break;
	
			default:
				$controller->index();
				break;
		}
	}
	$controller = new HakAkses();

	if (!isset($_GET['actHakAkses'])) {
		$controller->index();
	} else {
		switch ($_GET['actHakAkses']) {
			case 'home':
				$controller->index();
				break;
	
			case 'simpan':
				$controller->save();
				break;
	
			case 'tampil-data':
				$controller->show_data();
				break;
	
			case 'update':
				$controller->update();
				break;
	
			case 'delete':
				$controller->delete();
				break;
	
			default:
				$controller->index();
				break;
		}
	}

	$controller = new Pengguna();

if (!isset($_GET['actPengguna'])) {
    $controller->index();
} else {
    switch ($_GET['actPengguna']) {
        case 'home':
            $controller->index();
            break;

        case 'simpan':
            $controller->save();
            break;

        case 'tampil-data':
            $controller->show_data();
            break;

        case 'update':
            $controller->update();
            break;

        case 'delete':
            $controller->delete();
            break;

        default:
            $controller->index();
            break;
    }
}

$controller = new Barang();

// Tentukan bagaimana halaman akan di-load
if(!isset($_GET['actBarang'])) {
    // Pemanggilan method yang akan di-run
    $controller->index();
} else {
    switch($_GET['actBarang']) {
        case 'home': 
            $controller->index();
            break;

        case 'simpan':
            $controller->save();
            break;

        case 'tampil-data':
            $controller->show_data();
            break;

        case 'update':
            $controller->update();
            break;

        case 'delete':
            $controller->delete();
            break;

        default: 
            $controller->index();
            break;
    }
}
?>