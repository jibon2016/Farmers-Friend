


$(function() { 
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});

$.ajaxSetup({
  headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('#topSearchbox').on('keyup',function(){
  $inputSearch = $(this).val();

//   if($(this).val().length > 0){
//     window.location.href = 'productall';
//     $($topSearchbox).value = document.cookie;
//     var $target = document.getElementById(#topSearchbox);
//     $target.focus();
//     $target.select();
// }

  $.ajax({
    method: "post",
    url: "productall",
    dataType: 'json',
    data:{
      inputSearch : $inputSearch
    },
    // headers:{
    //   'Accept':'application/json',
    //   'Content-Type':'application/json'
    // },
    success:function(data){
      var tableRow = '';
      $(".dynamic-row").html('');
      
      $.each(data,function(ind, value){
        tableRow ="<div class='col-md-3 float-left py-3'>"+
        "<div class='product-top'>"+
          "<img src='http://127.0.0.1:8000/Product_image/"+ value.picture+"'>"+
          "<a href='www.google.com'>"+
            "<div class='overlay'>"+
              "<h2>বিস্তারিত দেখুন>></h2>"+
            "</div>"+
          "</a>"+
        "</div>"+
        "<div class='product-bottom text-center'>"+
          "<h3>"+ value.title +"</h3>"+
          "<h5>"+ value.cost_price +"</h5>"+
        "</div>"+
        "<div class='order-btn'>"+
          "<button class='btn btn-block btn-success'>Order</button>"+
        "</div>"+
      "</div>";
      $(".dynamic-row").append(tableRow);

      });
      console.log(data);
    }
  })
});

