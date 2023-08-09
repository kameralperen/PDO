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

    $GelenID            =   14;
    $GelenCinsiyet      =   'Erkek';
    $GelenSDurum        =   'evet';
    $GelenEmail         =   'yigitbaba@izmirlee.com';
    $GelenParti         =   'chp';

    $Guncelle  =   $DB->prepare("UPDATE oldurulecekler SET Cinsiyet=?, Durum=?, Emailadresi=?, HangiPartili=? WHERE id=?");
    $Guncelle->bindParam(1, $GelenCinsiyet, PDO::PARAM_STR);
    $Guncelle->bindParam(2, $GelenSDurum, PDO::PARAM_STR);
    $Guncelle->bindParam(3, $GelenEmail, PDO::PARAM_STR);
    $Guncelle->bindParam(4, $GelenParti, PDO::PARAM_STR);
    $Guncelle->bindParam(5, $GelenID, PDO::PARAM_INT);
    $Guncelle->execute();
        if($Guncelle){
            echo "Kayıt Güncellendi babba :)";
        }else{
            echo "Sorgu hatası!";
        }
    $DB =   null;
    ?>
</body>
</html>