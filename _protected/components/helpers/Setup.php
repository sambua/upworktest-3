<?php
/**
 * Created by PhpStorm.
 * User: rashad
 * Date: 2/28/16
 * Time: 19:45
 */

namespace app\components;

use yii\imagine\Image;

class Setup{
  const DATE_FORMAT = 'php:Y-m-d';
  const DATETIME_FORMAT = 'php:Y-m-d H:i:s';
  const TIME_FORMAT = 'php:H:i:s';

  public static function convert($dateStr, $type='date', $format = null){
    $dateStr = self::_monthName2en($dateStr);
    if ($type === 'datetime') {
      $fmt = ($format == null) ? self::DATETIME_FORMAT : $format;
    }
    elseif ($type === 'time') {
      $fmt = ($format == null) ? self::TIME_FORMAT : $format;
    }
    else {
      $fmt = ($format == null) ? self::DATE_FORMAT : $format;
    }
    return \Yii::$app->formatter->asDate($dateStr, $fmt);
  }

  //This method will translit all other language characters to English character
  public static function str2url($str){
    // Translate to translit
    $str = self::_translit2en($str);
    // To lower string
    $str = strtolower($str);
    // Disappear all others with nothign
    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    // Delete first and last '-'
    $str = trim($str, " ");
    return $str;
  }


  private static function _translit2en($string){
    $converter = [
      //russian
      'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e',
      'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm',
      'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',  'у' => 'u',
      'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '',
      'ы' => 'y', 'ъ' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

      //russian uppercase
      'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'E',
      'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M',
      'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',  'У' => 'U',
      'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch', 'Ь' => '',
      'Ы' => 'Y', 'Ъ' => '', 'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',

      //Azeri and Turkish lowercase
      'ə' => 'e', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'gh', 'ı' => 'i', 'ç' => 'ch', 'ş' => 'sh', 'i' => 'i',

      //Azeri and Turkish uppercase
      'Ə' => 'E', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'GH', 'I' => 'I', 'Ç' => 'CH', 'Ş' => 'SH', 'İ' => 'i',
    ];
    return strtr($string, $converter);
  }


  /** Cut string after some length and put dost if require on end*/
  public static function truncate($string, $length, $dots = ""){
    //$dots = "...";
    return (strlen($string) > $length) ? mb_substr($string, 0, $length - strlen($dots), 'utf-8') . $dots : $string;
  }

  public static function cropImageFromCenter($fileName, $path, $img_w = Null, $thumb_w = Null, $thumb_h = Null, $img_h = Null){
    $size = getimagesize($path);
    if( $img_w > 0 && $img_h >0){
      $x_coordinate = ($img_w > $size[0]) ? 0 : (($size[0]/2) - ($img_w/2));
      $y_coordinate = ($img_h > $size[1]) ? 0 : (($size[1]/2) - ($img_h/2));

      if(($img_w < $size[0]) || ($img_h < $size[1]))
        Image::crop($path, $img_w, $img_h, [$x_coordinate, $y_coordinate])->save($path,['quality' => 71]);
    }
    if( ($thumb_w > 0 && $thumb_h >0) && (($thumb_w < $size[0]) || ($thumb_h < $size[1])))
      Image::thumbnail($path, $thumb_w, $thumb_h)->save(dirname($path)."/thumb/".$fileName);
  }

  public static function resizeImageFromCenter($fileName, $path, $img_w = Null, $thumb_w = Null, $thumb_h = Null, $img_h = Null){
    $img = Image::getImagine()->open($path);
    $size = $img->getSize();
    $ratio = $size->getWidth()/$size->getHeight();

    $width = $img_w;
    $height = round($width/$ratio);

    $box = new \Imagine\Image\Box($width, $height);
    $img->resize($box)->save($path);

    if($thumb_w > 0) {
      $thumb_h = ($thumb_h > 0) ? $thumb_h : round($thumb_w/$ratio);
      $thumb = new \Imagine\Image\Box($thumb_w, $thumb_h);
      $thumb_path = dirname($path)."/thumb";
      if(!is_dir($thumb_path)) mkdir($thumb_path);
      $img->resize($thumb)->save($thumb_path."/".$fileName);
    }
  }

  public static function resizeImage($path, $image, $img_w, $img_thumb_w = NULL, $img_h = NULL, $img_thumb_h = NULL){

    if(!is_null($img_w)){

      if(is_null($img_h)) $img_h = $img_w * (9/16);
      Image::thumbnail($path, $img_w, $img_h )->save($path);
      # \gregwar\image\Image::open($path)->scaleResize($img_w, $img_h, "#ffffff")->save($path, $image->extension, '71');
    }

    if(!is_null($img_thumb_w)){
      $thumb_path = dirname($path)."/thumb";

      if(is_null($img_thumb_h)) $thumb_h = $img_thumb_w * (9/16);

      if(!is_dir($thumb_path)) mkdir($thumb_path);

      Image::thumbnail($path, $img_thumb_w, $img_h )->save($thumb_path);
      #\gregwar\image\Image::open($path)->scaleResize($img_thumb_w, $thumb_h, "#ffffff")->save($thumb_path, $image->extension, '71');
    }
  }

  /**
   * Glob function doesn't return the hidden files, therefore scandir can be more useful,
   * when trying to delete recursively a tree.
   * @param type $dir
   * @return type
   */

  public static function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
      (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
  }

  public static function convertToStars($score){
    $html = '';
    for($i=0 ; $i < $score; $i++){
      $html .= "<span class='hotel-stars'><i class='fa fa-star'></i></span>";
    }
    return $html;
  }

}

