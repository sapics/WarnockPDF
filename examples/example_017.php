<?php
/**
 * Example 017 for WarnockPDF library
 *
 * @description Two independent columns with MultiCell
 * @author Nicola Asuni - Tecnick.com LTD <info@tecnick.com>
 * @license LGPL-3.0
 */

/**
 * Creates an example PDF TEST document using WarnockPDF
 *
 * @abstract WarnockPDF - Example: Two independent columns with MultiCell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 017');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 017', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Example of independent Multicell() columns', '', 0, 'L', true, 0, false, false, 0);

$pdf->Ln(5);

$pdf->SetFont('times', '', 12);

// create columns content
// create columns content
$left_column = '[LEFT COLUMN] left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column left column' . "\n";

$right_column = '[RIGHT COLUMN] right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column right column' . "\n";

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set color for background
$pdf->SetFillColor(255, 255, 200);

// set color for text
$pdf->SetTextColor(0, 63, 127);

// write the first column
$pdf->MultiCell(80, 0, $left_column, 1, 'J', 1, 0, '', '', true, 0, false, true, 0);

// set color for background
$pdf->SetFillColor(215, 235, 255);

// set color for text
$pdf->SetTextColor(127, 31, 0);

// write the second column
$pdf->MultiCell(80, 0, $right_column, 1, 'J', 1, 1, '', '', true, 0, false, true, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_017.pdf', 'I');
