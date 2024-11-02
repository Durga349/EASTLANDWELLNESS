<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<section id="hero" class="d-flex align-items-center">
<div class="slider__warpper">
<?php  
$sliderQry = "SELECT * FROM slider ORDER BY id asc";
$sliderData = $crud->getData($sliderQry);
$i=1;
foreach ($sliderData as $key => $value) {
	$image = str_replace("../", "", $value['image']);
?>
  <div class="flex__container <?php if($i == 1){echo "flex--active";}else{echo "animate--start";} ?>" data-slide="<?php echo $i; ?>">
    <div class="flex__item flex__item--left">
      <?php echo $value['description']; ?>
    </div>
    <div class="flex__item flex__item--right">
    	<img class="pokemon__img" src="EadminWellLand/<?php echo $image; ?>"/>
    </div>
  </div>
<?php $i++; } ?>

<!--   <div class="flex__container animate--start" data-slide="2">
    <div class="flex__item flex__item--left">
      <div class="flex__content">
        <h1>Redefining the Path to <span> A Healthy Lifestyle</span></h1>
       	<p class="text--normal">We believe that fresh natural organic products<br>should be accessible to all.</p>
       	<form method="POST" action="">
       	<div class="input-group">
			<input type="text" class="form-control addonsSearch" placeholder="Search for Product in our store" aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchInput">
				<div class="input-group-append theme-bg">
				<button class="btn text-white" type="button" id="searchButton">Find Product</button>
				</div>
		</div>
		</form>
      </div>
    </div>
    <div class="flex__item flex__item--right"></div>
    <img class="pokemon__img" src="assets/img/Liquid_2.png"/>
  </div> -->
  
</div>

<div class="slider__navi">
	<?php 
	$i=1;
	foreach ($sliderData as $key => $value) { ?>
  <a href="#" class="slide-nav <?php if($i == 1){echo "active";} ?>" data-slide="<?php echo $i; ?>"><?php echo $value['id']; ?></a>
  <?php $i++; } ?>
<!--   <a href="#" class="slide-nav active" data-slide="1">pikachu</a>
  <a href="#" class="slide-nav" data-slide="2">piplup</a>
  <a href="#" class="slide-nav" data-slide="3">blaziken</a>
  <a href="#" class="slide-nav" data-slide="4">dialga</a> -->
<!--   <a href="#" class="slide-nav" data-slide="5">zekrom</a> -->
</div>
</section>
<style type="text/css">
	/**, *:before, *:after {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}
*/
.slider__navi {
	position: absolute;
	top: 50%;
	right: 20px;
	transform: translateY(-50%);
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	-ms-transform: translateY(-50%);
	-o-transform: translateY(-50%);
	z-index: 999;
}

.slider__navi a {
	display: block;
	height: 6px;
	width: 20px;
	margin: 20px 0;
	text-indent: -9999px;
	box-shadow: none;
	border: none;
	background: rgba(0,0,0,0.2);
}

.slider__navi a.active {
	background: rgba(255,255,255,1);
}

/*body {
	position: relative;
	font-size: 100%;
	font-family: 'Montserrat', sans-serif;
	font-weight: 400;
	min-height: 100vh;
}*/

.flex__container {
	position: absolute;
	top: 0;
	left: 0;
	display: flex;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	-webkit-flex-flow: row wrap;
	-moz-flex-flow: row wrap;
	-ms-flex-flow: row wrap;
	-o-flex-flow: row wrap;
	flex-flow: row wrap; 
	-webkit-justify-content: flex-start;
	-moz-justify-content: flex-start;
	-ms-justify-content: flex-start;
	-o-justify-content: flex-start;
	justify-content: flex-start;
	height: 100vh;
	width: 100%;
	z-index: 1;
}

.flex__container.flex--active {
	z-index: 2;
}

.text--sub {
	font-size: 12px;
	letter-spacing: 0.5rem;
	text-transform: uppercase;
	margin-bottom: 40px;
}

.text--big {
	font-family: 'Poppins', sans-serif;
	font-size: 7.5em;
	font-weight: 700;
	line-height: 110px;
  margin-left: -8px;
}

.text--normal {
	font-size: 15px;
	color:#000;
	line-height: 22px;
	margin-top: 25px;
}

.text__background {
	font-family: 'Poppins', sans-serif;
	position: absolute;
	left: 72px;
	bottom: -60px;
	color: rgba(0,0,0,0.05);
	font-size: 170px;
	font-weight: 700;
}

.flex__item {
	height: 100vh;
	color: #fff;
/*	margin-top: -350px;*/
	transition: transform 0.1s linear;
}

.flex__item--left {
	display: flex;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	align-items: center;
	-webkit-align-items: center;
	-moz-align-items: center;
	-ms-align-items: center;
	width: 75%;
	transform-origin: left bottom;
	transition: transform 0.1s linear 0.4s;
	opacity: 0;
	position: relative;
	overflow: hidden;
}

.flex__item--right {
	width: 25%;
	transform-origin: right center;
	transition: transform 0.1s linear 0s;
	opacity: 0;
}

