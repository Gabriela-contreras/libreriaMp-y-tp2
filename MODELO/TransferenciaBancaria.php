<?php
      use MercadoPago\Client\Payment\PaymentClient;
      use MercadoPago\MercadoPagoConfig;
      use MercadoPago\Client\Common\RequestOptions;
    
    
      MercadoPagoConfig::setAccessToken("APP_USR-7761833317985447-101016-b5cc845c75840ded45ca4068ed53067e-1141992907");
    
      $client = new PaymentClient();
      $request_options = new RequestOptions();
      $request_options->setCustomHeaders(["X-Idempotency-Key: <SOME_UNIQUE_VALUE>"]);
    
      $payment = $client->create([
        "payment_method_id" => $_POST['paymentMethodId'],
        "transaction_amount" => (float) $_POST['transactionAmount'],
        "payer" => [
          "email" => $_POST['email'],
        ]
      ], $request_options);
      echo json_encode($payment);
    ?>  