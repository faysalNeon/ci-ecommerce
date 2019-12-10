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

jQuery(document).ready(function($){
	$('.table-data').each(function(){
		let table=$(this).DataTable({ "columnDefs": [{ "targets": 'clean', "orderable": false,}] });
		$('.row.top').remove();
		table.columns().every(function(){ let that = this;
		    $('input,select', this.footer()).on('keyup change', function(){
		        if ( that.search() !== this.value){
		            that.search(this.value).draw();
		        }
		    });
		});
	});
  
  $('.editor').each(function(){
    $(this).wysihtml5({
      "color":true,
      "stylesheets": ['assets/library/wysihtml5/wysiwyg-color.css']
    });
  });
});
