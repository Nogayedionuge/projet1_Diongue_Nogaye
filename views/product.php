<?php

require __DIR__ . '/header.php'; 
require __DIR__ . '/config/connect-db.php';

$products;
$statement = $pdo->prepare("SELECT * FROM product");
$statement->execute();
if($statement->rowCount() > 0) {
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>
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
                        Add To Cart
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
    </div>
  </section>

  <!-- end product section -->

 <?php require __DIR__ . '/footer.php'; ?>