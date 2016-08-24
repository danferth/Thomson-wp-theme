//=====plate search=====
plates.directive('plateSearch', function(){
  return{
    restrict: 'E',
    replace: 'true',
    templateUrl: url+'/wp-content/themes/TIC/assets/templates/plate-search.html',
    link: function(scope, elem, attrs){
      // elem.bind('click', function(){
      //   elem.addClass('hidden');
      //   elem.children('.overlay-content').removeClass('fadeInUp');
      // });
      elem.find('.close-overlay').bind('click', function(){
        elem.children('.overlay-content').removeClass('fadeInUp');
        elem.addClass('hidden');
      });
    }
  };
});
  
//=====test directive=====

//=====Product Inquery=====
test.directive('productInquery', function(){
  return{
    restrict: 'E',
    replace: 'true',
    templateUrl: url+'/wp-content/themes/TIC/assets/templates/product-inquery.php',
    link: function(scope, elem, attrs){
      // elem.bind('click', function(){
      //   elem.addClass('hidden');
      //   elem.children('.overlay-content').removeClass('fadeInUp');
      // });
      elem.find('.close-overlay').bind('click', function(){
        elem.children('.overlay-content').removeClass('fadeInUp');
        elem.addClass('hidden');
      });
    }
  };
});
  
//=====test directive=====
