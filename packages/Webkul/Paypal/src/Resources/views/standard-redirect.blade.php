<?php $paypalStandard = app('Webkul\Paypal\Payment\Standard') ?>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true">
    You will be redirected to the PayPal website in a few seconds.
    

    <form action="https://test.payu.in/_payment" id="payubiz_checkout" method="POST">
        <input value="Click here if you are not redirected within 10 seconds..." type="submit">

        @foreach ($paypalStandard->getFormFields() as $name => $value)

            <input type="hidden" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}">

        @endforeach
    </form>

    <script type="text/javascript">
        document.getElementById("payubiz_checkout").submit();
    </script>
</body>