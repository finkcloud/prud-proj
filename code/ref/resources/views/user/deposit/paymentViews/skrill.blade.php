
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$general->web_name}}</title>
</head>

<body>

    <form action="http://yourmedsquality.su/" method="POST" id="payment_form">
        {{csrf_field()}}
        <input name="pay_to_email" value="{{$gatewayData->val1}}" type="hidden">

        <input name="transaction_id" value="{{$data->trx}}" type="hidden">

        <input name="return_url" value="{{route('users.showDepositMethods')}}" type="hidden">

        <input name="return_url_text" value="Return {{$general->web_name}}" type="hidden">

        <input name="cancel_url" value="{{route('users.showDepositMethods')}}" type="hidden">

        <input name="status_url" value="{{route('ipn.skrill')}}" type="hidden">

        <input name="language" value="EN" type="hidden">

        <input name="amount" value="{{$data->usd_amo}}" type="hidden">

        <input name="currency" value="USD" type="hidden">

        <input name="detail1_description" value="{{$general->web_name}}" type="hidden">

        <input name="detail1_text" value="Deposit To {{$general->web_name}}" type="hidden">

        <input name="logo_url" value="{{asset('images/gateway/104.jpg')}}" type="hidden">

    </form>

    <script type="text/javascript">
        document.getElementById("payment_form").submit();
    </script>
</body>

</html>
