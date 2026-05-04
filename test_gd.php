<?php
$path = 'C:/Users/digisoft/source/ajowa.webdummy.info/uploads/harsh.png';

if (!file_exists($path)) {
    die("❌ File does not exist: $path");
}

$img = imagecreatefrompng($path);
if (!$img) {
    die("❌ GD failed to load image from: $path");
} else {
    echo "✅ GD loaded image successfully.";
}
?>
