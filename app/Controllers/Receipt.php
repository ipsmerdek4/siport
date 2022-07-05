<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;

class Receipt extends Controller{

    public function index()
    {
        $dompdfs = new Dompdf;


        $html = view('receipt_pdf'); 
        $dompdfs->set_option('isRemoteEnabled', TRUE);
        $dompdfs->set_option("isPhpEnabled", true); 
        $dompdfs->setPaper('A4', 'Portrait'); 
        $dompdfs->loadHtml($html); 
        $dompdfs->render();
        $dompdfs->stream('Laporan'.date('Ymdhis').'.pdf', array(
                "Attachment" => false

        ));



 
     }
 



}