<?php
$xml = new DOMDocument();
$file = "settings.xml";
$xml->load($file);

if (isset($_POST["GET_LOGO"])) {
    echo $xml->getElementsByTagName("logo")->item(0)->nodeValue;
}
if (isset($_FILES["logo"]["name"]) && $_FILES["logo"]["error"] == 0) {
    $path = $_FILES['logo']['name'];
    $file_tmp = $_FILES["logo"]["tmp_name"];
    $img_path = "../images/" . $path;
    $xml->getElementsByTagName("logo")->item(0)->nodeValue = $img_path;
    move_uploaded_file($file_tmp, "../" . $img_path);
    $xml->save($file);
}
