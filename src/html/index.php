<?php
require __DIR__ . '/../bootstrap.php';

use BigTyre\Constants;

$data   = $_GET[Constants::ARG_DATA] ?? null;
$code   = $_GET[Constants::ARG_CODE] ?? null;
$width  = $_GET[Constants::ARG_WIDTH]  ?? 1; // 1 is used so that the barcode library will automatically calculate the width
$height = $_GET[Constants::ARG_HEIGHT] ?? 40;

// Get required parameters
if (empty($data) || empty($code)) {
	http_response_code(400);
	header("Content-Type: text/plain");
  echo getUsage();
  die();
}

// Create the barcode generator and list of accepted encodings
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();

// Get the data to encode
$codes = Constants::$codes;
if (array_key_exists($code, $codes)) {
  $type = $codes[$code];
} else {
  $all_codes = join(PHP_EOL, array_keys($codes));
	http_response_code(400);
	header("Content-Type: text/plain");
  die('Invalid code provided.' . PHP_EOL . 'Valid values are: ' . PHP_EOL . $all_codes);
}

// Generate the barcode and output it as a PNG
$img = $generator->getBarcode($data, $type, $width, $height);

if (isset($_GET['base64'])) {
  $base64 = base64_encode($img);
  header('Content-Type: text/plain');
  echo $base64;
  die();
}

header('Content-Type: image/png');
echo $img;

die();

function getUsage() {
  $usage = 'Usage: ?' . Constants::ARG_DATA . '=[data to encode]&' . Constants::ARG_CODE . '=[Barcode Encoding]';
  $usage .= 'Optional: ' . Constants::ARG_WIDTH . '=[int: width in pixels]' . PHP_EOL;
  $usage .=  'Optional: ' . Constants::ARG_HEIGHT . '=[int: height in pixels]' . PHP_EOL;
  $usage .= PHP_EOL . 'Barcode encoding must be one of the following:' . PHP_EOL;
  foreach (Constants::$codes as $string => $code) {
    $usage .= $string . PHP_EOL;
  }
  return $usage;
}