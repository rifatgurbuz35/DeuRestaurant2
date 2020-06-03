<?php include HEADER2; ?>

<div class="container my-5">
    <div>
        <div class="col text-center ">SİPARİŞLER</div>
    </div>
    <?php
    echo '<table class="table">
  <thead class="black white-text">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Müşteri</th>
      <th scope="col">Menu</th>
      <th scope="col">Sayı</th>
      <th scope="col">Kategori</th>
      <th scope="col">Tutar</th>
      <th scope="col">Resim</th>
      <th scope="col">Tarih</th>
      
    </tr>
  </thead>
  <tbody>';

    if (is_array($data) || is_object($data)) {

        foreach ($data as $key){
    echo '
    
    <tr>
    <td>#</td>
    <td>'.$key['name'].' '. $key['surname'].'</td>
    <td>'.$key['item_name'].'</td>
    <td>'.$key['count'].'</td>
    <td>'.$key['mname'].'</td>
    <td>'.$key['tutar'].'</td>
    <td><img src= "' . IMG . $key['image_url'] . '"  height="150" width="150" style="border-radius: 10px"></td>
     <td>'.$key['gelis_zamani'].'</td>
    </tr>
    
    
    ';}



    }


  echo '</tbody>
</table>
    ';
    ?>


</div>

<?php include FOOTER; ?>
