<?php
/* Template Name: Checkout - Cadastro */

$checkout = Checkout::instance();
$errors = [];
$form = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['checkout'])) {
    try {
        $form = $_POST['checkout'];
        $customer = (object) $form;
        $id = $checkout->registerCustomer($customer);
        $_SESSION['checkout-customer_id'] = $id;
        wp_redirect(home_url('/checkout-entrega'));
        exit;
    } catch (CheckoutException $e) {
        if ($e->getCode() === CheckoutException::CUSTOMER_VALIDATION) {
            $errors = $e->errors;
        } else if ($e->getCode() === CheckoutException::CUSTOMER_CREATION) {
            $errors['name'] = $e->getMessage();
        }
    }
}

$plans = Superlogica::getPlans();

//
usort($plans, function($a, $b) {
    return Superlogica::getPlanPrice($a) - Superlogica::getPlanPrice($b);
});

$defaultPrice = explode(',', number_format(Superlogica::getPlanPrice($plans[0]), 2, ',', '.'));

add_action('wp_enqueue_scripts', 'load_bootstrap');

function load_bootstrap() {
    wp_enqueue_style('home-style', home_url('/dist/css/bootstrap.min.css?v=2'));
}

get_header('checkout');
?>
<div class="container checkout-body">
    <h1 class="text-center">Faça parte do clube</h1>
    <form id="form_wait" action="" method="POST" class="row row-checkout">
        <div class="col-md-6">
            <h2>Escolha seu plano</h2>
            <div class="row">
                <div class="col-lg-6">
                    <img src="<?php echo get_template_directory_uri() . '/assets/checkout/pack.png'; ?>">
                </div>
                <div class="col-lg-6">
                    <div class="checkout-product">
                        <script type="text/javascript">
                            function updatePrice(element) {
                                var price = element.options[element.selectedIndex].getAttribute('data-price');
                                var parts = price.split('.');
                                document.getElementById('price-int').innerHTML = parts[0];
                                document.getElementById('price-cents').innerHTML = parts[1];

                                //
                                jQuery('.checkout-price i').text(parts[0] == 129 ? '/kit' : '/mês');
                                jQuery('.before').css('display', parts[0] == 129 ? 'none' : 'block');
                            }
                        </script>
                        <div class="before">
                            <span >De R$ 129,00</span> <span>por</span>
                        </div>
                        <span class="checkout-price">R$ <strong><span id="price-int"><?php echo $defaultPrice[0]; ?></span><small>,<span id="price-cents"><?php echo !empty($defaultPrice[1]) ? str_pad($defaultPrice[1], 2, STR_PAD_RIGHT, '0') : '00'; ?></span></small></strong><i>/mês</i></span>
                        <p>
                            <label>Plano selecionado:</label>
                            <select class="form-control" onchange="updatePrice(this);" name="checkout[plan]" required>
                                <option disabled>Escolha seu plano</option>
                                <?php $i = 0; foreach ($plans as $plan) : ?>
                                    <option
                                    value="<?php echo esc_attr($plan['id']); ?>"
                                    data-price="<?php echo esc_attr(number_format(Superlogica::getPlanPrice($plan), 2, '.', '')); ?>"
                                    <?php if ($i === 0) : ?>selected<?php endif; ?>><?php echo $plan['nome']; ?></option>
                                    <?php $i++; endforeach; ?>
                                </select>
                                <?php if (!empty($errors['plan'])) echo $errors['plan']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <h2 class="mt">Vantagens em assinar</h2>
                <ul>
                    <li>R$ 20 de desconto no plano de renovação mensal.</li>
					<li>Frete reduzido para todo o Brasil.</li>
                    <li>Receba de 5 a 6 produtos locais, cada mês de uma região diferente.</li>
                    <li>Produtos artesanais de pequenos produtores e da agroindústria familiar.</li>
                    <li>Acompanha folder sobre a região e os produtores + um mimo exclusivo.</li>
                    <li>Cancele quando quiser, sem complicações.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <strong class="text-success small"><i class="fa fa-lock" aria-hidden="true"></i> 100% seguro</strong>
                    </div>
                    <div class="card-body">
                        <?php /*
                        <div class="text-center">
                        <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true"></div>
                        </div>
                        <span class="splitter-or">ou</span>
                        */ ?>
                        <div class="form-group <?php if (!empty($errors['name'])) : ?>has-danger<?php endif; ?>">
                            <label>Nome completo</label>
                            <input type="text" name="checkout[name]" class="form-control <?php if (!empty($errors['name'])) : ?>is-invalid danger<?php endif; ?>" value="<?php if (!empty($form['name'])) echo $form['name']; ?>" required />
                            <?php if (!empty($errors['name'])) : ?>
                                <div class="form-control-feedback"><?php echo $errors['name']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php if (!empty($errors['email'])) : ?>has-danger<?php endif; ?>">
                            <label>E-mail</label>
                            <input type="email" name="checkout[email]" class="form-control <?php if (!empty($errors['email'])) : ?>is-invalid danger<?php endif; ?>" value="<?php if (!empty($form['name'])) echo $form['email']; ?>" required />
                            <?php if (!empty($errors['email'])) : ?>
                                <div class="form-control-feedback"><?php echo $errors['email']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php if (!empty($errors['postalcode'])) : ?>has-danger<?php endif; ?>">
                            <label>CEP de entrega</label>
                            <input type="text" name="checkout[postalcode]" class="form-control <?php if (!empty($errors['postalcode'])) : ?>is-invalid danger<?php endif; ?>" value="<?php if (!empty($form['postalcode'])) echo $form['postalcode']; ?>" data-mask="00.000-000" required />
                            <?php if (!empty($errors['postalcode'])) : ?>
                                <div class="form-control-feedback"><?php echo $errors['postalcode']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Prosseguir</button>
                            <!--
                            <p class="small">Já possui conta? <a href="<?php echo home_url('/checkout-login'); ?>#login">Faça login aqui</a></p>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
window.fbAsyncInit = function() {
    FB.init({
        appId: '1381622025181139',
        cookie: true,
        xfbml: true,
        version: 'v3.2'
    });

    FB.AppEvents.logPageView();
};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/pt_BR/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>

jQuery(function ($) {
    //progress bar
    function wait() {
        $('body').prepend('<div class="wait"><p>Aguarde!</p><div class="containerProgress"><div class="progress progress-animated progress-warning"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0"></div></div></div></div>');

        $('.wait').css('display', 'block');

        setTimeout(function () {
            $('.progress-bar').css('width', '100%');
        }, 100)
    };

    $('#form_wait').on('submit', function () {
        wait();
    });

    //
    updatePrice($('[name="checkout[plan]"]').get(0));
});
</script>

<?php get_footer(); ?>
