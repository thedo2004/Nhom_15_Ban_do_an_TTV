
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/home.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="assets/css/spct.css" rel="stylesheet" />
</head>
<body>
  <div class="container">
  <?php
      extract($onesp);
    ?>
        <?php
            $img= $img_path.$img;
          echo ' <div class="row">
          <div class="col-12">
            <div class="product-single-item">
              <div class="row">
                <div class="col-xl-6">
                  <!--== Start Product Thumbnail Area ==-->
                  <div class="product-single-thumb">
                    
                    <div class="swiper-container single-product-thumb single-product-thumb-slider">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <a class="lightbox-image" data-fancybox="gallery" href="assets/img/shop/product-single/1.webp">
                            <img src="'.$img.'" width="570" height="541" alt="Image-HasTech">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--== End Product Thumbnail Area ==-->
                </div>
                <div class="col-xl-6">
                  <!--== Start Product Info Area ==-->
                  <div class="product-single-info">
                    <h3 class="main-title">'.$names.'</h3>
                    <div class="prices">
                      <span class="price">'.$price.' Vnđ</span>
                    </div>
                    <div class="prices">Số lượng:
                    <span class="description">'.$soluong.'</span>
                  </div>
                    <p>'.$mota.'</p>
                    <div class="product-quick-action">
                      <a class="btn-theme" href="index.php?act=themgiohang&&id='.$id.'">Thêm vào giỏ hàng</a>
                    </div>
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="product-review-tabs-content">
                  <ul class="nav product-tab-nav" id="ReviewTab" role="tablist">
                    <li role="presentation">
                      <a class="active" id="description-tab" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">Chi tiết</a>
                    </li>
                    <li role="presentation">
                      <a id="reviews-tab" data-bs-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Bình luận</a>
                    </li>
                  </ul>
                  <div class="tab-content product-tab-content" id="ReviewTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                      <div class="product-description">
                        <p>'.$mota.'</p>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                      <div class="product-review-content">
                        <div class="review-content-header">
                          <h3>Đánh giá sản phẩm</h3>
                          <div class="review-info">
                            <ul class="review-rating">
                              <li class="fa fa-star"></li>
                              <li class="fa fa-star"></li>
                              <li class="fa fa-star"></li>
                              <li class="fa fa-star"></li>
                              <li class="fa fa-star-o"></li>
                            </ul>
                            <span class="review-caption">2 Lượt đánh giá</span>
                          </div>
                        </div>
        
        
                        <div class="reviews-content-body">
                          <!--== Start Reviews Content Item ==-->
                          <div class="review-item">
                            <ul class="review-rating">
                              <li class="fa fa-star"></li>
                              <li class="fa fa-star"></li>
                              <li class="fa fa-star"></li>
                              <li class="fa fa-star"></li>
                              <li class="fa fa-star"></li>
                            </ul>
                            <h3 class="title">Awesome shipping service!</h3>
                            <h5 class="sub-title"><span>Nantu Nayal</span> ngày <span>20-09-2022</span></h5>
                            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                          </div>
                          <!--== End Reviews Content Item ==-->
        
                          <!--== Start Reviews Content Item ==-->
                          <div class="review-item">
                            <ul class="review-rating">
                              <li class="fa fa-star"></li>
                              <li class="fa fa-star-o"></li>
                              <li class="fa fa-star-o"></li>
                              <li class="fa fa-star-o"></li>
                              <li class="fa fa-star-o"></li>
                            </ul>
                            <h3 class="title">Low Quality</h3>
                            <h5 class="sub-title"><span>Oliv hala</span> ngày <span>30-06-2022</span></h5>
                            <p>My Favorite White Sneakers From Splurge To Save the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                          </div>
                          <!--== End Reviews Content Item ==-->
          
                          <!--== Start Reviews Form Item ==-->
                        <div class="reviews">
                          <h4 class="title">Viết bình luận</h4>
                          <div class="reviews-form-content">
                            <form action="#">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <span class="title">Chất lượng</span>
                                    <ul class="review-rating">
                                      <li class="fa fa-star-o"></li>
                                      <li class="fa fa-star-o"></li>
                                      <li class="fa fa-star-o"></li>
                                      <li class="fa fa-star-o"></li>
                                      <li class="fa fa-star-o"></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="for_review-title">Tiêu đề</label>
                                    <input id="for_review-title" class="form-control" type="text" placeholder="Tiêu đề bình luận">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="for_comment">Chi tiết</label>
                                    <textarea id="for_comment" class="form-control" placeholder="Để lại nhận xét chi tiết về sản phẩm"></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-submit-btn">
                                    <button type="submit" class="btn-submit">Gửi bình luận</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <!--== End Reviews Form Item ==-->
        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>';
        ?>
   
<script src="assets/js/jquery-main.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>