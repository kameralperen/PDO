<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-language" content="tr">
<title>Başlık</title>
</head>
<body>
    <?php
    try{
        $VeriTabaniBaglantisiBir   =   new PDO("mysql:host=localhost; dbname=uskumru; charset=utf8", "root", "");
        $VeriTabaniBaglantisiIki   =   new PDO("mysql:host=localhost; dbname=classicmodels; charset=utf8", "root", "");
        echo "Veri tabanlarına bağlantı sağlandı.";
    }catch(PDOException $HataMesaji){
        echo "Bağlantı kurulamadı! <br /> Hata açıklaması: " . $HataMesaji->getMessage();
        die();
    }

    $VeriTabaniBaglantisiBir   =   null;
    $VeriTabaniBaglantisiIki   =   null;
    ?>
</body>
</html>