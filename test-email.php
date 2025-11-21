<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

try {
    echo "Mengirim email test...\n";
    
    Mail::to('anwarudinmupti@gmail.com')->send(new OtpMail('123456'));
    
    echo "✓ Email berhasil dikirim!\n";
    echo "Silakan cek inbox atau folder spam di anwarudinmupti@gmail.com\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "\nDetail:\n";
    echo $e->getTraceAsString();
}
