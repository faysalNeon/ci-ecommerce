jQuery(document).ready(function($){
	$('.table-data').each(function(){
		$(this).DataTable({"columnDefs": [{ "targets": 'clean', "orderable": false,}] });
	});
});

// sidebar
function sidebarFactory(active=localStorage.getItem('menu')){
  var thisClass='change';
  var thsiBar=$('aside.app-sidebar');
  var thisBody=$('main.app-body');
  var thisFooter=$('footer.app-footer');
  if(active==true){
    thsiBar.addClass(thisClass);
    thisBody.addClass(thisClass);
    thisFooter.addClass(thisClass);
  }else{
    thsiBar.removeClass(thisClass);
    thisBody.removeClass(thisClass);
    thisFooter.removeClass(thisClass);
  }
}
$(function(){
  if (typeof(Storage) !== "undefined"){
    sidebarFactory(localStorage.getItem('menu'));
    console.log(localStorage.getItem('menu'));
  }
})
function toggleSidebar(){
  if($('aside.app-sidebar').hasClass('change')){
    localStorage.setItem('menu', false);
    sidebarFactory(false)
  }else{
    localStorage.setItem('menu', true);
    sidebarFactory(true)
  }
}
// end menu transition 
$(function(){
  var menu = $('.sidebar-menu');
  var animationSpeed = 300;
  $(menu).on('click', 'li a', function(e) {
    var $this = $(this);
    var checkElement = $this.next();
    if (checkElement.is('.treeview-menu') && checkElement.is(':visible')) {
      checkElement.slideUp(animationSpeed, function() {
        checkElement.removeClass('menu-open');
      });
      checkElement.parent("li").removeClass("active");
    }
    else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
      var parent = $this.parents('ul').first();
      var ul = parent.find('ul:visible').slideUp(animationSpeed);
      ul.removeClass('menu-open');
      var parent_li = $this.parent("li");
      checkElement.slideDown(animationSpeed, function() {
        checkElement.addClass('menu-open');
        parent.find('li.active').removeClass('active');
        parent_li.addClass('active');
      });
    }
    if (checkElement.is('.treeview-menu')) { e.preventDefault(); }
  });
});
