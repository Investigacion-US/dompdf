<?php

// substitution for getimagesize that works with urls behind proxy
function getimagesize_($f, $context = null) {
  if (strtoupper(substr($f,0,4)) == 'HTTP') { // http or https
    $tmp_name = tempnam(sys_get_temp_dir(), "php");
    file_put_contents($tmp_name, file_get_contents($f, false, $context));
    $size = getimagesize($tmp_name);
    unlink($tmp_name);
    return $size;
  } else {
    return getimagesize($f);
  }
}
// substitution for imagecreatefromjpeg that works with urls behind proxy
function imagecreatefromjpeg_($f, $context = null) {
  if (strtoupper(substr($f,0,4)) == 'HTTP') {
    $tmp_name = tempnam(sys_get_temp_dir(), "php");
    file_put_contents($tmp_name, file_get_contents($f, false, $context));
    $img = imagecreatefromjpeg($tmp_name);
    unlink($tmp_name);
    return $img;
  } else {
    return imagecreatefromjpeg($f);
  }
}
// substitution for imagecreatefrompng that works with urls behind proxy
function imagecreatefrompng_($f, $context = null) {
  if (strtoupper(substr($f,0,4)) == 'HTTP') {
    $tmp_name = tempnam(sys_get_temp_dir(), "php");
    //file_put_contents($tmp_name, fopen($f,'r'));
    file_put_contents($tmp_name, file_get_contents($f, false, $context));
    $img = imagecreatefrompng($tmp_name);
    unlink($tmp_name);
    return $img;
  } else {
    return imagecreatefrompng($f);
  }
}
// substitution for imagecreatefromgif that works with urls behind proxy
function imagecreatefromgif_($f, $context = null) {
  if (strtoupper(substr($f,0,4)) == 'HTTP') {
    $tmp_name = tempnam(sys_get_temp_dir(), "php");
    file_put_contents($tmp_name, file_get_contents($f, false, $context));
    $img = imagecreatefromgif($tmp_name);
    unlink($tmp_name);
    return $img;
  } else {
    return imagecreatefromgif($f);
  }
}
