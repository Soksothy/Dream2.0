<?php

global $con;
include "connection.php";
    include "menu.php";

?>
<!-- slider -->

<div class="">
    <div class="ads w-100" style="background-image: url(lOGO/staduim.jpg); ">
        <div class="brand_club d-flex justify-content-center">
            <img  src="lOGO/Adidas_logo.png" height="200px" style="padding-top: 10px;" alt="">
        </div>
        <div class="card_shirt  ">
            <div class="row " style="padding-top: 50px;padding-bottom: 20px;">
                <div class="col-4">
                    <img  src="lOGO/ppCover_1.jpg" class="d-block w-100 shadow rounded" alt="">
                </div>
                <div class="col-4">
                    <img src="lOGO/ppCover_2.jpg" class="d-block w-100 shadow rounded" alt="">
                </div>
                <div class="col-4">
                    <img src="lOGO/ppcCover_3.jpg" class="d-block w-100 shadow rounded" alt="">
                </div>
            </div>
        </div>

    </div>

</div>

<div class="container">
    <h1 style="font-family: TeXGyreAdventor;">BOEUNG KET ANGKOR FC</h1>
    <div class="row">
    <?php
       $sql = "SELECT * FROM products
       INNER JOIN category ON products.category_id = category.id
       INNER JOIN  image  ON products.image_id  = image.id 
       WHERE products.brand='bk' "; 
       $result = $con->query($sql);
       if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row["product_name"];
                $price = $row["price"];
                $brand = $row["brand"];
                $category = $row["category_name"];
                $image = $row["product_image"];

                echo "<div class='col-4'>
                        <div class='card p-2'>
                            <img src='$image' alt='BK'>
                            <div class='description'>
                            <h4 class='name_prod'>$name</h4>
                            <h3 class='text-danger'>$ $price</h3>
                            <p>$brand</p>
                            <h5 class='text-black-50'>$category</h5>
                            </div>
                        </div>
                        </div>"; 
                
            }
       }

    ?>
    </div>
    
</div>

<!-- card -->
  <div class="splide">
  <div class="brand_club d-flex justify-content-center">
            <img  src="lOGO/Phnom_Penh_Crown_FC_Logo.png" height="200px" style="padding-top: 10px;" alt="">
        </div>
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide"><img src="LOGO/ppCover_1.jpg" alt="" width="100%";></li>
            <li class="splide__slide"><img src="LOGO/ppCover_2.jpg" alt="" width="100%";></li>
            <li class="splide__slide"><img src="LOGO/ppcCover_3.jpg" alt="" width="100%";></li>
            <li class="splide__slide"><img src="LOGO/ppCover_2.jpg" alt="" width="100%";></li>
        </ul>
    </div>
    <!-- Add the progress bar element -->
    <div class="my-slider-progress">
        <div class="my-slider-progress-bar"></div>
    </div>
</div>

<script>
    var splide = new Splide( '.splide', {
        autoplay: true,
        interval: 4000,
    }); 

    var bar = splide.root.querySelector('.my-carousel-progress-bar');

    // Updates the bar width whenever the carousel moves:
    splide.on('mounted move', function () {
        var end  = splide.Components.Controller.getEnd() + 1;
        var rate = Math.min((splide.index + 1) / end, 1);
        bar.style.width = String(100 * rate) + '%';
    });

    splide.mount();
</script>

</body>
</html>

