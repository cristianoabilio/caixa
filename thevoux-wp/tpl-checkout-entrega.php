<?php

/* Template Name: Checkout - Entrega */

$checkout = Checkout::instance();

if (empty($_SESSION['checkout-customer_id'])) {
    wp_redirect(home_url('/checkout-cadastro'));
    exit;
}

$customer = $checkout->getCustomer($_SESSION['checkout-customer_id']);

if (empty($customer)) {
    wp_redirect(home_url('/checkout-cadastro'));
    exit;
}

$plan = Superlogica::getPlan($customer['plan_id']);
$shippingRate = $checkout->getShippingRateForPostalCode($plan['id'], $customer['postalcode']);

$errors = [];
$form = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['checkout'])) {
    try {
        $form = $_POST['checkout'];
        $purchase = (object) $form;
        $id = $checkout->registerPurchase($purchase, $plan);
        $_SESSION['checkout-purchase_id'] = $id;
        wp_redirect(home_url('/checkout-conclusao'));
        exit;
    } catch (CheckoutException $e) {
        if ($e->getCode() === CheckoutException::PURCHASE_VALIDATION) {
            $errors = $e->errors;
        } else if ($e->getCode() === CheckoutException::PURCHASE_CREATION) {
            $errors['name'] = $e->getMessage();
        }
    }
}

add_action('wp_enqueue_scripts', 'load_bootstrap');

function load_bootstrap() {
    wp_enqueue_style('home-style', home_url('/dist/css/bootstrap.min.css?v=2'));
}

