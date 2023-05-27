						 <?php
		                    
			                    if(isset($_GET['filter']))
			                    {
			                        $sizeheck = [];
			                        $sizecheck = $_GET['filter'];
			                        foreach($sizecheck as $size){
			                           $resultfilter = products::getByListCateID($size);
			                            if($resultfiler){
			                                while($value = $resultfilter->fetch_array()){

			                                	$cateName = categories::getNameById($value[2]);
			                                	$price = number_format($value[4], 0);
			                                    echo echo "<div onclick='' class='product-grid fade'>
															<div class='product-grid-head'>
																<div class='block'>
																	<div class='starbox small ghosting'> </div> <span> $value[5]</span>
																</div>
															</div>
															<div class='product-pic'>
																<a href='#'><img src='images/product5.jpg' title='$value[1]' /></a>
																<p>
																<a href='#'><small>$value[1]</small></a>
																<span>$cateName</span>
																</p>
															</div>
															<div class='product-info'>
																<div class='product-info-cust'>
																	<a href='index.php?act=detail&id=$value[0]'>Details</a>
																</div>
																<div class='product-info-price'>
																	<a href='index.php?act=detail&id=$value[0]'>$price VNĐ</a>
																</div>
																<div class='clear'> </div>
															</div>
															<div class='more-product-info'>
																<span> </span>
															</div>
													</div>";
			                                }
			                            }
			                        }
			                    }
		                    ?>
