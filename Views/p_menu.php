<?php include HEADER2; ?>

<div class="container my-5">

    <div class="row">

        <div class="col-md-2">

        </div>
        <div class="col-md-8">

            <div class="card" style="box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);">
                <div class="card-header font-weight-bold  text-center">MENULER</div>
                <div class="card-body">
                    <form>

                        <a class="btn btn-primary w-100" data-toggle="collapse" href="#corba" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            KAHVALTI
                        </a>
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-4"><img class="img-responsive rounded" width="70%" src="icecekler.jpg"></div>
                                <div class="col-md-4">
                                    <?php
                                    if(isset($menu)){

                                        foreach ($menu as $value){

                                            echo "de";
                                        }

                                    }
                                    else{
                                        echo "as";
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-danger w-100" data-toggle="collapse" href="#anayemekler" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            ANA YEMEKLER
                        </a>

                        <a class="btn btn-success w-100" data-toggle="collapse" href="#salatalar" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            SALATALAR
                        </a>


                        <!--start collapse -->
                        <a class="btn btn-warning w-100" data-toggle="collapse" href="#tatlılar" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            TATLILAR
                        </a>

                        <!-- end collapse -->
                        <a class="btn btn-info w-100" data-toggle="collapse" href="#içecekler" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            İÇECEKLER
                        </a>
                        <div class="collapse" id="içecekler">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-4"><img class="img-responsive rounded" width="70%"
                                                               src="icecekler.jpg"></div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">Coco-Cola
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">Coco-Cola Zero
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">Fanta
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">Sprite
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">Ayran
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="">Sade Soda
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="d-block">Tarih</label>
                                    <input type="date">
                                </div>
                                <div class="col-md-4">
                                    <label class="d-block">Saat</label>
                                    <input type="time">
                                </div>

                                <div class="col-md-4">
                                    <label class="d-block">Toplam Tutar</label>
                                    <input class="text-danger font-weight-bold w-50" type="text" value="120" readonly>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <button class="btn btn-dark text-light w-100 " type="submit">Rezervasyonu Tamamla
                                    </button>
                                </div>
                            </div>
                        </div>

                </div>
                </form>
            </div>
            <!--end main card -->
        </div>
        <!--end col-md-8 -->
    </div>
</div>

<?php include FOOTER; ?>
