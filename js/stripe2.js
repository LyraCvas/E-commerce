const stripe = Stripe('pk_test_51P234HJ3YgtKbvo2RJV8Y4R1RGx3y5meR81U3unvArc6Vo8BMI3nOudcvWMseMsPJ7uFB3XjrvNSJKrbo1YBi3oN00gxHkUh6u');
const elements = stripe.elements();

//const paymentElement = elements.create('card');

// Configura el elemento de pago
//paymentElement.mount('#payment-element');

// Create an instance of the card Element.

var card = elements.create('card');

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#payment-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}





