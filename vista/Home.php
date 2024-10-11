<html>

<head>
    <script src="https://sdk.mercadopago.com/js/v2">
    </script>
</head>
<?php include_once("../vista/estructura/navbar.php") ?>

<body class="p-0  m-0" style="background-color: rgb(0,0, 0,0.8);">
    <div id="paymentBrick_container">
    </div>
    <script>
        const mp = new MercadoPago('APP_USR-816d265f-41d6-4824-a1c3-b009b866b5da', {
            locale: 'es'
        });
        const bricksBuilder = mp.bricks();
        const renderPaymentBrick = async (bricksBuilder) => {
            const settings = {
                initialization: {
                    /*
                    "amount" es el monto total a pagar por todos los medios de pago con excepción de la Cuenta de Mercado Pago y Cuotas sin tarjeta de crédito, las cuales tienen su valor de procesamiento determinado en el backend a través del "preferenceId"
                    */
                    amount: 2000,
                    preferenceId: "1141992907-06e3ec9b-6123-49a1-acdd-7ef55b3dddf8", // Aca va a ir el id del producto a conprar 
                    payer: {
                        firstName: "",
                        lastName: "",
                        email: "",
                    },
                },
                customization: {
                    visual: {
                        style: {
                            theme: "default",
                        },
                    },
                    paymentMethods: {
                        mercadoPago: "all",
                        ticket: "all",
                        debitCard: "all",
                        creditCard: "all",
                    },
                },
                callbacks: {
                    onReady: () => {
                        /*
                         Callback llamado cuando el Brick está listo.
                         Aquí puede ocultar cargamentos de su sitio, por ejemplo.
                        */
                    },
                    onSubmit: ({
                        selectedPaymentMethod,
                        formData
                    }) => {
                        // callback llamado al hacer clic en el botón de envío de datos
                        return new Promise((resolve, reject) => {
                            fetch("/process_payment", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                    },
                                    body: JSON.stringify(formData),
                                })
                                .then((response) => response.json())
                                .then((response) => {
                                    // recibir el resultado del pago
                                    resolve();
                                })
                                .catch((error) => {
                                    // manejar la respuesta de error al intentar crear el pago
                                    reject();
                                });
                        });
                    },
                    onError: (error) => {
                        // callback llamado para todos los casos de error de Brick
                        console.error(error);
                    },
                },
            };
            window.paymentBrickController = await bricksBuilder.create(
                "payment",
                "paymentBrick_container",
                settings
            );
        };
        renderPaymentBrick(bricksBuilder);
    </script>

</body>
<?php include_once("../vista/estructura/footer.php") ?>

</html>