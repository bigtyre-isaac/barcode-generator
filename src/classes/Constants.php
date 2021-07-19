<?php
namespace BigTyre;

use Picqer\Barcode\BarcodeGeneratorPNG as Picquer;

Constants::init();

class Constants {
  public const ARG_DATA = 'data';
  public const ARG_CODE = 'code';
  public const ARG_WIDTH = 'width';
  public const ARG_HEIGHT = 'height';

  public static $codes = [];

  public static function init() {
    $codes = [
      'CODE_39'         => Picquer::TYPE_CODE_39,
      'CODE_39_CHECKSUM'          => Picquer::TYPE_CODE_39_CHECKSUM,
      'CODE_39E'                  => Picquer::TYPE_CODE_39E,
      'CODE_39E_CHECKSUM'         => Picquer::TYPE_CODE_39E_CHECKSUM,
      'CODE_93'                   => Picquer::TYPE_CODE_93,
      'STANDARD_2_5'              => Picquer::TYPE_STANDARD_2_5,
      'STANDARD_2_5_CHECKSUM'     => Picquer::TYPE_STANDARD_2_5_CHECKSUM,
      'INTERLEAVED_2_5'           => Picquer::TYPE_INTERLEAVED_2_5,
      'INTERLEAVED_2_5_CHECKSUM'  => Picquer::TYPE_INTERLEAVED_2_5_CHECKSUM,
      'CODE_128'                  => Picquer::TYPE_CODE_128,
      'CODE_128_A'                => Picquer::TYPE_CODE_128_A,
      'CODE_128_B'                => Picquer::TYPE_CODE_128_B,
      'CODE_128_C'                => Picquer::TYPE_CODE_128_C,
      'EAN_2'                     => Picquer::TYPE_EAN_2,
      'EAN_5'                     => Picquer::TYPE_EAN_5,
      'EAN_8'                     => Picquer::TYPE_EAN_8,
      'EAN_13'                    => Picquer::TYPE_EAN_13,
      'UPC_A'                     => Picquer::TYPE_UPC_A,
      'UPC_E'                     => Picquer::TYPE_UPC_E,
      'MSI'                       => Picquer::TYPE_MSI,
      'MSI_CHECKSUM'              => Picquer::TYPE_MSI_CHECKSUM,
      'POSTNET'                   => Picquer::TYPE_POSTNET,
      'PLANET'                    => Picquer::TYPE_PLANET,
      'RMS4CC'                    => Picquer::TYPE_RMS4CC,
      'KIX'                       => Picquer::TYPE_KIX,
      'IMB'                       => Picquer::TYPE_IMB,
      'CODABAR'                   => Picquer::TYPE_CODABAR,
      'CODE_11'                   => Picquer::TYPE_CODE_11,
      'PHARMA_CODE'               => Picquer::TYPE_PHARMA_CODE,
      'PHARMA_CODE_TWO_TRACKS'    => Picquer::TYPE_PHARMA_CODE_TWO_TRACKS
   ];

    foreach ($codes as $string => $code) {
      Constants::$codes[$string] = $code;
    }
  }
}