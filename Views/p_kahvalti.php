<?php include HEADER2; ?>

<?php

if (is_array($data) || is_object($data)) {
    echo ' 
 <div class="container my-5">
 <div class="row d-flex justify-content-between m-2"> ';
    foreach ($data as $key) {
        echo '
    <div class="card" style="width: 16rem; margin-top: 15px" >
    <img class="card-img-top" src= "' . IMG . $key['image_url'] . '" alt="Card image cap" height="200" width="200" >
    <div class="card-body">
        <h5 class="card-title" > ' . $key['item_name'] . '</h5>
        <p class="card-text">' . $key['content'] . '</p>
            <div id="fiyat' . $key['id'] . '" class="card-text  row  d-flex justify-content-between m-0"  >
                     Fiyat: ' . $key['item_price'] . '₺ 
            </div>
          
      
     <div class="row d-flex justify-content-between m-0" style="padding-top: 5px" >  
      <div class="form-group">
   <input id="count' . $key['id'] . '" type="number" class="form-control" min="0" value="0">
     </div>
     <div >
     <a href="#" class="btn btn-primary" onclick="sepeteEkle(' . $key['id'] . ','.$key['item_price'].');"><i class="fa fa-shopping-basket" style="padding-right: 10px"></i>Sepete Ekle</a>
     </div>
       <div id="alert'.$key['id'].'" class="alert alert-danger" role="alert" style="display: none;margin-top:5px">
            Lütfen Sipariş adedini giriniz.
            </div>
     </div>
      
        
    </div>
</div>
    ';
    }
    echo ' </div>
             <div class="row d-flex justify-content-between m-2">
              <a href="#" onclick="rezarvazyon_tamamla();" class="btn btn-warning m-2 btn-lg btn-block"><i class="fa  fa-check" ></i>Rezarvasyonu Tamamla</a>
            </div>
            
            </div>';
}

?>

<script>
    var rezarvazyon = []
    // kahvaltı ekranı için kategori id 1 gönderildi
    function sepeteEkle(id,item_price) {
        var adetst = $("#count" + id).val();
        var adet = parseInt(adetst);

        if (adet > 0) {
            var found = false;
            for (var i = 0; i < rezarvazyon.length && !found; i++) {
                if (rezarvazyon[i].urun_id === id) {
                    found = true;
                    var yeni_count = rezarvazyon[i].adet + adet;
                    rezarvazyon.splice(i, 1)
                    rezarvazyon.push({urun_id: id, adet: yeni_count, fiyat:item_price,kahvalti:1})
                    break;
                }
            }
            if (!found) {
                rezarvazyon.push({urun_id: id, adet: adet,fiyat:item_price,kahvalti:1})
            }
        }
        else{
       showAlert(id);
        }


    }
    function showAlert(id) {
        $('#alert'+id).delay("fast").fadeIn();
        $('#alert'+id).delay("2000").fadeOut();

    }
    function rezarvazyon_tamamla() {
        if (rezarvazyon.length === 0) {
        alert("sepet boş ")
        } else {

            $.ajax({
                type: "POST",
                url: '../../DeuRestraunt/Siparis/siparisOlustur',
                data:{rezarvazyon:rezarvazyon},
                success: function(res){
                    debugger
                    var response = JSON.parse(res);
                    debugger




                    if(response.status==true){
                       window.location.href="../../DeuRestraunt/page/rezarvasyon"
                    }
                    else{
                        window.location.href="../../DeuRestraunt/page/kahvalti";
                    }

                }
            });
        }
    }


</script>


<?php include FOOTER; ?>

