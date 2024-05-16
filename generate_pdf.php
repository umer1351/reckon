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
        $mpdf->WriteHTML($tableHTML);

    
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
