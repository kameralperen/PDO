<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-language" content="tr">
<title>Gamber Alperen</title>
</head>
<body>

<?php
try {
    $DB = new PDO("mysql:host=localhost;dbname=uskumru;charset=utf8", "root", "");
} catch (PDOException $HataDegeri) {
    echo "Veri tabanı bağlantı hatası! <br /> Hata açıklaması: " . $HataDegeri->getMessage();
    die();
}

$DB->beginTransaction();

$GuncelleBir    =   $DB->prepare("UPDATE hesaplar SET hesapbakiyesi=hesapbakiyesi-1000 WHERE id=1");
$GuncelleBir->execute();
$GuncelleBirKayitSayisi     =   $GuncelleBir->rowCount();
$GuncelleIki    =   $DB->prepare("UPDATE hesaplar SET hesapbakiyesi=hesapbakiyesi+1000 WHERE id=2");
$GuncelleIki->execute();
$GuncelleIkiKayitSayisi     =   $GuncelleIki->rowCount();

$Goster     =   $DB->prepare("SELECT * FROM hesaplar");
$Goster->execute();
if($Goster){
    $KayitSayisi    =   $Goster->rowCount();  
        if($KayitSayisi>0)
            $Kayitlar   =   $Goster->fetchAll();
            foreach($Kayitlar as $Deger){
                echo $Deger["id"] . " | " . $Deger["adisoyadi"] . " | " . $Deger["hesapbakiyesi"] . "<br /><br />";
            }
}else{
    echo "Kayıt Bulunmuyor!";
}


if(($GuncelleBirKayitSayisi>0) and ($GuncelleIkiKayitSayisi>0)){
    echo "İşlemler gerçekleştirildi";
    $DB->commit();
}else{
        $DB->roolBack();
        echo "işlemler gerçekleştirilemedi <br /><br />";
}

$DB = null;
?>

</body>
</html>