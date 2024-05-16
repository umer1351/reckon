<?php
// Provide the path to the generated PDF file
$pdfFilePath = 'pdf/output.pdf';

// Set appropriate headers for file download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="output.pdf"');
header('Content-Length: ' . filesize($pdfFilePath));

// Output the file for download
readfile($pdfFilePath);