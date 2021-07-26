<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
  border-radius: 20%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
    width: 9px;
    height: 9px;
    border-radius: 10%;
    background: white;
    top: 3px;
    left: 3px;
}
</style>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    </button>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table class="table ps-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @if(count($order[0]['products'])>0)
                    @foreach($order[0]['products'] as $row)
                    <?php
                      $order_product = DB::table('products')->where('products_id',$row->products_id)->first();
                    ?>
                    <tr>
                        <td>
                            <div class="ps-product--cart">
                                <div class="ps-product__thumbnail">
                                    <a href="{{URL::to('product-detail/'.$order_product->products_slug)}}">
                                     <img src="{{URL::to('/'.$row->image)}}" alt="image">
                                    </a>
                                </div>
                                <div class="ps-product__content">
                                    <a href="{{URL::to('product-detail/'.$order_product->products_slug)}}">{{isset($row->products_name) ? $row->products_name : null}}</a>
                                    <p>Sold By:<strong> YOUNG SHOP</strong></p>
                                        @if($row->type == 1)
                                         <p><strong> Buy</strong></p>
                                        @else
                                            <p><strong> On Rent</strong></p>
                                        @endif
                                </div>
                            </div>
                        </td>
                        <td><span><i class="fa fa-inr"></i>{{isset($row->products_price) ? $row->products_price : '0.00'}}</span></td>
                        <td class="text-center">{{isset($row->products_quantity) ? $row->products_quantity : '1'}}</td>
                        <td><span><i class="fa fa-inr"></i>{{isset($row->final_price) ? $row->final_price : '0.00'}}</span></td>
                        
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
            <div class="alert alert-danger" id="error_div" style="display:none;">
                <p id="error_message"></p>
            </div>
                {!! Form::open(array('url' => 'submit-return','autocomplete'=>'off','role'=>'form','enctype' => 'multipart/form-data', 'id' => 'requestForm','name' => 'requestForm')) !!}
                    <div class="form-group">
                        <label for="reasons" class="form-control-label">Reasons for returning :</label>
                        <input type="hidden" name="id" value="{{$id}}"/>
                        <input type="hidden" name="orders_products_id" value="{{$orders_products_id}}"/>
                        <!--<h1>Custom Radio Buttons</h1>-->
                        <label class="container">Ordered wrong product
                          <input type="radio" name="reasons" value="1">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Received wrong product
                          <input type="radio" name="reasons" value="2">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Product is damaged or defective
                          <input type="radio" name="reasons" value="3">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Other
                          <input type="radio" name="reasons" value="4">
                          <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Message:</label>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>
                {!! Form::close() !!}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary ps-btn--sm" onclick="submitForm()">Raise return request</button>
    <button type="button" class="btn btn-primary ps-btn ps-btn--sm" data-dismiss="modal">Close</button>
</div>

<script>
    function submitForm() {
        document.getElementById("error_div").style.display = "none";
          document.getElementById("error_message").innerText = "";
          var x = document.forms["requestForm"]["reasons"].value;
          if (x == "") {
              document.getElementById("error_message").innerText = "Please specify the reason for better understanding.";
              document.getElementById("error_div").style.display = "block";
              return;
          }
          if(x == 4)
          {
              var message = document.forms["requestForm"]["message"].value;
              if (message == "") {
                  document.getElementById("error_message").innerText = "Please specify the reason for better understanding.";
                  document.getElementById("error_div").style.display = "block";
                return;
              }  
          }
        
        
        
        
        document.getElementById("requestForm").submit();
    }
</script>
       