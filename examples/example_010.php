<?php
/**
 * Example 010 for WarnockPDF library
 *
 * @description Text on multiple columns
 * @author Nicola Asuni - Tecnick.com LTD <info@tecnick.com>
 * @license LGPL-3.0
 */

/**
 * Creates an example PDF TEST document using WarnockPDF
 *
 * @abstract WarnockPDF - Example: Text on multiple columns
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');


/**
 * Extend TCPDF to work with multiple columns
 */
class MC_TCPDF extends TCPDF
{

    /**
     * Print chapter
     * @param int $num chapter number
     * @param string $title chapter title
     * @param string $file name of the file containing the chapter body
     * @param bool $mode if true the chapter body is in HTML, otherwise in simple text.
     * @public
     */
    public function PrintChapter($num, $title, $file, $mode = false) {
        // add a new page
        $this->AddPage();
        // disable existing columns
        $this->resetColumns();
        // print chapter title
        $this->ChapterTitle($num, $title);
        // set columns
        $this->setEqualColumns(3, 57);
        // print chapter body
        $this->ChapterBody($file, $mode);
    }

    /**
     * Set chapter title
     * @param int $num chapter number
     * @param string $title chapter title
     * @public
     */
    public function ChapterTitle($num, $title) {
        $this->SetFont('helvetica', '', 14);
        $this->SetFillColor(200, 220, 255);
        $this->Cell(180, 6, 'Chapter ' . $num . ' : ' . $title, 0, 1, '', 1);
        $this->Ln(4);
    }

    /**
     * Print chapter body
     * @param string $file name of the file containing the chapter body
     * @param bool $mode if true the chapter body is in HTML, otherwise in simple text.
     * @public
     */
    public function ChapterBody($file, $mode = false) {
        $this->selectColumn();
        // get external file content
        $content = file_get_contents($file, false);
        // set font
        $this->SetFont('times', '', 9);
        $this->SetTextColor(50, 50, 50);
        // print content
        if ($mode) {
            // ------ HTML MODE ------
            $this->writeHTML($content, true, false, true, false, 'J');
        } else {
            // ------ TEXT MODE ------
            $this->Write(0, $content, '', 0, 'J', true, 0, false, true, 0);
        }
        $this->Ln();
    }
} // end of extended class

// ---------------------------------------------------------
// EXAMPLE
// ---------------------------------------------------------
// create new PDF document
$pdf = new MC_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 010');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 010', PDF_HEADER_STRING);

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

// print TEXT
$pdf->PrintChapter(1, 'LOREM IPSUM [TEXT]', dirname(__FILE__) . '/data/chapter_demo_1.txt', false);

// print HTML
$pdf->PrintChapter(2, 'LOREM IPSUM [HTML]', dirname(__FILE__) . '/data/chapter_demo_2.txt', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_010.pdf', 'I');
