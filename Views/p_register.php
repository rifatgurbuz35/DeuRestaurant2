<?php include HEADER2; ?>


<div class="container my-5">
    <div class="row">
        <div class="alert alert-danger" role="alert" id="timealert" style="margin-top: 5px; display: none">
            Geliş Tarihi Seçiniz...
        </div>

        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="card bg-light">
                <div class="alert alert-danger" role="alert" id="mevcut" style="margin: 30px; display: none">
                   Bu kullanıcı adı sistemimizde mevcuttur.
                </div>
                <div class="alert alert-danger" role="alert" id="hata" style="margin: 30px; display: none">
                   Kayıt oluşturulamadı.
                </div>
                <div class="alert alert-danger" role="alert" id="hata1" style="margin: 30px; display: none">
                   HATA !!!
                </div>


                <article class="card-body mx-auto">
                    <h4 class="card-title mt-3 text-center">Hesap Oluştur</h4>

                    <form>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input id="isim" name="" class="form-control" placeholder="İsim" type="text">
                        </div>
                        <div id="isimAlert" class="form-group input-group alert alert-danger" role="alert"
                             style="display: none">
                            İsim Giriniz...
                        </div>

                        <!-- form-group// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input id="soyIsim" class="form-control" placeholder="Soyisim" type="text">
                        </div>
                        <div id="soyIsimAlert" class="form-group input-group alert alert-danger" role="alert"
                             style="display: none">
                            Soyisim Giriniz...
                        </div>
                        <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input id="emailAdress" class="form-control" placeholder="Email adres" type="email">
                        </div>
                        <div id="emailAlert" class="form-group input-group alert alert-danger" role="alert"
                             style="display: none">
                            Email Giriniz...
                        </div>
                        <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <select class="custom-select" style="max-width: 80px">
                                <option selected="">+90</option>

                            </select>
                            <input id="telefon" class="form-control" placeholder="Telefon Numarası" type="number">
                        </div>
                        <div id="telefonAlert" class="form-group input-group alert alert-danger" role="alert"
                             style="display: none">
                            Telefon Numarası Giriniz...
                        </div>
                        <!-- form-group// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input id="kullaniciAdi" class="form-control" placeholder="Kullanıcı Adı oluştur" type="text">
                        </div>
                        <div id="kullaniciAdiAler" class="form-group input-group alert alert-danger" role="alert"
                             style="display: none">
                           Kullanıcı Adı Giriniz...
                        </div>
                        <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input id="pass1" class="form-control" placeholder="Şifre Oluştur" type="password">
                        </div>
                        <div id="pass1Alert" class="form-group input-group alert alert-danger" role="alert"
                             style="display: none">
                            Şifre Giriniz
                        </div>
                        <!-- form-group// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input id="pass2" class="form-control" placeholder="Tekrar Şifre Gir " type="password">
                        </div>
                        <div id="pass2Alert" class="form-group input-group alert alert-danger" role="alert"
                             style="display: none">
                            Şifre Giriniz
                        </div>
                        <div id="pass3Alert" class="form-group input-group alert alert-danger" role="alert"
                             style="display: none">
                           Şifreler Uyuşmuyor
                        </div>
                        <!-- form-group// -->
                        <div class="form-group">
                            <button type="button" onclick="register();" class="btn btn-primary btn-block"> Hesap
                                Oluştur
                            </button>
                        </div> <!-- form-group// -->
                        <p class="text-center">Zaten Hesaba Sahip misin? <a href="login">Giriş Yap</a></p>
                    </form>
                </article>
            </div> <!-- card.// -->


        </div>
    </div>


</div>
<script>
    function register() {
        var dataKullanici = []
        var isim = $('#isim').val();
        var soyIsim = $('#soyIsim').val();
        var email = $('#emailAdress').val();
        var telefon = $('#telefon').val();
        var kullanıcıAdı = $('#kullaniciAdi').val();
        var pass1 = $('#pass1').val();
        var pass2 = $('#pass2').val();
        var isimK=false;
        var soyisimK=false;
        var emailK=false;
        var telefonK=false;
        var kullaniciAdiK=false;
        var pass1K=false;
        var pass2K=false;
        var pass3K=true;


        if (isim === '') {
            $('#isimAlert').delay("fast").fadeIn();
            $('#isimAlert').delay(3000).fadeOut();
        }
        if (isim !== '') {
          isimK=true;
        }

        if (soyIsim === '') {
            $('#soyIsimAlert').delay("fast").fadeIn();
            $('#soyIsimAlert').delay(3000).fadeOut();
        }
        if (soyIsim !== '') {
        soyisimK=true;
        }
        if (email === '') {
            $('#emailAlert').delay("fast").fadeIn();
            $('#emailAlert').delay(3000).fadeOut();
        }
        if (email !== '') {
          emailK=true;
        }
        if (telefon === '') {
            $('#telefonAlert').delay("fast").fadeIn();
            $('#telefonAlert').delay(3000).fadeOut();
        }
        if (telefon !== '') {
          telefonK=true;
        }
        if (kullanıcıAdı === '') {
            $('#kullaniciAdiAler').delay("fast").fadeIn();
            $('#kullaniciAdiAler').delay(3000).fadeOut();
        }
        if (kullanıcıAdı !== '') {
          kullaniciAdiK=true;
        }
        if (pass1 === '') {
            $('#pass1Alert').delay("fast").fadeIn();
            $('#pass1Alert').delay(3000).fadeOut();
        }
        if (pass1 !== '') {
        pass1K=true;
        }
        if (pass2 === '') {
            $('#pass2Alert').delay("fast").fadeIn();
            $('#pass2Alert').delay(3000).fadeOut();
        }
        if (pass2 !== '') {
           pass2K=true;
        }
        if(pass1!=='' && pass2!=='' && pass1!==pass2){
            $('#pass3Alert').delay("fast").fadeIn();
            $('#pass3Alert').delay(3000).fadeOut();
            pass3K=false;
        }

        if(isimK && soyisimK && emailK && telefonK && kullaniciAdiK && pass1K && pass2K && pass3K){
            dataKullanici.push({isim:isim,soyIsim:soyIsim,email:email,telefon:telefon,sifre:pass1,kullanıcıAdı:kullanıcıAdı});
            $.ajax({
                type: "POST",
                url: '../../DeuRestraunt/User/yeniKullanici',
                data: {dataKullanici:dataKullanici},
                success: function (res) {
                   var response = parseInt(res);
                   if(response==1){
                       window.location.href='../../DeuRestraunt/page/login'
                   }else if(response==2){
                       $('#mevcut').delay("fast").fadeIn();
                       $('#mevcut').delay("2000").fadeOut();
                   }else if (response==3){
                       $('#hata').delay("fast").fadeIn();
                       $('#hata').delay("2000").fadeOut();
                   }
                   else{
                       $('#hata1').delay("fast").fadeIn();
                       $('#hata1').delay("2000").fadeOut();
                   }
                }
        });
        }


    }


</script>

<?php include FOOTER; ?>


