<?php
// This script generates placeholder images for our dummy data

// Set content type header
header('Content-Type: image/jpeg');

// Get parameters from URL
$width = isset($_GET['width']) ? intval($_GET['width']) : 800;
$height = isset($_GET['height']) ? intval($_GET['height']) : 600;
$text = isset($_GET['text']) ? $_GET['text'] : 'PPID Dispora Jabar';
$type = isset($_GET['type']) ? $_GET['type'] : '';

// Create image
$image = imagecreatetruecolor($width, $height);

// Define colors
$bg_color = imagecolorallocate($image, 52, 152, 219); // Blue
$text_color = imagecolorallocate($image, 255, 255, 255); // White

// Apply different background colors based on type
if ($type == 'slider') {
    $bg_color = imagecolorallocate($image, 41, 128, 185); // Darker blue
} elseif ($type == 'portfolio') {
    $bg_color = imagecolorallocate($image, 46, 204, 113); // Green
} elseif ($type == 'about') {
    $bg_color = imagecolorallocate($image, 155, 89, 182); // Purple
} elseif ($type == 'source') {
    $bg_color = imagecolorallocate($image, 230, 126, 34); // Orange
} elseif ($type == 'video') {
    $bg_color = imagecolorallocate($image, 231, 76, 60); // Red
}

// Fill background
imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);

// Add text
$font_size = 5;
$text_width = imagefontwidth($font_size) * strlen($text);
$text_height = imagefontheight($font_size);

$x = ($width - $text_width) / 2;
$y = ($height - $text_height) / 2;

imagestring($image, $font_size, $x, $y, $text, $text_color);

// Output image
imagejpeg($image);

// Free memory
imagedestroy($image);
?>
