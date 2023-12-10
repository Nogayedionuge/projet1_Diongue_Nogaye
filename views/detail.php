<?php 

require __DIR__ . '/header.php'; 
require __DIR__ . '/config/connect-db.php';

$product;
$statement = $pdo->prepare("SELECT * FROM product WHERE id=?");
$statement->execute(array($_GET["detail"]));
if($statement->rowCount() > 0) {
    $product = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>
  <!-- Detail section -->
  <?php
  if(isset($product)){  
  ?>
  <section class="about_section layout_padding">
    <div class="container-fluid">
      <div class="row rowflex">
        <div class="col-md-4 px-0">
          <div class="img-box">
            <img src="views/images/<?php echo $product[0]["img_url"] ?>" alt="">
          </div>
        </div>
        <div class="col-md-4 ml-auto">
          <div class="detail-box pr-md-3">
            <div class="heading_container">
              <h2>
                <?php echo $product[0]["name"] ?>
              </h2>
            </div>
            <p>
                <?php echo $product[0]["description"] ?>
            </p>
            <div class="info_section">
                <div class="single-product-details info_form">
                    <form action="/cart?id=<?= htmlspecialchars($product[0]['id']) ?>" method="post">
                        <p class="product-price">Price:  $<?= number_format($product[0]['price'], 2) ?></p>
                        <div class="product-quantity">
                            <span>Quantity:</span>
                            <div class="product-quantity-slider">
                                <input id="product-quantity" class="form-control" type="number" min=1 value="1" name="quantity">
                            </div>
                        </div>
						<input type="text" name="id"  value="<?= htmlspecialchars($product[0]['id']) ?>" hidden>
						<button name="cart" type="submit">Add to Cart</button>
                    </form>    
                </div>
            </div>   
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php  
  }else{?>  
    <h3>Produit inexistant</h3>
  <?php  
  }
  ?>  
  

  <!-- end detail section -->

  <?php require __DIR__ . '/footer.php'; ?>