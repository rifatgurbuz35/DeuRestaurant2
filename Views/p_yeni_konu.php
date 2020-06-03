<?php require HEADER; ?>

<form class="" action="<?php PATH ?>post/yeniKonu" method="post">
    <input type="text" name="konuadi" value="" placeholder="Konu Adı"><br/>
    <input type="text" name="konubilgi" value="" placeholder="Konu Kısa Bilgi"><br/>
    <input type="text" name="konuicerik" value="" placeholder="Konu İçerik"><br/>
    <button type="submit" name="button">Ekle</button>
</form>

<?php require FOOTER?>

