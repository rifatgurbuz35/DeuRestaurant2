<?php include HEADER2; ?>

        <?php
        if (is_array($data) || is_object($data)) {

            echo '<div class="container">
<div class="alert alert-danger" role="alert" id="timealert" style="margin-top: 5px; display: none">
 Geliş Tarihi Seçiniz...
</div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Siparis</th>
                        <th>Adet</th>
                        <th class="text-center">Fiyat</th>
                        <th class="text-center">Toplam</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>';
            foreach ($data as $key){
            echo '
      
           <tr id="cart'.$key['menu_id'].'" name="deneme" >
                        <td class="col-sm-6 col-md-4">
                        <div class="media">
                            <img class="media-object" src= "' . IMG . $key['image_url'] . '" style="width: 200px; height: 200px; border-radius: 10px"> 
                            
                            <div class="media-body" style="margin-left: 5px">
                                <h4 class="media-heading"><b> ' . $key['urun_adi'] . '</b></h4>
                                <h5 class="media-heading"><i>' . $key['content'] . '</i></h5>
                                <span>Durum: </span><span class="text-success"><strong>Mevcut</strong></span>
                                <h6>Kategori: <span class="text-success"><strong >'.$key['kategori'].'</strong></span></h6>
                            </div>
                        </div></td>
                        <td class="col-sm-3 col-md-3" style="text-align: center">
                        <input type="email" disabled class="form-control" id="exampleInputEmail1" value="' . $key['count'] . '">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>' . $key['tutar'] . '₺</strong></td>
                        <td id="ttutar'.$key['menu_id'].'" class="col-sm-1 col-md-1 text-center"><strong>' . $key['toplam_tutar'] . '₺</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger" onclick="sil('.$key['menu_id'].',' . $key['toplam_tutar'] . ','.$_SESSION['toplam'].')" id="sil'.$key['menu_id'].'">
                            <span class="glyphicon glyphicon-remove"></span> Sil
                        </button></td>
                    </tr>
           
                    
          ';}
            echo'
                  
                   
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Toplam</h3></td>
                        <td class="text-right"><h3><strong id="toplam">'.$_SESSION['toplam'].'</strong><span>₺</span></h3></td>
                    </tr>
                    <tr>
                     
                        <td><div class="alert alert-info" role="alert">Geliş Tarihi Seçiniz</td>
                        <td><input class="form-control" type="datetime-local" id="gelis" name="gelis"></td>
                  
                        <td>
                        <button type="button" onclick="devamEt()"  class="btn btn-info" >
                            <span id="devamEt" class="glyphicon glyphicon-shopping-cart"></span> Siparişe Devam Et 
                        </button></td>
                        <td>
                        <button type="button" onclick="siparisTamamla();" class="btn btn-success">
                            Tamamla! <span class="glyphicon glyphicon-play"></span>
                        </button></td> 
                        
                    </tr>
                  
            </tbody>
            </table>
        </div>
    </div>
</div>


';} ?>
<script>
    var yeniTutar=0;
    var kontrol =false;
    var updated =[];

    function sil(id,tutar,session) {
        kontrol=true;
        $("#cart"+id).css("display","none");
        var toplamSt = $("#toplam").text()
        var toplam = parseInt(toplamSt);
        var tutarSt= parseInt(tutar);
        var tutarr= parseInt(tutarSt);
        yeniTutar = toplam-tutarr;
        $("#toplam").text(yeniTutar);


        alert(yeniTutar);


    }
    function devamEt() {
        debugger
        window.location.href='../../DeuRestraunt/page/menu'
    }

    function siparisTamamla() {
        if($('#gelis').val()){
            var tarih =$('#gelis').val();
            var d = new Date(tarih);
            var tt =  d.toLocaleString() ;
            debugger;

            if(kontrol==true){

            }else {
                var toplamSt = $("#toplam").text()
                var toplam = parseInt(toplamSt);
                yeniTutar=toplam;

            }

            $.each($('tr[name=deneme]'), function () {
                if($(this).is(':visible')) {
                    var ids = $(this).attr("id");
                    var idSt = ids.substring(4,5);
                    var id=parseInt(idSt);
                    updated.push({menu_id:id})

                }
            });

            if(updated.length>=0){
                $.ajax({
                    type: "POST",
                    url: '../../DeuRestraunt/Siparis/siparisUpdate',
                    data:{updated:updated,tutar:yeniTutar,tarih:tt},
                    success: function(res){

                        window.location.href="../../DeuRestraunt/page/menu"
                    }
                });

            }
        }else {

            $('#timealert').delay("fast").fadeIn();
            $('#timealert').delay("2000").fadeOut();
        }


    }


</script>

<?php include FOOTER; ?>
