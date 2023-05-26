<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
	<div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
		<h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Menu</h1>
		<!-- <div class="d-inline-flex mb-lg-5">
			<p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
			<p class="m-0 text-white px-2">/</p>
			<p class="m-0 text-white">Menu</p>
		</div> -->
	</div>
</div>
<!-- Page Header End -->
<!-- Menu Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
            <h1 class="display-4">Competitive Pricing</h1>
        </div>

        <?
		$x = 1;
		foreach ($dish as $k => $v){
		    if ($x == 1){?><div class='row'><? } ?>
            <div class='col-lg-6'>
                <h1 class="mb-5"><?=  Category::getCategoryByID($DB,$k,'name') ?></h1>
				<? foreach ($v as $k1 => $v2) {
					?>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-<?=rand(1,3)?>.jpg" alt="">
                            <h5 class="menu-price"><?= $v2['price'] ?>&euro;</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4><?= $v2['name'] ?></h4>
                            <p class="m-0"><?=DishAndProduct::getProductsForDish($DB,$v2['id'])?></p>
                        </div>
                    </div>
				<? } ?>
            </div>
			<? if ($x == 2) {
				echo "</div >";
				$x = 0;
			}
			$x++;
			} ?>

    </div>
</div>

<!-- Menu End -->


<!--    --><?// foreach ($v as $k1=>$v2){?>
<!--                <div class="row align-items-center mb-5">-->
<!--                    <div class="col-4 col-sm-3">-->
<!--                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-3.jpg" alt="">-->
<!--                        <h5 class="menu-price">--><?//=$v2['price']?><!--</h5>-->
<!--                    </div>-->
<!--                    <div class="col-8 col-sm-9">-->
<!--                        <h4>--><?//=$v2['name']?><!--</h4>-->
<!--                        <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo guberg sea et et lorem dolor</p>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--            --><?//}?>