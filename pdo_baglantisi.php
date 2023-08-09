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
        $VeriTabaniBaglantisi   =   new PDO("mysql:host=localhost; dbname=uskumru; charset=utf8", "root", ""); //php data objet anlamına gelir. Bağlantı kurma metodu bu şekilde veya değişkenlerden de gelebilir
        echo "Veri tabanına bağlantı sağlandı.";
    }catch(PDOException $HataMesaji){
        echo "Bağlantı kurulamadı! <br /> Hata açıklaması: " . $HataMesaji->getMessage();
        die();
    }

    $VeriTabaniBaglantisi   =   null; //veri tabanını kapatma(boşaltma) işlemidir
    ?>
</body>
</html>