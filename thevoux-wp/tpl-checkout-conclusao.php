<?php

/* Template Name: Checkout - Conclusao */

add_action('wp_enqueue_scripts', 'load_bootstrap');
if(empty($_SESSION['checkout-customer_id'])) {
    wp_redirect(home_url('/checkout-cadastro'));
    exit;
}

unset($_SESSION['checkout-customer_id']);
unset($_SESSION['checkout-purchase_id']);

function load_bootstrap() {
    wp_enqueue_style('home-style', home_url('/dist/css/bootstrap.min.css?v=2'));
}

get_header('checkout');
?>
<div class="container checkout-body">

    <div class="conclusion row bg-success row-checkout">
        <div class="col-md-6 offset-md-4">
            <h1>Muito obrigado!</h1>
            <p>Recebemos seu pedido e assim que o pagamento for confirmado enviaremos um e-mail com mais detalhes sobre sua assinatura.</p>
            <p>Caso tenha escolhido pagar por boleto bancário, confira em seu e-mail o link para acessar seu boleto.</p>
        </div>
    </div>
    <h3 class="text-center">Indique um amigo e ganhe R$ 30 de desconto</h3>
    <p class="text-center">Indicando um amigo assinante você ganha <strong>R$ 30 de desconto</strong> no seu próximo pagamento. Aproveite e compartilhe a Caixa Colonial com seus amigos nas redes sociais abaixo:</p>

    <div class="addthis">
        <div class="addthis_inline_share_toolbox text-center" data-url="https://caixacolonial.club/" data-title="Olá, acabei de assinar a Caixa Colonial. Faça parte do clube você também:"></div>
    </div>

    <p class="text-center">Caso tenha dúvidas, entre em contato conosco pelo email: <a href="mailto:contato@caixacolonial.club">contato@caixacolonial.club</a></p>


</div>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bffeb4440d31277"></script>

<?php get_footer(); ?>
