<?php
require 'vendor/autoload.php';
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Facade;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$controller = new ResumeController();
$data = $controller->getResumeData();
$pdf = Barryvdh\DomPDF\Facade\Pdf::loadView('resume_pdf', compact('data'));
$output = $pdf->output();
$size = strlen($output);

echo "PDF Size: " . ($size / 1024) . " KB\n";
file_put_contents('test_resume.pdf', $output);
echo "File saved as test_resume.pdf\n";
