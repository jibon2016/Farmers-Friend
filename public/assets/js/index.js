// const { keyBy } = require("lodash");

$(function () {
  $('#sidebarCollapse').on('click', function () {
    $('#sidebar, #content').toggleClass('active')
  })
})

$('#inputSearch').on('keydown', function () {
  $inputKey = $(this).val()
  // if ($inputKey.length > 0) {
  var target = document.getElementById('topSearchbox')
  target.focus()
  target.select()
  // }
  console.log($inputKey)
})

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
  },
})

if (document.getElementById('userType') != null) {
  var userType = document.getElementById('userType').innerText
}
if (typeof userType !== 'undefined') {
  if (userType == 'Buyer') {
    var productLink = '/product/'
    var buttonOfProduct = 'Order'
    console.log(productLink)
  } else if (userType == 'Seller') {
    var productLink = '/product/Offer/'
    var buttonOfProduct = 'Offer'
    console.log(productLink)
  }
} else {
  console.log('You are not Log in')
}

$('#topSearchbox').on('keyup', function () {
  $inputSearch = $(this).val()

  $.ajax({
    method: 'post',
    url: '/productall',
    dataType: 'json',
    data: {
      inputSearch: $inputSearch,
    },
    success: function (data) {
      var tableRow = ''
      $('.dynamic-row').html('')

      $.each(data, function (ind, value) {
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
          "<h5>tk."+ value.cost_price +"/-</h5>"+
        "</div>"+
        "<div class='order-btn'>"+
          "<a href='"+productLink+value.title +"' class='btn btn-block btn-success text-white'>"+buttonOfProduct+"</a>"+
        "</div>"+
      "</div>";
        $('.dynamic-row').append(tableRow)
      })
      console.log(data)
    },
  })
})

// getTotal();
$('.order_quatity').change(function () {
  let orderQuantity = $(this).val()
  let product_price = document.getElementById('cost-price').innerText
  let product_total = orderQuantity * product_price
  document.getElementById('product_total').innerText = product_total
  getTotal()
}).change();

$('#inputState').on('change', function () {
  let product_unit = this.value
  let product_price = document.getElementById('cost-price').innerText
  let orderQuantity = document.getElementById('quantity').value
  if (product_unit == 'mon') {
    let product_total = orderQuantity * (product_price * 40)
    document.getElementById('product_total').innerText = product_total
    getTotal()
  }
  if (product_unit == 'bag') {
    let product_total = orderQuantity * (product_price * 20)
    document.getElementById('product_total').innerText = product_total
    getTotal()
  }
}).change();

function getTotal() {
  // var deliveryCharge = document.getElementById('delivery_charge').innerText
  var product_price = document.getElementById('product_total').innerText
  var deliveryCharge = (product_price/100)*5;
  var totalCharge = parseInt(deliveryCharge) + parseInt(product_price)
  document.getElementById('total_charge').innerText = totalCharge
  document.getElementById('delivery_charge').innerText = deliveryCharge
  document.getElementById('product_total_cost').value = product_price
  document.getElementById('delivery_cost').value = deliveryCharge
  document.getElementById('total_order_cost').value = totalCharge
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      let p = document.getElementById('blah');
      p.removeAttribute("hidden");
      $('#blah').attr('src', e.target.result).width(200).height(150);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
