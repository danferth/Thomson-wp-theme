<?php
/*
Template Name: testAlso
*/

//for forms
if(isset($_GET['success'])){
	$form_success = $_GET['success'];
}

if(isset($_GET['first_name'])){
	$first_name = $_GET['first_name'];
}

if(isset($_GET['form_type'])){
	$form_type = $_GET['form_type'];
}

if(isset($_GET['product'])){
	$product_type = $_GET['product'];
}

//for prefooter
if(get_post_meta($post->ID, "has-prefooter")){
	$prefooter_class = "has-prefooter";
}else{
	$prefooter_class = "";
}

//for angular
$ng_app = "";
if(get_post_meta($post->ID, "ng-app")){
	$ngApp = get_post_meta($post->ID, "ng-app", true);
	$ng_app = "ng-app='" . $ngApp . "'";
}

$ng_controller = "";
if(get_post_meta($post->ID, "ng-controller")){
	$ngController = get_post_meta($post->ID, "ng-controller", true);
	$ng_controller = "ng-controller='" . $ngController . "'";
}

//for raodmap
$science = $_GET['sci'];

get_header(); ?>

<?php get_template_part( 'parts/featured-image' ); ?>

<div class="row full-page-top <?php echo $prefooter_class; ?>">
	<?php /* Start loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
	<div class="small-12 large-12 columns" role="main" <?php echo $ng_app . " " . $ng_controller; ?>>

			<div class="entry-content">
				<?php //the_content(); this is normally uncomented and WP adds the content of the page from the db  this page is more for testing so put everything in here that you would mornally and have it just work ?>
			
<!-- =======================START======================= -->

      <div class="row">
      <div class="small-6 column">
         <input type="text" ng-model="search" placeholder="search tech library data" />
      </div>
   </div>

   <div class="row">
      <div class="column small-12">

         <table>
            <thead>
               <tr>
                  <th><a href="" ng-click="sortType='id'; sortReverse=!sortReverse;">id <i class="fa" ng-class="sortReverse ? 'fa-caret-up' : 'fa-caret-down'"></i></th>
                  <th><a href="" ng-click="sortType='type'; sortReverse=!sortReverse;">type <i class="fa" ng-class="sortReverse ? 'fa-caret-up' : 'fa-caret-down'"></i></th>
                  <th><a href="" ng-click="sortType='productLine'; sortReverse=!sortReverse;">prod <i class="fa" ng-class="sortReverse ? 'fa-caret-up' : 'fa-caret-down'"></i></th>
                  <th><a href="" ng-click="sortType='subProductLine'; sortReverse=!sortReverse;">subProd <i class="fa" ng-class="sortReverse ? 'fa-caret-up' : 'fa-caret-down'"></i></th>
                  <th><a href="" ng-click="sortType='title'; sortReverse=!sortReverse;">title <i class="fa" ng-class="sortReverse ? 'fa-caret-up' : 'fa-caret-down'"></i></th>
                  <th>science</th>
                  <th>industry</th>
                  <!--<th>description</th>-->
                  <!--<th>citation</th>-->
                  <!--<th>link</th>-->
                  <!--<th>link type</th>-->
                  <th>tags</th>
               </tr>
            </thead>
            <tbody>
              <tr ng-repeat="d in techdata | orderBy:sortType:sortReverse | filter:search">
              	<td ng-bind-html="d.id"></td>
              	<td ng-bind-html="d.type"></td>
              	<td ng-bind-html="d.productLine"></td>
              	<td ng-bind-html="d.subProductLine"></td>
              	<td ng-bind-html="d.title"></td>
              	<td ng-bind-html="d.science"></td>
              	<td ng-bind-html="d.industry"></td>
              	<!--<td ng-bind-html="d.description"></td>-->
              	<!--<td ng-bind-html="d.citation"></td>-->
              	<!--<td ng-bind-html="d.link"></td>-->
              	<!--<td ng-bind-html="d.linkType"></td>-->
              	<td ng-bind-html="d.tags"></td>
              </tr> 
            </tbody>
         </table>

      </div>
   </div>
<!-- ========================END======================== -->
</div><!-- END DIV FOR CONTENT -->
			
			
			<?php comments_template(); ?>
	<?php endwhile; // End the loop ?>

	</div>
		</article>
</div>

<script type="text/javascript">
<?php
if($form_success == "true"){
	echo "
		window.onload = swal({
			title: 'Success',
			text: '" . $first_name . " your ". $form_type ." submission was a success we will contact you shortly about your inquiry into ". $product_type ."!',
			type: 'success',
			html: true,
			confirmButtonText: 'Thanks'
		});
	";
}elseif($form_success == "false"){
	echo "
		window.onload = swal({
			title: 'Whoops',
			text: 'Our apologies but there was an error <b>" . $first_name . "</b>, we have logged this and will have a fix soon!',
			type: 'error',
			html: true,
			confirmButtonText: 'OK'
		});
	";
}

?>

function hasHTML5validation(){
	return (typeof document.createElement('input').checkValidity == 'function');
}
if( !hasHTML5validation() ){
	<?php 
	echo 'onload=function(){document.forms["product-inquery-sample"].reset()};
	onload=function(){document.forms["product-inquery-quote"].reset()};
	onload=function(){document.forms["product-inquery-contact"].reset()};
	jQuery(document).ready(function($){
		$("#product-inquery-sample").validate();
		$("#product-inquery-quote").validate();
		$("#product-inquery-contact").validate();
	});'; ?>
}
</script>

<?php get_footer(); ?>