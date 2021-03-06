<?php

error_reporting(E_ALL);
set_include_path('../src/'.PATH_SEPARATOR.get_include_path());
date_default_timezone_set('UTC');

include 'Cezpdf.php';

class Creport extends Cezpdf
{
    public function __construct($p, $o)
    {
        parent::__construct($p, $o, 'none', array());
    }
}
$pdf = new Creport('a4', 'portrait');
// to test on windows xampp
if (strpos(PHP_OS, 'WIN') !== false) {
    $pdf->tempPath = 'C:/temp';
}

$pdf->ezSetMargins(20, 20, 20, 20);
$pdf->openHere('Fit');

$pdf->selectFont('Helvetica');
$pdf->ezText('Text in Helvetica');
$pdf->selectFont('Courier');
$pdf->ezText('Text in Courier');
$pdf->selectFont('Times-Roman');
$pdf->ezText('Text in Times New Roman');
$pdf->selectFont('ZapfDingbats');
$pdf->ezText('Text in zapfdingbats');

if (isset($_GET['d']) && $_GET['d']) {
    echo $pdf->ezOutput(true);
} else {
    $pdf->ezStream(array('compress' => 0));
}
