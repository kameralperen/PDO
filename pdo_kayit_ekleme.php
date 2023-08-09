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
        $DB =   new PDO("mysql:host=localhost;dbname=uskumru;charset=utf8", "root", "");
    }catch(PDOException $HataDegeri){
        echo "Veri tabanı bağlantı hatası! <br /> Hata açıklaması " . $HataDegeri->getMessage();
        die();
    }
    $GelenIsim          =   'Yiğitcan';
    $GelenSoyisim       =   'Serfiçe';
    $GelenYas           =   21;
    $GelenCinsiyet      =   'Serfiçe';
    $GelenSDurum        =   'Serfiçe';
    $GelenEmail         =   'Serfiçe';
    $GelenParti         =   'Serfiçe';

    $Sorgu  =   $DB->prepare("INSERT INTO oldurulecekler (Adi, Soyadi, Yas, Cinsiyet, Durum, Emailadresi, HangiPartili ) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $Sorgu->bindParam(1, $GelenIsim, PDO::PARAM_STR);
    $Sorgu->bindParam(2, $GelenSoyisim, PDO::PARAM_STR);
    $Sorgu->bindParam(3, $GelenYas, PDO::PARAM_INT);
    $Sorgu->bindParam(4, $GelenCinsiyet, PDO::PARAM_STR);
    $Sorgu->bindParam(5, $GelenSDurum, PDO::PARAM_STR);
    $Sorgu->bindParam(6, $GelenEmail, PDO::PARAM_STR);
    $Sorgu->bindParam(7, $GelenParti, PDO::PARAM_STR);
    $Sorgu->execute();

        if($Sorgu){
            echo "Kayıt eklendi :)";
        }else{
            echo "Sorgu hatası!";
        }
    $DB =   null;
    ?>
</body>
</html>