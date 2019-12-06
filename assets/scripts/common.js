function manageCart($row, $delete=true){
  var $qty=$("[name=qty-"+$row+"]").val();
  var $baseUrl=$('#base_url').attr('href');
  console.log($qty);
  if($delete==false){
    $this_url=$baseUrl+'/cart/manage/'+$qty;
  }else{
    $this_url=$baseUrl+'/cart/manage';
  }
  $.ajax({
    url:$this_url,
    method:'POST',
    data:{row:$row},
    success:function(){
        location.reload();
    },
    error:function(error) {
      console.log(error)
    }
  })
}
function addCart($product_id){
  if($product_id>0){
    $.ajax({
      url:$('#base_url').attr('href')+'/cart/add/'+$product_id,
      method:'POST',
      success:function(data){
        location.reload();
      },
      error:function(error) {
        console.log(error);
      }
    });
  }
}
$(document).ready(function() {
    $.ajax({
      method:"GET",
      url:$('#base_url').attr('href')+'/cart/data',
      success:function(res){
        var $html = '';
        if(Object.keys(res).length>0){
          $.each(res,function(k,v){
            $html+=`
            <li class="list-group-item d-flex p-1 align-content-center">
                <img src="${v.thumb}" alt="${v.name}" width="80" height="100">
                <div class="p-1">
                    <h6 class="text-nowrap text-truncate" style="width:180px">${v.name}</h6>
                    <P class="text-center"><b>${v.qty}</b> X <b>$ ${v.price}</b></P>
                    <button onClick="manageCart('${k}')" type="button" class="cart-delete btn">
                      <i class="mdi mdi-delete-outline"></i>
                    </button>
                </div>
            </li>`;
          });
        }else{
          $html=`<li class="list-group-item mt-2 py-4 px-2"><h6 class="text-center">Your shopping cart is empty!</h6></li>`;
        }
        $('#listCart').html($html);
        $('#cartCount').text(Object.keys(res).length);
      }
    })
});

$(window).on('resize',function() {
  $('#appMenu').collapse('hide');
});
$(function(){
    $('.home-slider').slick({
        dots: true,
        speed: 500,
        fade: true,
        infinite: true,
        cssEase: 'linear',
        adaptiveHeight: true
    });
})
$(function(){
    $('.feature-slider').each(function(){
        $(this).slick({
            dots: true,
            speed: 300,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]
        });
    })
})