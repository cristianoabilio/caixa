<?php

/* Template Name: Checkout - Login */

add_action('wp_enqueue_scripts', 'load_bootstrap');

function load_bootstrap() {
    wp_enqueue_style('home-style', home_url('/dist/css/bootstrap.min.css?v=2'));
}

get_header('checkout');
?>
<div class="container checkout-body">

    <h1 class="text-center">Faça parte da Caixa Colonial</h1>

    <div class="row row-checkout">
        <div class="col-md-6">
            <h2>Cadastre-se e ganhe 1 mês grátis!</h2>
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
                            }
                        </script>
                        <span class="checkout-price">R$ <strong><span id="price-int">99</span><small>,<span id="price-cents">00</span></small></strong><i>/mês</i></span>
                        <p>
                            <label>Período de adesão</label>
                            <select class="form-control" onchange="updatePrice(this);">
                                <option disabled>Escolha seu plano</option>
                                <option value="anual" data-price="99.00" selected>Anual</option>
                                <option value="semestral" data-price="109.00">Semestral</option>
                                <option value="trimestral" data-price="119.00">Trimestral</option>
                                <option value="mensal" data-price="129.00">Avulso</option>
                            </select>
                        </p>
                    </div>
                </div>
            </div>
            <h2 class="mt">Vantagens em assinar</h2>
            <ul>
                <li>1 mês grátis no plano semestral ou anual.</li>
                <li>Receba de 5 a 6 produtos locais, cada mês de uma região diferente.</li>
                <li>Produtos artesanais de pequenos produtores e da agroindústria familiar.</li>
                <li>Acompanha folder sobre a região e os produtores + um mimo exclusivo.</li>
                <li>Cancele quando quiser, sem complicações.</li>
            </ul>
        </div>
        <div class="col-md-6">
            <form id="login">
                <div class="card">
                    <div class="card-header text-center">
                        <strong class="text-success small"><i class="fa fa-lock" aria-hidden="true"></i> 100% seguro</strong>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Cadastre-se <span>com o Facebook</span></a>
                        <span class="splitter-or">ou</span>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" />
                        </div>
                        <p class="text-center small"><a href="#">Esqueceu sua senha?</a></p>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                        <div class="text-center">
                            <button type="submit" class="btn btn-link">Voltar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?php get_footer(); ?>
