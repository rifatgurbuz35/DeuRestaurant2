<?php include HEADER2; ?>

<div class="container my-5" style="min-height: 50vh">

    <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="card bg-light mt-5">
                <div class="alert alert-danger" role="alert" id="timealert" style="margin: 10px; display: none">
                   Kullanıcı Adı Şifre Hatalı
                </div>
                <article class="card-body mx-auto ">
                    <h4 class="card-title mt-3 text-center">Rezervasyon İçin Giriş Yapınız</h4>
                    <form action="../../DeuRestraunt/page/directLogin">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input id="kullaniciAdi" class="form-control" placeholder="Kullanıcı Adı Giriniz" type="text">
                        </div>
                        <div id="kullaniciAdiAlert" class="form-group input-group alert alert-danger" role="alert"
                             style="display: none">
                            Kullanıcı Adı Giriniz...
                        </div>
                        <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input id="pass" class="form-control" placeholder="Şifre Giriniz" type="password">
                        </div>
                        <div id="passAlert" class="form-group input-group alert alert-danger" role="alert"
                             style="display: none">
                            Kullanıcı Adı Giriniz...
                        </div>
                        <!-- form-group// -->
                        <div class="form-group">
                            <button type="button"  onclick="login()"  class="btn btn-primary btn-block"> Giriş Yap</button>
                        </div> <!-- form-group// -->
                        <p class="text-center">Hesabınız yok mu? <a href="../../DeuRestraunt/page/register">Kayıt Ol</a></p>
                    </form>
                </article>
            </div> <!-- card.// -->


        </div>
    </div>
</div>
<script>
   function login() {
       debugger
       var dataLogin = []
       var kullaniciAdi = $('#kullaniciAdi').val();
       var pass = $('#pass').val();
       var kullaniciAdiK=false;
       var pass1K=false;
       if (kullaniciAdi === '') {
           $('#kullaniciAdiAlert').delay("fast").fadeIn();
           $('#kullaniciAdiAlert').delay(3000).fadeOut();
       }
       if (kullaniciAdi !== '') {
           kullaniciAdiK=true;
       }

       if (pass === '') {
           $('#passAlert').delay("fast").fadeIn();
           $('#passAlert').delay(3000).fadeOut();
       }
       if (pass !== '') {
           pass1K=true;
       }
       if(kullaniciAdiK && pass1K){
        debugger
           dataLogin.push({kullaniciAdi:kullaniciAdi,pass:pass});
           $.ajax({
               type: "POST",
               url: '../../DeuRestraunt/User/loginKontrol',
               data: {dataLogin:dataLogin},
               success: function (res) {
                   debugger
                   if(res==true){
                       debugger
                       window.location.href="../../DeuRestraunt/page/menu";
                   }else{

                       $('#timealert').delay("fast").fadeIn();
                       $('#timealert').delay("2000").fadeOut();

                   }



               }
           });

       }

   }
</script>

<?php include FOOTER; ?>


