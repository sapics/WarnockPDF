<?php
/**
 * Example 045 for WarnockPDF library
 *
 * @description Bookmarks and Table of Content
 * @author Nicola Asuni - Tecnick.com LTD <info@tecnick.com>
 * @license LGPL-3.0
 */

/**
 * Creates an example PDF TEST document using WarnockPDF
 *
 * @abstract WarnockPDF - Example: Bookmarks and Table of Content
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
$pdf->SetTitle('TCPDF Example 045');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 045', PDF_HEADER_STRING);

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
$pdf->SetFont('times', 'B', 20);

// add a page
$pdf->AddPage();

// set a bookmark for the current position
$pdf->Bookmark('Chapter 1', 0, 0, '', 'B', array(0,64,128));

// print a line using Cell()
$pdf->Cell(0, 10, 'Chapter 1', 0, 1, 'L');

// Create a fixed link to the first page using the * character
$index_link = $pdf->AddLink();
$pdf->SetLink($index_link, 0, '*1');
$pdf->Cell(0, 10, 'Link to INDEX', 0, 1, 'R', false, $index_link);

$pdf->AddPage();
$pdf->Bookmark('Paragraph 1.1', 1, 0, '', '', array(128,0,0));
$pdf->Cell(0, 10, 'Paragraph 1.1', 0, 1, 'L');

$pdf->AddPage();
$pdf->Bookmark('Paragraph 1.2', 1, 0, '', '', array(128,0,0));
$pdf->Cell(0, 10, 'Paragraph 1.2', 0, 1, 'L');

$pdf->AddPage();
$pdf->Bookmark('Sub-Paragraph 1.2.1', 2, 0, '', 'I', array(0,128,0));
$pdf->Cell(0, 10, 'Sub-Paragraph 1.2.1', 0, 1, 'L');

$pdf->AddPage();
$pdf->Bookmark('Paragraph 1.3', 1, 0, '', '', array(128,0,0));
$pdf->Cell(0, 10, 'Paragraph 1.3', 0, 1, 'L');

// fixed link to the first page using the * character
$html = '<a href="#*1" style="color:blue;">link to INDEX (page 1)</a>';
$pdf->writeHTML($html, true, false, true, false, '');


// add some pages and bookmarks
for ($i = 2; $i < 12; $i++) {
    $pdf->AddPage();
    $pdf->Bookmark('Chapter ' . $i, 0, 0, '', 'B', array(0,64,128));
    $pdf->Cell(0, 10, 'Chapter ' . $i, 0, 1, 'L');
}

// . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .

// add a new page for TOC
$pdf->addTOCPage();

// write the TOC title
$pdf->SetFont('times', 'B', 16);
$pdf->MultiCell(0, 0, 'Table Of Content', 0, 'C', 0, 1, '', '', true, 0);
$pdf->Ln();

$pdf->SetFont('dejavusans', '', 12);

// add a simple Table Of Content at first page
// (check the example n. 59 for the HTML version)
$pdf->addTOC(1, 'courier', '.', 'INDEX', 'B', array(128,0,0));

// end of TOC page
$pdf->endTOCPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_045.pdf', 'I');
