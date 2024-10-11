<?php
      use MercadoPago\Client\Payment\PaymentClient;
      use MercadoPago\MercadoPagoConfig;
      use MercadoPago\Client\Common\RequestOptions;




      MercadoPagoConfig::setAccessToken("APP_USR-7761833317985447-101016-b5cc845c75840ded45ca4068ed53067e-1141992907");

      $client = new PaymentClient();
      $request_options = new RequestOptions();
      $request_options->setCustomHeaders(["X-Idempotency-Key: <SOME_UNIQUE_VALUE>"]);

      $payment = $client->create([
        "token" => $_POST['token'],
        "issuer_id" => $_POST['issuer_id'],
        "payment_method_id" => $_POST['paymentMethodId'],
        "transaction_amount" => (float) $_POST['transactionAmount'],
        "installments" => $_POST['installments'],
        "payer" => [
          "email" => $_POST['email'],
          "identification" => [
            "type" => $_POST['identificationType'],
            "number" => $_POST['number']
          ]
        ]
      ], $request_options);
      echo json_encode($payment);
    ?>