get_header('checkout');
?>
<div class="container checkout-body">
    <h1 class="text-center">
        Finalize sua assinatura
        <p class="text-success text-center"><i class="fa fa-lock" aria-hidden="true"></i> 100% seguro</p>
    </h1>
    <form id="form_wait" class="row row-checkout" action="" method="post">
        <div class="col-md-6">
            <h2 class="mt">Seus dados</h2>
            <div class="form-group <?php if (!empty($errors['name'])) : ?>has-danger<?php endif; ?>">
                <label>Nome completo</label>
                <input type="text" class="form-control <?php if (!empty($errors['name'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[name]" value="<?php echo esc_attr(!empty($form['name']) ? $form['name'] : $customer['name']); ?>" />
                <?php if (!empty($errors['name'])) : ?>
                    <div class="form-control-feedback"><?php echo $errors['name']; ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group <?php if (!empty($errors['email'])) : ?>has-danger<?php endif; ?>">
                <label>E-mail</label>
                <input type="text" class="form-control <?php if (!empty($errors['email'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[email]" value="<?php echo esc_attr(!empty($form['email']) ? $form['email'] : $customer['email']); ?>" />
                <?php if (!empty($errors['email'])) : ?>
                    <div class="form-control-feedback"><?php echo $errors['email']; ?></div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php if (!empty($errors['phone'])) : ?>has-danger<?php endif; ?>">
                        <label>Celular</label>
                        <input type="text" class="form-control <?php if (!empty($errors['phone'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[phone]" value="<?php if (!empty($form['phone'])) echo esc_attr($form['phone']); ?>" placeholder="(__) _____-____" data-mask="(00) 00000-0000" />
                        <?php if (!empty($errors['phone'])) : ?>
                            <div class="form-control-feedback"><?php echo $errors['phone']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php if (!empty($errors['document'])) : ?>has-danger<?php endif; ?>">
                        <label>CPF<small class="muted">Para emissão de nota fiscal</small></label>
                        <input type="text" class="form-control <?php if (!empty($errors['document'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[document]" value="<?php if (!empty($form['document'])) echo esc_attr($form['document']); ?>" placeholder="___.___.___-__" data-mask="000.000.000-00" />
                        <?php if (!empty($errors['document'])) : ?>
                            <div class="form-control-feedback"><?php echo $errors['document']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group <?php if (!empty($errors['password'])) : ?>has-danger<?php endif; ?>">
                        <label>Crie uma senha</label>
                        <input type="password" name="checkout[password]" class="form-control <?php if (!empty($errors['password'])) : ?>is-invalid danger<?php endif; ?>" />
                        <?php if (!empty($errors['password'])) : ?>
                            <div class="form-control-feedback"><?php echo $errors['password']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group <?php if (!empty($errors['confirmation'])) : ?>has-danger<?php endif; ?>">
                        <label>Confirme sua senha</label>
                        <input type="password" name="checkout[confirmation]" class="form-control <?php if (!empty($errors['confirmation'])) : ?>is-invalid danger<?php endif; ?>" />
                        <?php if (!empty($errors['confirmation'])) : ?>
                            <div class="form-control-feedback"><?php echo $errors['confirmation']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <h2 class="mt">Entrega</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group <?php if (!empty($errors['postalcode'])) : ?>has-danger<?php endif; ?>">
                            <label>CEP</label>
                            <input type="text" class="form-control <?php if (!empty($errors['postalcode'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[postalcode]" value="<?php echo esc_attr(!empty($form['postalcode']) ? $form['postalcode'] : $customer['postalcode']); ?>" placeholder="_____-____" data-mask="00000-000" />
                            <?php if (!empty($errors['postalcode'])) : ?>
                                <div class="form-control-feedback"><?php echo $errors['postalcode']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php if (!empty($errors['address'])) : ?>has-danger<?php endif; ?>">
                    <label>Endereço</label>
                    <input type="text" class="form-control addressAutoFill <?php if (!empty($errors['address'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[address]" value="<?php if (!empty($form['address'])) echo esc_attr($form['address']); ?>" />
                    <?php if (!empty($errors['address'])) : ?>
                        <div class="form-control-feedback"><?php echo $errors['address']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-xs-5 col-md-3">
                        <div class="form-group <?php if (!empty($errors['number'])) : ?>has-danger<?php endif; ?>">
                            <label>Número</label>
                            <input type="text" class="form-control <?php if (!empty($errors['number'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[number]" value="<?php if (!empty($form['number'])) echo esc_attr($form['number']); ?>" />
                            <?php if (!empty($errors['number'])) : ?>
                                <div class="form-control-feedback"><?php echo $errors['number']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xs-7 col-md-4">
                        <div class="form-group <?php if (!empty($errors['unit'])) : ?>has-danger<?php endif; ?>">
                            <label>Complemento</label>
                            <input type="text" class="form-control <?php if (!empty($errors['unit'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[unit]" value="<?php if (!empty($form['unit'])) echo esc_attr($form['unit']); ?>" placeholder="Ex.: Ap.201" />
                            <?php if (!empty($errors['unit'])) : ?>
                                <div class="form-control-feedback"><?php echo $errors['unit']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <div class="form-group <?php if (!empty($errors['district'])) : ?>has-danger<?php endif; ?>">
                            <label>Bairro</label>
                            <input type="text" class="form-control addressAutoFill <?php if (!empty($errors['district'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[district]" value="<?php if (!empty($form['district'])) echo esc_attr($form['district']); ?>" />
                            <?php if (!empty($errors['district'])) : ?>
                                <div class="form-control-feedback"><?php echo $errors['district']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5 col-md-3">
                        <div class="form-group <?php if (!empty($errors['state'])) : ?>has-danger<?php endif; ?>">
                            <label>Estado</label>
                            <select class="form-control addressAutoFill <?php if (!empty($errors['state'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[state]">
                                <option value=""></option>
                                <?php foreach ($checkout->getStates() as $stateAbbr => $stateName) : ?>
                                    <option value="<?php echo esc_attr($stateAbbr); ?>" <?php if (!empty($form['state']) && $form['state'] == $stateAbbr) : ?>selected<?php endif; ?>><?php echo $stateName; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (!empty($errors['state'])) : ?>
                                <div class="form-control-feedback"><?php echo $errors['state']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xs-7 col-md-9">
                        <div class="form-group <?php if (!empty($errors['city'])) : ?>has-danger<?php endif; ?>">
                            <label>Cidade</label>
                            <input type="text" class="form-control addressAutoFill <?php if (!empty($errors['city'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[city]" value="<?php if (!empty($form['city'])) echo esc_attr($form['city']); ?>" />
                            <?php if (!empty($errors['city'])) : ?>
                                <div class="form-control-feedback"><?php echo $errors['city']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <h2 class="mt">Forma de pagamento</h2>
                <div class="form-check">
                    <input class="form-check-input" id="credit-card" type="radio" name="checkout[payment_method]" value="3" <?php if (stripos($plan['nome'], 'Avulso') === false || !empty($form['payment_method']) && $form['payment_method'] === '3') : ?>checked<?php endif; ?>>
                    <label class="form-check-label <?php if (!empty($errors['payment_method'])) : ?>is-invalid danger<?php endif; ?>" for="credit-card">
                        Cartão de crédito
                        <img width="222px" src="<?php echo get_template_directory_uri() . '/assets/checkout/credit.png'; ?>">
                    </label>
                    <?php if (!empty($errors['payment_method'])) : ?>
                        <div class="form-control-feedback" style="margin-top: 5px"><?php echo $errors['payment_method']; ?></div>
                    <?php endif; ?>
                    <div class="credit-detail">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group <?php if (!empty($errors['card_number'])) : ?>has-danger<?php endif; ?>">
                                    <label>Número do cartão de crédito</label>
                                    <input type="text" class="form-control <?php if (!empty($errors['card_number'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[card_number]" data-mask="0000 0000 0000 0000" />
                                    <?php if (!empty($errors['card_number'])) : ?>
                                        <div class="form-control-feedback"><?php echo $errors['card_number']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group <?php if (!empty($errors['card_name'])) : ?>has-danger<?php endif; ?>">
                                    <label>Nome impresso no cartão</label>
                                    <input type="text" class="form-control <?php if (!empty($errors['card_name'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[card_name]" />
                                    <?php if (!empty($errors['card_name'])) : ?>
                                        <div class="form-control-feedback"><?php echo $errors['card_name']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group <?php if (!empty($errors['card_expiration_month']) || !empty($errors['card_expiration_year'])) : ?>has-danger<?php endif; ?>">
                                    <label>Data de vencimento</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <select class="form-control <?php if (!empty($errors['card_expiration_month'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[card_expiration_month]">
                                                <?php foreach (range(1, 12) as $month) : ?>
                                                    <option value="<?php echo $month; ?>"><?php echo str_pad($month, 2, STR_PAD_LEFT, '0'); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (!empty($errors['card_expiration_month'])) : ?>
                                                <div class="form-control-feedback"><?php echo $errors['card_expiration_month']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <select class="form-control <?php if (!empty($errors['card_expiration_year'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[card_expiration_year]">
                                                <?php foreach (range(date('y'), date('y') + 10) as $year) : ?>
                                                    <option value="<?php echo $year; ?>">20<?php echo $year; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (!empty($errors['card_expiration_year'])) : ?>
                                                <div class="form-control-feedback"><?php echo $errors['card_expiration_year']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?php if (!empty($errors['card_cvv'])) : ?>has-danger<?php endif; ?>">
                                    <label style="margin-bottom: -2px">
                                        Código de segurança <a id="tool"><img class="card-tool" src="<?php echo get_template_directory_uri() . '/assets/checkout/tool.svg'; ?>"></a>
                                    </label>
                                    <input type="text" class="form-control <?php if (!empty($errors['card_cvv'])) : ?>is-invalid danger<?php endif; ?>" name="checkout[card_cvv]" data-mask="0009" />
                                    <div class="tooltip-card">
                                        <img class="card-tool" src="<?php echo get_template_directory_uri() . '/assets/checkout/card.svg'; ?>">
                                    </div>
                                    <?php if (!empty($errors['card_cvv'])) : ?>
                                        <div class="form-control-feedback"><?php echo $errors['card_cvv']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(stripos($plan['nome'], 'Avulso') !== false) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="barcode" name="checkout[payment_method]" value="0" <?php if (isset($form['payment_method']) && $form['payment_method'] === '0') : ?>checked<?php endif; ?>>
                        <label class="form-check-label" for="barcode">
                            Boleto<img src="<?php echo get_template_directory_uri() . '/assets/checkout/barcode.png'; ?>">
                        </label>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php if(stripos($plan['nome'], 'Avulso') !== false) : ?>
                            <h3 class="text-center">Resumo da compra</h3>
                        <?php else : ?>
                            <h3 class="text-center">Resumo da assinatura</h3>
                        <?php endif; ?>
                        <p class="text-muted">Kit mensal com:</p>
                        <ul>
                            <li class="text-muted small">No mínimo 5 produtos locais e artesanais</li>
                            <li class="text-muted small">Encarte sobre a região e os produtores</li>
                            <li class="text-muted small">Mimo exclusivo</li>
                            <li class="text-muted small">E mais surpresas!</li>
                        </ul>
                        <table class="w-100">
                            <tbody>
                                <tr>
                                    <th>Plano</th>
                                    <td><?php echo $plan['nome']; ?></td>
                                </tr>
                                <tr>
                                    <th>Preço kit</th>
                                    <td><small>R$</small>129,00<?php /* echo number_format(Superlogica::getPlanPrice($plan), 2, ',', '.'); */ ?></td>
                                </tr>
                                <?php if($plan['nome'] == 'Recorrência mensal') : ?>
                                    <tr class="discount">
                                        <th>Desconto</th>
                                        <td><small>R$</small>20,00</td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>Frete</th>
                                    <td id="shippingRateCart"><?php if (!empty($shippingRate)) : ?><?php echo $shippingRate['price'] == 0 ? 'frete grátis' : ('<small>R$</small>' . number_format($shippingRate['price'], 2, ',', '.')); ?><?php endif; ?></td>
                                </tr>
                                <tr class="disc">
                                    <th>Cupom</th>
                                    <td id="couponCart">
                                        <div class="input-group" id="coupon" style="display:none">
                                            <input type="text" class="form-control" placeholder="Seu cupom">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button">Ok</button>
                                            </span>
                                        </div>
                                        <a href="#" onclick="jQuery('#coupon').show();jQuery(this).hide();return false;">
                                            <small>digitar cupom</small>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <?php if(stripos($plan['nome'], 'Avulso') !== false) : ?>
                                        <th>Total</th>
                                    <?php else : ?>
                                        <th>Mensalidade</th>
                                    <?php endif; ?>
                                    <td><strong id="totalCart"><small>R$</small><?php echo number_format(Superlogica::getPlanPrice($plan) + (!empty($shippingRate) ? $shippingRate['price'] : 0), 2, ',', '.'); ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <p class="small text-center">Ao finalizar, você concorda com os <a href="https://caixacolonial.club/termos-de-uso/">termos de serviço</a> e a <a href="https://caixacolonial.club/politica-de-privacidade/">política de privacidade</a>.</p>
                            </div>
                        </div>
                        <?php if(stripos($plan['nome'], 'Avulso') !== false) : ?>
                            <button type="submit" class="btn btn-primary" <?php if(empty($shippingRate)) : ?>disabled<?php endif; ?>>Finalizar compra</button>
                            <?php if(empty($shippingRate)) : ?><p class="correios">Não é possível calcular o frete no momento devido à instabilidade no servidor dos Correios. Tente novamente mais tarde.</p><?php endif; ?>
                        <?php else : ?>
                            <button type="submit" class="btn btn-primary" <?php if(empty($shippingRate)) : ?>disabled<?php endif; ?>>Finalizar assinatura</button>
                            <?php if(empty($shippingRate)) : ?><p class="correios">Não é possível calcular o frete no momento devido à instabilidade no servidor dos Correios. Tente novamente mais tarde. </p><?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </form>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
    jQuery(function ($) {
        var planInstallments = <?php echo $plan['nm_parcelas_pla']; ?>;
        var planPrice = <?php echo (float) Superlogica::getPlanPrice($plan); ?>;
        var shippingPrice = <?php echo !empty($shippingRate) ? (float) $shippingRate['price'] : 'null'; ?>;
        var couponPrice = 0;

        function updatePrices() {
            if (shippingPrice !== null) {
                $('#shippingRateText').html(shippingPrice === 0 ? '+ frete grátis' : ('+ frete de R$' + shippingPrice.toFixed(2).replace('.', ',')));
                $('#shippingRateCart').html(shippingPrice === 0 ? 'frete grátis' : ('<small>R$</small>' + shippingPrice.toFixed(2).replace('.', ',')));
            }
            var couponPriceInstallment = couponPrice / planInstallments;
            if (couponPrice > 0) {
                $('#couponCart').html('<small>' + (planInstallments > 1 ? '(' + planInstallments + 'x)' : '') + ' R$</small>' + couponPriceInstallment.toFixed(2).replace('.', ','));
            }
            $('#totalCart').html('<small>R$</small>' + (planPrice + (shippingPrice || 0) - couponPriceInstallment).toFixed(2).replace('.', ','));
        }

        function updateShippingAddress($element) {
            var postalCode = $element.val().replace(/[^\d]+/g, '');
            if (postalCode.length !== 8) {
                return;
            }

            var url = '<?php echo get_rest_url(null, 'checkout/v1/shipping-rate'); ?>?plan=<?php echo $plan['id']; ?>&postal_code=' + postalCode;

            $.get(url).then(function (data) {

                if (!data || typeof data.price !== 'number') {
                    return;
                }

                shippingPrice = parseFloat(data.price);

                updatePrices();
            });
        }

        function updateAddress($element) {

            var postalCode = $element.val().replace(/[^\d]+/g, '');

            if (postalCode.length !== 8) {
                return;
            }
            $('.addressAutoFill').prop('disabled', true);

            var url = 'https://viacep.com.br/ws/' + postalCode + '/json/';
            $.get(url).then(function (data) {
                $('[name="checkout[address]"').val(data.logradouro).removeClass('is-invalid danger');
                $('[name="checkout[district]"').val(data.bairro).removeClass('is-invalid danger');
                $('[name="checkout[state]"').val(data.uf).removeClass('is-invalid danger');
                $('[name="checkout[city]"').val(data.localidade).removeClass('is-invalid danger');
                $('.addressAutoFill').prop('disabled', false);
            });
        }

        var $postalCode = $('[name="checkout[postalcode]"]').on('change', function () {
            updateAddress($(this));
            updateShippingAddress($(this));
        });

        if (!!$postalCode.val()) {
            updateAddress($postalCode);
        }

        $('#coupon button').on('click', function () {

            var coupon = $('#coupon input').val();

            if (!coupon) {
                return;
            }

            var url = '<?php echo get_rest_url(null, 'checkout/v1/coupon'); ?>?plan=<?php echo $plan['id']; ?>&coupon=' + coupon;
            $.get(url).then(function (data) {
                if (!data) {
                    window.alert('Cupom não existente ou inválido.');
                        return;
                }

                var $form = $('form.row-checkout');
                $form.find('[name="checkout[coupon]"]').remove();
                $form.append('<input type="hidden" name="checkout[coupon]" value="' + coupon + '" />');

                couponPrice = parseFloat(data.data.vl_desconto_cup);

                $('.disc').addClass('discount');

                updatePrices();
            });
        });

        //border form "checkout-entrega"
        function border() {
            $('.form-control[value=""],.form-control:not([value])').each(function () {
                var border = $(this);

                if(border.is('[name="checkout[unit]"]')) {
                    return true;
                }
                border.addClass('is-invalid danger');
            });
            $('.form-control').on('change', function () {

                if($(this).val() != "") {

                    $(this).removeClass('is-invalid danger');
                }
            });
        }
        border();

        //progress bar
        function wait() {
            $('body').prepend('<div class="wait"><p>Aguarde!</p><div class="containerProgress"><div class="progress progress-animated progress-warning"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0"></div></div></div></div>');

            $('.wait').css('display', 'block');

            //progress bar
            setTimeout(function () {
                $('.progress-bar').css('width', '100%');
            }, 100)
        }
        $('#form_wait').on('submit', function () {
            wait();
        });

        //
        function tooltip() {
            $('.tooltip-card').toggle();
        };

        $('#tool').on('click', function () {
            tooltip();
        });

        $(document).on('click', function (event) {
            var $target = $(event.target);
            if ($target.is('#tool') || $target.parents('#tool').length > 0) {
                return;
            }
            $('.tooltip-card').hide();
        });
    });
</script>
<?php get_footer(); ?>
