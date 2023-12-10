<?php 

require __DIR__ . '/header.php'; 
require __DIR__ . '/config/connect-db.php';

$products;
$statement = $pdo->prepare("SELECT * FROM product ORDER BY rand() LIMIT 6");
$statement->execute();
if($statement->rowCount() > 0) {
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Welcome to our shop
                    </h1>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quam velit saepe dolorem deserunt quo quidem ad optio.
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="views/images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- product section -->

  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Products
        </h2>
      </div>
      <div class="row">
      <?php 
      if(isset($products)){
        foreach($products as $product){
         
          ?>
            
            
              <div class="col-sm-6 col-lg-4">
                <div class="box">
                  <div class="img-box">
                    <img src="views/images/<?= $product['img_url'] ?>" alt="">
                    <a href="" class="add_cart_btn">
                      <span>
                        View Product
                      </span>
                    </a>
                  </div>
                  <div class="detail-box">
                    <h5>
                    <?= htmlspecialchars($product['name']) ?>
                    </h5>
                    <div class="product_info">
                      <h5>
                        <span>$</span> <?= number_format($product['price'], 2) ?>
                      </h5>
                      <div class="star_container">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
        <?php 
        }
        ?>
        </div>
        <div class="btn_box">
            <a href="<?php echo $base_path ?>/?product" class="view_more-link">
              View More
            </a>
        </div>
      <?php
      }else{?>
        <p>Aucun Produit disponible</p>
      <?php 
      }
      ?>
        
    </div>
  </section>

  <!-- end product section -->

  <!-- why us section -->

  <section class="why_us_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/w1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Fast Delivery
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/w2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Free Shiping
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/w3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Best Quality
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why us section -->
  <?php require __DIR__ . '/footer.php'; ?>