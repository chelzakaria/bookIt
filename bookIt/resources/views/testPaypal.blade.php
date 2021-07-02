@extends('layouts.app')
@section('content') 
{{-- <script>    paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        application_context: {
          brand_name : 'Book it',
          user_action : 'PAY_NOW',
        },
        purchase_units: [{
          amount: {
            value: '0'
          }
        }],
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
}).render('#paypal-button-container');
</script> --}}
<script>
    paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        application_context: {
          brand_name : 'Laravel Book Store Demo Paypal App',
          user_action : 'PAY_NOW',
        },
        purchase_units: [{
          amount: {
            value: '0.01'
          }
        }],
      });
    },

    onApprove: function(data, actions) {

      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
          if(details.status == 'COMPLETED'){
            return fetch('/api/paypal-capture-payment', {
                      method: 'post',
                      headers: {
                          'content-type': 'application/json',
                          "Accept": "application/json, text-plain, */*",
                          "X-Requested-With": "XMLHttpRequest",
                          "X-CSRF-TOKEN": token
                      },
                      body: JSON.stringify({
                          orderId     : data.orderID,
                          id : details.id,
                          status: details.status,
                          payerEmail: details.payer.email_address,
                      })
                  })
                  .then(status)
                  .then(function(response){
                      // redirect to the completed page if paid
                      window.location.href = '/pay-success';
                  })
                  .catch(function(error) {
                      // redirect to failed page if internal error occurs
                      window.location.href = '/pay-failed?reason=internalFailure';
                  });
          }else{
              window.location.href = '/pay-failed?reason=failedToCapture';
          }
      });
    },

    onCancel: function (data) {
        window.location.href = '/pay-failed?reason=userCancelled';
    }



    }).render('#paypal-button-container');
    // This function displays Smart Payment Buttons on your web page.

    function status(res) {
      if (!res.ok) {
          throw new Error(res.statusText);
      }
      return res;
    } 
  </script>
<div class="container py-5">
    <div id="paypal-button-container">

    
    </div>
</div>
@endsection