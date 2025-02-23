<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/style2.css')}}">

</head>

<body>

  <div class="form-header">
    <h4 class="title">Credit card detail</h4>
  </div>
  @if(session('error'))
  <div class="alert alert-success" id="success-alert">
      {{ session('error') }}
  </div>
@endif
  <div class="form-body">
    <form class="credit-card" action="{{route('mastercard.payment2', ['order_id' => $order->id])}}" method="POST">
      @csrf
<!-- Card Number -->
<input type="text" class="card_number" name="card_number" placeholder="Card Number">
<!-- Date Field -->
<div class="date-field">
  <div class="month">
    <label for="month">Month:</label>
    <select name="month" id="month" required>
        <option value="">Select Month</option>
        @foreach (range(1, 12) as $month)
            <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
        @endforeach
    </select>
  </div>
  <div class="year">
    <label for="year">Year:</label>
    <select name="year" id="year" required>
        <option value="">Select Year</option>
        @foreach (range(date('Y'), date('Y') + 10) as $year)
            <option value="{{ $year }}">{{ $year }}</option>
        @endforeach
    </select>
  </div>
</div>

   <!-- Card Verification Field -->
   <div class="card-verification">
    <div class="cvv-input">
      <input type="text" name="cvv" placeholder="CVV">
    </div>
    <div class="cvv-details">
      <p>3 or 4 digits usually found <br> on the signature strip</p>
    </div>
<!-- Buttons -->
<button type="submit" class="proceed-btn">Proceed</button>
<button type="button" class="paypal-btn">Pay With PayPal</button>
    </form>
      
</div>   
</body>
</html>