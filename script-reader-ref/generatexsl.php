<?php

/** PHPExcel */
include 'PHPExcel/Classes/PHPExcel.php';

// create new PHPExcel object
$objPHPExcel = new PHPExcel;

// set default font
$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');

// set default font size
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

// create the writer
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");



/**

 * Define currency and number format.

 */

// currency format, € with < 0 being in red color
$currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';

// number format, with thousands separator and two decimal points.
$numberFormat = '#,#0.##;[Red]-#,#0.##';



// writer already created the first sheet for us, let's get it
$objSheet = $objPHPExcel->getActiveSheet();

// rename the sheet
$objSheet->setTitle('document spreadsheet');



// let's bold and size the header font and write the header
// as you can see, we can specify a range of cells, like here: cells from A1 to A4
$objSheet->getStyle('A1:L1')->getFont()->setBold(true)->setSize(12);



// write header

$objSheet->getCell('A1')->setValue('Status');
$objSheet->getCell('B1')->setValue('Page #');
$objSheet->getCell('C1')->setValue('Color Highlight Category');
$objSheet->getCell('D1')->setValue('VFX');
$objSheet->getCell('E1')->setValue('Sequence Name');
$objSheet->getCell('F1')->setValue('Scene');
$objSheet->getCell('G1')->setValue('TOD');
$objSheet->getCell('H1')->setValue('Thumbnail');
$objSheet->getCell('I1')->setValue('Plate');
$objSheet->getCell('J1')->setValue('VFX Elements');
$objSheet->getCell('K1')->setValue('VFX Assumptions');
$objSheet->getCell('L1')->setValue('Product Question');



// we could get this data from database, but here we are writing for simplicity

$objSheet->getCell('A2')->setValue('');
$objSheet->getCell('B2')->setValue('');
$objSheet->getCell('C2')->setValue('');
$objSheet->getCell('D2')->setValue('');
$objSheet->getCell('E2')->setValue('');
$objSheet->getCell('F2')->setValue('');
$objSheet->getCell('G2')->setValue('');
$objSheet->getCell('H2')->setValue('');
$objSheet->getCell('I2')->setValue('');
$objSheet->getCell('J2')->setValue('');
$objSheet->getCell('K2')->setValue('');
$objSheet->getCell('L2')->setValue('');

$objSheet->getCell('A3')->setValue('');
$objSheet->getCell('B3')->setValue('');
$objSheet->getCell('C3')->setValue('');
$objSheet->getCell('D3')->setValue('');
$objSheet->getCell('E3')->setValue('');
$objSheet->getCell('F3')->setValue('');
$objSheet->getCell('G3')->setValue('');
$objSheet->getCell('H3')->setValue('');
$objSheet->getCell('I3')->setValue('');
$objSheet->getCell('J3')->setValue('');
$objSheet->getCell('K3')->setValue('');
$objSheet->getCell('L3')->setValue('');

$objSheet->getCell('A4')->setValue('');
$objSheet->getCell('B4')->setValue('');
$objSheet->getCell('C4')->setValue('');
$objSheet->getCell('D4')->setValue('');
$objSheet->getCell('E4')->setValue('');
$objSheet->getCell('F4')->setValue('');
$objSheet->getCell('G4')->setValue('');
$objSheet->getCell('H4')->setValue('');
$objSheet->getCell('I4')->setValue('');
$objSheet->getCell('J4')->setValue('');
$objSheet->getCell('K4')->setValue('');
$objSheet->getCell('L4')->setValue('');

$objSheet->getCell('A5')->setValue('');
$objSheet->getCell('B5')->setValue('');
$objSheet->getCell('C5')->setValue('');
$objSheet->getCell('D5')->setValue('');
$objSheet->getCell('E5')->setValue('');
$objSheet->getCell('F5')->setValue('');
$objSheet->getCell('G5')->setValue('');
$objSheet->getCell('H5')->setValue('');
$objSheet->getCell('I5')->setValue('');
$objSheet->getCell('J5')->setValue('');
$objSheet->getCell('K5')->setValue('');
$objSheet->getCell('L5')->setValue('');

$objSheet->getCell('A6')->setValue('');
$objSheet->getCell('B6')->setValue('');
$objSheet->getCell('C6')->setValue('');
$objSheet->getCell('D6')->setValue('');
$objSheet->getCell('E6')->setValue('');
$objSheet->getCell('F6')->setValue('');
$objSheet->getCell('G6')->setValue('');
$objSheet->getCell('H6')->setValue('');
$objSheet->getCell('I6')->setValue('');
$objSheet->getCell('J6')->setValue('');
$objSheet->getCell('K6')->setValue('');
$objSheet->getCell('L6')->setValue('');

