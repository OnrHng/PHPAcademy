<!--// bir php dosyasina baska bir php dosyasini aktarmanin iki farkli yolu vardir.-->
<!--// bir include kullanmaktir.

    Eger kodlariniz cok uzunsa bunun icin en effecietent method include_once kullanmaktir.
    o zaman eger bu dosya bir kez include edildi ise, siz artik kec sefer yazmis olursan ol.
    sadece bir kez interepter edilecektir.
-->
<?php  include_once  "utils/header.php";?>

<!--# digeri require kullanmmaktir. -->
<?php  require  "utils/header.php";

/*
    ikisi arasindaki fark ise include methodu dosyanin olmamasi halinde arkasindan gelen kodu calistirir.
lakin require tam tersi butun codelari bloklar.

    Ne zaman kullanilmalidir?? Eger dosya absolutely gerekli ise require, eger olsa da olur olmasa
da o zaman include.
 */
?>

<h1>About us</h1>
<?php  include_once "utils/footer.php"; ?>
