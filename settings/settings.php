<?php
$xml = new DOMDocument();
$file = "settings.xml";
$xml->load($file);

if (isset($_POST["GET_LOGO"])) {
    echo json_encode(array(
        "status" => true,
        'logo' => $xml->getElementsByTagName("logo")->item(0)->nodeValue
    ));
}
if (isset($_POST["GET_ABOUTUS"])) {
    echo json_encode(array(
        "status" => true,
        'address' => $xml->getElementsByTagName("address")->item(0)->nodeValue,
        'contact' => $xml->getElementsByTagName("contact")->item(0)->nodeValue,
        'email' => $xml->getElementsByTagName("email")->item(0)->nodeValue,
        'link' => $xml->getElementsByTagName("link")->item(0)->nodeValue,
    ));
}
if (isset($_FILES["logo"]["name"]) && $_FILES["logo"]["error"] == 0) {
    $path = $_FILES['logo']['name'];
    $file_tmp = $_FILES["logo"]["tmp_name"];
    $img_path = "../images/" . $path;
    $xml->getElementsByTagName("logo")->item(0)->nodeValue = $img_path;
    move_uploaded_file($file_tmp, "../" . $img_path);
    $xml->save($file);
    echo json_encode(array(
        "status" => true,
    ));
}
if (isset($_POST["editAddress"])) {
    $address = $_POST["editAddress"];
    $contact = $_POST["editContact"];
    $email = $_POST["editEmail"];
    // $link = $_POST["editLink"];
    $xml->getElementsByTagName("address")->item(0)->nodeValue = $address;
    $xml->getElementsByTagName("contact")->item(0)->nodeValue = $contact;
    $xml->getElementsByTagName("email")->item(0)->nodeValue = $email;
    // $xml->getElementsByTagName("link")->item(0)->nodeValue = $link;
    $xml->save($file);
    echo json_encode(array(
        "status" => true,
    ));
}
