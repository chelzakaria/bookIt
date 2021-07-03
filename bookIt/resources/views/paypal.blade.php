@extends('layouts.app')
    @section('content') 
    <div class="container">
      <div id="paypal-button-container"></div>
    </div>
    <script>
        paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '1.00'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        console.log(details.purchase_units[0].amount.value);
      });
    }
  }).render('#paypal-button-container');
        // This function displays Smart Payment Buttons on your web page.
      </script>
    @endsection  
