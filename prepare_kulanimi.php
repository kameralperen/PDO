<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-language" content="tr">
<title>Gamber Alperen</title>
</head>
<body>
    <?php

        try{
            $DB =   new PDO("mysql:host=localhost;dbname=uskumru;charset=utf8", "root", "");
        }catch(PDOException $HataDegeri){
            echo "Veri tabanı bağlantı hatası! <br /> Hata açıklaması " . $HataDegeri->getMessage();
            die();
        }

        $Sorgu  =   $DB->prepare("select * from oldurulecekler where id<?");
        $Sorgu->execute([3]);
            if($Sorgu){
                $KayitSayisi    =   $Sorgu->rowCount();
                    if($KayitSayisi>0){
                        $Kayitlar   =   $Sorgu->fetchAll();
                        foreach($Kayitlar as $deger){
                            echo $deger["id"] . " | " . $deger["Adi"] . " | " . $deger["Soyadi"] . " | " . $deger["Yas"] . " | " . $deger["Cinsiyet"] . " | " 
                            . $deger["Durum"] . " | " . $deger["Emailadresi"] . " | " .  $deger["HangiPartili"] . " | " .   $deger["KayitTarihi"] . "<br />";
                        }
                    }else{
                        echo "Kayıt yok!!";
                    }
            }else{
                echo "Sorgu hatası!";
            }



        $DB =   null;
    ?>
</body>
</html>