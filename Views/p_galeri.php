<?php include HEADER2; ?>

<div class="container my-5">
    <div class="row " >
        <div class="col-md-12 text-center  ">
            <h1 class="font-weight-bold " style="color: orangered" >DeuFoodGram</h1>
        </div>
    </div>
    <div class="row">
        <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
            <img src="https://unsplash.it/600.jpg?image=251" class="img-fluid rounded">
        </a>
        <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
            <img src="https://unsplash.it/600.jpg?image=252" class="img-fluid rounded">
        </a>
        <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
            <img src="https://unsplash.it/600.jpg?image=253" class="img-fluid rounded">
        </a>
    </div>
    <div class="row">
        <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
            <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid rounded">
        </a>
        <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
            <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid rounded">
        </a>
        <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
            <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid rounded">
        </a>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<script>

    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>

<?php include FOOTER; ?>