.flex--preStart .flex__item--left,
.flex--preStart .flex__item--right,
.flex--active .flex__item--left,
.flex--active .flex__item--right {
	opacity: 1;
}

/* Piplup */

.flex--piplup .flex__item--left {
	/*background: #3e9fe6;*/
	/*background: linear-gradient(to right, #FFC085 10%, #FFB347 80%)*/
	background: linear-gradient(to right, #FFFFFF 10%, #E8F9D2 80%)
}

.flex--piplup .flex__item--right {
	/*background: #d3eaef;*/
	/*background:#FFD1B1;*/
	background: #FFE281;
}

/* Pikachu */

.flex--pikachu .flex__item--left {
	background: linear-gradient(to right, #FFFFFF 10%, #E8F9D2 80%)
}

.flex--pikachu .flex__item--right {
	background: #FFE281;
}

/* Blaziken */

.flex--blaziken .flex__item--left {
	/*background: #f64f37;*/
	background: linear-gradient(to right, #FFFFFF 10%, #E8F9D2 80%)
/*	    background: linear-gradient(to right, #fcb2a3 10%, #f64f37 80%);*/
}

.flex--blaziken .flex__item--right {
	/*background: #ffebcd;*/
	background: #FFE281;

}

/* Dialga */

.flex--dialga .flex__item--left {
	/*background: #476089;*/
	/*background: linear-gradient(to right, #50688fa1 10%, #476089 80%)*/
	background: linear-gradient(to right, #FFFFFF 10%, #E8F9D2 80%)
}

.flex--dialga .flex__item--right {
	background: #FFE281;
}

/* Zekrom */

.flex--zekrom .flex__item--left {
	/*background: linear-gradient(to right, #898383 10%, #424242 80%);*/
	background: linear-gradient(to right, #FFFFFF 10%, #E8F9D2 80%)
}

.flex--zekrom .flex__item--right {
	background: #a7bcbb;
}

.flex__content {
	margin-left: 80px;
	width: 55%;
	opacity: 1;
	transform: translate3d(0,0,0);
	transition: transform 0.2s linear 0.2s, opacity 0.1s linear 0.2s;
	padding-top:5%;
}

.pokemon__img {
	position: absolute;
	bottom: 0px;
	right: 15%;
	max-height: 40vw;
	opacity: 1;
	transform: translate3d(0,0,0);
	transition: opacity 0.43s 0.6s, transform 0.4s 0.65s cubic-bezier(0, 0.88, 0.4, 0.93);
}

/* Animate-START point */

.flex__container.animate--start .flex__content {
	transform: translate3d(0,-200%,0);
	opacity: 0;
}

.flex__container.animate--start .pokemon__img {
	transform: translate3d(-200px,0,0);
	opacity: 0;
}

/* Animate-END point */

.flex__container.animate--end .flex__item--left {
	transform: scaleY(0);
}

.flex__container.animate--end .flex__item--right {
	transform: scaleX(0);
}

.flex__container.animate--end .flex__content {
	transform: translate3d(0,200%,0);
	opacity: 0;
}

.flex__container.animate--end .pokemon__img {
	transform: translate3d(200px,0,0);
	opacity: 0;
}
</style>
<script type="text/javascript">
	// Function to trigger the next slide
	var slidesShown = 0;
/*function nextSlide() {
  var currentSlide = $('.flex--active').data('slide'),
      totalSlides = $('.slider__warpper .flex__container').length,
      nextSlide = currentSlide + 1;

  if(nextSlide > totalSlides) {
    nextSlide = 1; // loop back to the first slide
  }
   slidesShown++;
  $('.slide-nav[data-slide=' + nextSlide + ']').trigger('click');
}*/
function nextSlide() {
    var currentSlide = $('.flex--active').data('slide'),
        totalSlides = $('.slider__warpper .flex__container').length,
        nextSlide = currentSlide + 1;

    if (nextSlide > totalSlides) {
        nextSlide = 1; // loop back to the first slide
    }
        // slidesShown++;
    $('.slide-nav[data-slide=' + nextSlide + ']').trigger('click');
}

// Navigation click event
$('.slide-nav').on('click', function(e) {
  e.preventDefault();
  var current = $('.flex--active').data('slide'),
      next = $(this).data('slide');

  $('.slide-nav').removeClass('active');
  $(this).addClass('active');

  if (current === next) {
    return false;
  } else {
    $('.slider__warpper').find('.flex__container[data-slide=' + next + ']').addClass('flex--preStart');
    $('.flex--active').addClass('animate--end');
    setTimeout(function() {
      $('.flex--preStart').removeClass('animate--start flex--preStart').addClass('flex--active');
      $('.animate--end').addClass('animate--start').removeClass('animate--end flex--active');
    }, 800);
  }

  clearInterval(slideTimer); // clear the current timer
  slideTimer = setInterval(nextSlide, 5000); // reset the timer
});

// Automatic sliding
var slideTimer = setInterval(nextSlide, 5000);

</script>

