<?php
if (isset($_POST['tableHTML'])) {
    // Include mPDF library
    require_once __DIR__ . '/vendor/autoload.php';

    // Get table HTML from the POST data
    $tableHTML = $_POST['tableHTML'];

    try {
        // Create mPDF object
        $mpdf = new \Mpdf\Mpdf();

        // Write HTML content (your table) to PDF
       $logoHTML = '<img src="uploads/logo-instaquoter.png" alt="Logo">';

        // Concatenate the logo HTML with the table HTML
        $tableHTMLWithLogo = $logoHTML . $tableHTML;

        // Write HTML content (table with logo) to PDF
        $mpdf->WriteHTML($tableHTMLWithLogo);

    
        // Specify the output filename and path
   
        // Output PDF to a file or send to the browser
        $mpdf->Output('pdf/output.pdf', \Mpdf\Output\Destination::FILE);

        // Sending success response
        http_response_code(200);
        echo "PDF created successfully";
    } catch (\Mpdf\MpdfException $e) {
        // Sending error response
        http_response_code(500);
        echo 'Error: ' . $e->getMessage();
    } catch (Exception $e) {
        // Sending error response
        http_response_code(500);
        echo 'General Error: ' . $e->getMessage();
    }
}
?>
