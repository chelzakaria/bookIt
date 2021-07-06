@extends('layouts.app')
    @section('content') 
    <div class="container">
      <div class="card mx-auto mt-5" style="width: 36rem;">
        <div class="card-body">
          <h4 class="card-title text-center mb-4 mt-3">Choose your payment method </h4>
          <div id="paypal-button-container"></div>
        </div>
      </div>
      
      <div class="d-none">
        <form method="POST" action="{{ route('pay') }}" id="form">
          @csrf
          <input type="text" class="form-control" name="plan" id="paln" value="{{$type}}">
          <input type="number" name="time_period" id="time_period" @if ($type=="monthly")
          value="30"           
          @elseif ($type=="yearly")
              value="365"
          @endif>
          <input type="text" id="type" value="{{$type}}">
          <button type="submit"  ></button>
        </form>
      </div>
    </div>
    <script>
      let value;
 
      if({!! json_encode($type) !!}=="monthly"){

         value = '10.00'
      }
      else if({!! json_encode($type) !!}==="yearly"){
         value = '100.00'
      }
         paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: value 
          }
        }]
      });
    },
    onApprove: function(data, actions) {
       return actions.order.capture().then(function(details) {
        //  console.log(details.purchase_units[0].amount.value);
       myfun();
      });
    },
    onError: (err) => {
    alert('something went wrong');

    console.error('error from the onError callback', err);
  }
  }).render('#paypal-button-container');
        // This function displays Smart Payment Buttons on your web page.

        function myfun(){
          var form = document.getElementById("form");
         
         form.submit()
        }
      </script>
    @endsection  