$objSheet->getCell('A7')->setValue('');
$objSheet->getCell('B7')->setValue('');
$objSheet->getCell('C7')->setValue('');
$objSheet->getCell('D7')->setValue('');
$objSheet->getCell('E7')->setValue('');
$objSheet->getCell('F7')->setValue('');
$objSheet->getCell('G7')->setValue('');
$objSheet->getCell('H7')->setValue('');
$objSheet->getCell('I7')->setValue('');
$objSheet->getCell('J7')->setValue('');
$objSheet->getCell('K7')->setValue('');
$objSheet->getCell('L7')->setValue('');

$objSheet->getCell('A8')->setValue('');
$objSheet->getCell('B8')->setValue('');
$objSheet->getCell('C8')->setValue('');
$objSheet->getCell('D8')->setValue('');
$objSheet->getCell('E8')->setValue('');
$objSheet->getCell('F8')->setValue('');
$objSheet->getCell('G8')->setValue('');
$objSheet->getCell('H8')->setValue('');
$objSheet->getCell('I8')->setValue('');
$objSheet->getCell('J8')->setValue('');
$objSheet->getCell('K8')->setValue('');
$objSheet->getCell('L8')->setValue('');

$objSheet->getCell('A9')->setValue('');
$objSheet->getCell('B9')->setValue('');
$objSheet->getCell('C9')->setValue('');
$objSheet->getCell('D9')->setValue('');
$objSheet->getCell('E9')->setValue('');
$objSheet->getCell('F9')->setValue('');
$objSheet->getCell('G9')->setValue('');
$objSheet->getCell('H9')->setValue('');
$objSheet->getCell('I9')->setValue('');
$objSheet->getCell('J9')->setValue('');
$objSheet->getCell('K9')->setValue('');
$objSheet->getCell('L9')->setValue('');

$objSheet->getCell('A10')->setValue('');
$objSheet->getCell('B10')->setValue('');
$objSheet->getCell('C10')->setValue('');
$objSheet->getCell('D10')->setValue('');
$objSheet->getCell('E10')->setValue('');
$objSheet->getCell('F10')->setValue('');
$objSheet->getCell('G10')->setValue('');
$objSheet->getCell('H10')->setValue('');
$objSheet->getCell('I10')->setValue('');
$objSheet->getCell('J10')->setValue('');
$objSheet->getCell('K10')->setValue('');
$objSheet->getCell('L10')->setValue('');

$objSheet->getCell('A11')->setValue('');
$objSheet->getCell('B11')->setValue('');
$objSheet->getCell('C11')->setValue('');
$objSheet->getCell('D11')->setValue('');
$objSheet->getCell('E11')->setValue('');
$objSheet->getCell('F11')->setValue('');
$objSheet->getCell('G11')->setValue('');
$objSheet->getCell('H11')->setValue('');
$objSheet->getCell('I11')->setValue('');
$objSheet->getCell('J11')->setValue('');
$objSheet->getCell('K11')->setValue('');
$objSheet->getCell('L11')->setValue('');

$objSheet->getCell('A12')->setValue('');
$objSheet->getCell('B12')->setValue('');
$objSheet->getCell('C12')->setValue('');
$objSheet->getCell('D12')->setValue('');
$objSheet->getCell('E12')->setValue('');
$objSheet->getCell('F12')->setValue('');
$objSheet->getCell('G12')->setValue('');
$objSheet->getCell('H12')->setValue('');
$objSheet->getCell('I12')->setValue('');
$objSheet->getCell('J12')->setValue('');
$objSheet->getCell('K12')->setValue('');
$objSheet->getCell('L12')->setValue('');



// autosize the columns
$objSheet->getColumnDimension('A')->setAutoSize(true);
$objSheet->getColumnDimension('B')->setAutoSize(true);
$objSheet->getColumnDimension('C')->setAutoSize(true);
$objSheet->getColumnDimension('D')->setAutoSize(true);
$objSheet->getColumnDimension('E')->setAutoSize(true);
$objSheet->getColumnDimension('F')->setAutoSize(true);
$objSheet->getColumnDimension('G')->setAutoSize(true);
$objSheet->getColumnDimension('H')->setAutoSize(true);
$objSheet->getColumnDimension('I')->setAutoSize(true);
$objSheet->getColumnDimension('J')->setAutoSize(true);
$objSheet->getColumnDimension('K')->setAutoSize(true);
$objSheet->getColumnDimension('L')->setAutoSize(true);


//Setting the header type
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="file.xlsx"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output');
echo date('H:i:s') . " Done writing file. 
It can be downloaded by <a href='filexlsx'>clicking here</a>";

/* If you want to save the file on the server instead of downloading, replace the last 4 lines by 
    $objWriter->save('file.xlsx');
*/

?>