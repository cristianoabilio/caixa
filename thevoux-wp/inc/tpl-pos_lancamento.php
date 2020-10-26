<?php /* Template Name: home pos lancamento */ ?>
<?php 
add_action('wp_enqueue_scripts', 'load_home_style');
function load_home_style() {
    wp_enqueue_style('home-style', home_url("/dist/css/bootstrap.min.css?v=2"));
}
?>
<?php get_header(); ?>
<style type="text/css">
#home.lp-caixa-colonial #selecoes .item a .overlay .label {background: none;}
#home.lp-caixa-colonial #selecoes .item a .text h3 {font-family:Verdana, sans-serif; font-size: 30px; text-transform: uppercase;}
#home.lp-caixa-colonial #selecoes .item a .text h3 strong {font-size: 45px; display: block; margin-bottom:10px;}
#home.lp-caixa-colonial #produtores .item {padding: 0;}
#home.lp-caixa-colonial #header { position: relative; height: 0; padding: 0 0 43%; background: url('<?php echo home_url('/'); ?>/dist/images/foto_destaque4.jpg') no-repeat; background-size: 100%; }
#home.lp-caixa-colonial #header .container { position: absolute; left: 0; bottom: 30%; right: 0; }
#home.lp-caixa-colonial #header .slogan { margin-bottom: 20px; font-family: 'Poppins', sans-serif; font-weight: bold; text-transform:none; font-size:40px; }
#home.lp-caixa-colonial #header:after {display:none;}
#home .row {width: auto; max-width: none;} 
#home.lp-caixa-colonial .logo-midia {margin-top:60px; display: flex; align-items: center;}
#home.lp-caixa-colonial .logo-midia a {display: block; text-align:center;}
#home .title-texture {font-family: 'Poppins', sans-serif; font-weight: bold; text-transform: uppercase;}
#box-news { margin-bottom: 100px; }
#subfooter .row {width: auto; margin-left: auto; margin-right: auto;}
.progress {display: none;}
#home .btn {font-family:'Poppins', sans-serif !important; font-weight:500;}
body header a {font-family: 'Poppins', sans-serif;}
body header a:hover {text-decoration: none;}
#garantia img {display: block; margin: 20px auto;}
#garantia p {text-align: center; font-weight: bold; text-transform: uppercase;}
.icons-salame {background-image: url('<?php echo home_url('/'); ?>/dist/images/salame.png'); height:28px; width:28px;}
.container-fluid::before, .container-fluid::after, .row:before, .row:after {content: normal;}

#produtores .ec-template3 .ec-counter-item-1 .ec-count-content .ec-count-number, 
#produtores .ec-template3 .ec-counter-item-2 .ec-count-content .ec-count-number, 
#produtores .ec-template3 .ec-counter-item-3 .ec-count-content .ec-count-number, 
#produtores .ec-template3 .ec-counter-item-4 .ec-count-content .ec-count-number {font-family:'Poppins', sans-serif;}
#produtores .ec-shortcode-outer-wrap.ec-template3 .ec-count-title { font-family: Verdana, sans-serif; font-weight: normal; text-transform: none;}
.ec-shortcode-outer-wrap.ec-template3 .ec-featured-item { width: 90px; height: 50px;}
.ec-counter-item-1 .ec-featured-item {background: url('<?php echo home_url('/'); ?>/dist/images/regiao.png') no-repeat center center; background-size: 50%;) }
.ec-counter-item-2 .ec-featured-item {background: url('<?php echo home_url('/'); ?>/dist/images/produtores.png') no-repeat center center; background-size: 50%;) }
.ec-counter-item-3 .ec-featured-item {background: url('<?php echo home_url('/'); ?>/dist/images/valor.png') no-repeat center center; background-size: 50%;) }
.ec-counter-item-4 .ec-featured-item {background: url('<?php echo home_url('/'); ?>/dist/images/cliente.png') no-repeat center center; background-size: 50%;) }
.ec-counter-items-wrap {padding: 60px 0 0;}



@media (max-width: 768px){
    .img-selecoes {display:block;padding-bottom:100%;position:relative;height:0;overflow:hidden;z-index:-10;}
    .img-selecoes-inner {position:absolute;top:0;left:0;width:100%;height:100%;}
    .img-selecoes-inner img {height:100%;width:auto !important;max-width:none;margin-left:50%;-webkit-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}
    .logo-midia a {margin-bottom: 10px;}
    #home.lp-caixa-colonial #carona .image img {margin-left: 0;}
    
}
@media (max-width: 568px) {
  .ec-shortcode-outer-wrap.ec-template3.ec-responsive .ec-featured-item, .ec-shortcode-outer-wrap.ec-template4.ec-responsive .ec-featured-item {float: left}
  .ec-shortcode-outer-wrap.ec-template3.ec-responsive {width: 100%}
}
@media (max-width: 425px){
    #home.lp-caixa-colonial #header {padding-bottom: 100%; background-size: cover; background-position: center; height: 85vh;}
    #home.lp-caixa-colonial #header .container {bottom:35%;}
    #home.lp-caixa-colonial #header .slogan {font-size: 32px;}
    #home.lp-caixa-colonial #selecoes .item a .text h3 {font-size: 20px;}
    #home.lp-caixa-colonial #selecoes .item a .text h3 strong {font-size: 24px;}
    .lp-caixa-colonial #selecoes .item a .overlay .label .text-label {padding: 5px 10px; font-size:17px;}
}
</style>
<div id="home" class="lp-caixa-colonial">
    <header id="header">
      <div class="container text-xs-center">
        <h2 class="slogan">Sabores locais e artesanais do Brasil,<br>todo mês na sua casa</h2>
        <a href="<?php echo home_url('/escolha-um-plano'); ?>" class="btn btn-warning btn-lg text-uppercase track-btn-box-news-header" title="Faça parte do clube">Faça parte do clube</a>
      </div>
    </header>
    <div class="container">
        <section id="como-funciona" class="text-xs-center">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title-section h1 text-uppercase">Como funciona?</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 item curadoria text-xs-center">
                    <i class="icon icons-curadoria"></i>
                    <h3 class="h4 text-uppercase title-texture">Curadoria</h3>
                    <p>Nossa equipe, expert em cultura alimentar, percorre o país em busca de <strong>produtos típicos e artesanais</strong>.</p>
                </div>
                <div class="col-sm-12 col-md-4 item praticidade text-xs-center">
                    <i class="icon icons-assinatura"></i>
                    <h3 class="h4 text-uppercase title-texture">Seleção</h3>
				  <p>Preparamos e entregamos kits com 5 a 6 produtos locais, cada mês de um <strong>lugar diferente do Brasil</strong>.</p>
                </div>
                <div class="col-sm-12 col-md-4 item assinatura text-xs-center">
                    <i class="icon icons-praticidade"></i>
                    <h3 class="h4 text-uppercase title-texture">Entrega</h3>
				  <p>Receba os kits sem sair de casa. <strong>Frete grátis para o Sul, Sudeste e Centro-Oeste</strong>!</p>
                </div>
            </div>
        </section>
        <section id="produtos">
            <div class="row text-xs-center">
                <div class="col-xs-12">
                    <h2 class="title-section h1 text-uppercase">O que você encontra no clube?</h2>            
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-7">
                    <div class="pack pull-xs-right">
                      <img src="<?php echo home_url('/'); ?>/dist/images/pack-o-que-vc-encontra.jpg" alt="Produtos locais, naturais e orgânicos">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <ul class="list-unstyled m-t-1">
					    <li class="" title="Queijos"><i class="icon icons-embutidos-queijos"></i> Queijos premiados</li>
					    <li class="" title="Doces e geléias"><i class="icon icons-doces-geleias"></i> Doces e geleias</li>
					    <li class="" title="Embutidos"><i class="icon icons-salame"></i> Salames e embutidos</li>
                        <li class="" title="Bebidas artesanais"><i class="icon icons-bebidas"></i> Bebidas artesanais</li>
                        <li class="" title="Molhos e codimentos"><i class="icon icons-molhos-condimentos"></i> Molhos e condimentos</li>
                        <li class="" title="Conservas"><i class="icon icons-conservas"></i> Conservas e mel</li>
                        <li class="" title="Pães e biscoitos"><i class="icon icons-paes"></i> Massas e biscoitos</li>
                        <li class="" title="Cereais e farinhas"><i class="icon icons-graos-farinhas"></i> Ervas e cereais</li>
                        <li class="" title="Descontos em serviços locais"><i class="icon icons-servicos"></i> Artesanato e mimos exclusivos</li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="garantia" class="text-xs-center">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title-section h1 text-uppercase">Garantia dos nossos produtos</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <img src="<?php echo home_url('/'); ?>/dist/images/produtor.png" alt="Direto do produtor">
                    <p>Direto do produtor local</p>
                </div>
                <div class="col-md-3">
                    <img src="<?php echo home_url('/'); ?>/dist/images/artesanal.png" alt="Produção artesanal">
                    <p>Produção artesanal e familiar</p>
                </div>
                <div class="col-md-3">
                    <img src="<?php echo home_url('/'); ?>/dist/images/meio_ambiente.png" alt="Respeito ao meio ambiente">
                    <p>Respeito ao meio ambiente</p>
                </div>
                <div class="col-md-3">
                    <img src="<?php echo home_url('/'); ?>/dist/images/comida_de_verdade.png" alt="Comida de verdade, não industrializada">
                    <p>Comida de verdade,<br>não industrializada</p>
                </div>
            </div>
        </section>
          <section id="selecoes" class="text-xs-center">
            <div class="row">
              <div class="col-xs-12">
                <h2 class="title-section h1 text-uppercase">Próxima edição</h2>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-12 item">
				<a href="<?php echo home_url('/selecoes/itanhandu-mg'); ?>" class="">
                  <div class="overlay">
                    <span class="label text-uppercase">
                      <span class="text-label">Saiba mais sobre a próxima caixa</span>
                    </span>
                  </div>
                  <div class="text">
                    <h3 class="text-uppercase"><strong>Itanhandu</strong>Minas Gerais</h3>
                  </div>
                  <span class="img-selecoes">
                      <span class="img-selecoes-inner">
                          <img src="<?php echo home_url('/'); ?>dist/images/capa-itanhandu-home.jpg" alt="Itanhandu - MG">
                      </span>
                  </span>
                </a>
              </div>
            </div>
          </section>
          <section id="produtores" class="text-xs-center">
            <div class="row">
              <div class="col-xs-12">
                <h2 class="title-section h1 text-uppercase">Valorizamos o pequeno produtor local</h2>
              </div>
            </div>

            <div class="row">
              <?php echo do_shortcode("[everest_counter id='2457']"); ?>
            </div>
          </section>
      </div>
          

        <div class="container text-xs-center">
          <section id="box-news">
            <div class="row text-xs-center">
              <div class="col-xs-12">
                <h2 class="title-section h1 text-uppercase">Faça parte do clube</h2>
              </div>
            </div>

            <div class="row text-xs-center">
              <div class="col-xs-12">
                <a href="<?php echo home_url('/escolha-um-plano'); ?>" class="btn btn-warning btn-lg text-uppercase track-btn-box-news-header" title="Faça parte do clube">Escolha seu plano</a>
              </div>
            </div>
			<script src="https://fast.wistia.com/embed/medias/rg4tkreif4.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:20px;width:100%;"><span class="wistia_embed wistia_async_rg4tkreif4 popover=true popoverAnimateThumbnail=true videoFoam=true" style="display:inline-block;height:100%;width:100%">&nbsp;</span></div></div>
				<div class="row logo-midia">
                 <div class="col-md-2 offset-md-1 col-xs-6 col-sm-4">
                     <div class="row">
                         <div class="col-xs-6">
                             <a href="<?php echo home_url('/na-midia'); ?>">
                                 <img src="<?php echo home_url('/'); ?>/dist/images/sbt.png" alt="SBT">
                             </a>
                         </div>
                         <div class="col-xs-6">
                             <a href="<?php echo home_url('/na-midia'); ?>">
                                 <img src="<?php echo home_url('/'); ?>/dist/images/band.png" alt="Band">
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-2 col-xs-6 col-sm-4">
                     <a href="<?php echo home_url('/na-midia'); ?>">
                         <img src="<?php echo home_url('/'); ?>/dist/images/gazeta-do-povo.png" alt="Gazeta do Povo">
                     </a>
                 </div>
                 <div class="col-md-2 col-xs-6 col-sm-4">
                     <a href="<?php echo home_url('/na-midia'); ?>">
                         <img src="<?php echo home_url('/'); ?>/dist/images/catraca-livre.png" alt="Catraca Livre">
                     </a>
                 </div>
                 <div class="col-md-2 col-xs-6 col-sm-6">
                     <a href="<?php echo home_url('/na-midia'); ?>">
                         <img src="<?php echo home_url('/'); ?>/dist/images/logo-casa-jardim.png" alt="Revista Casa e Jardim">
                     </a>
                 </div>
                 <div class="col-md-2 col-xs-12 col-sm-6">
                     <a href="<?php echo home_url('/na-midia'); ?>">
                         <img src="<?php echo home_url('/'); ?>//dist/images/logo_draft.png" alt="Projeto Draft">
                     </a>
                 </div>
             </div>
          </section>
        </div>
     
</div>
<script src="<?php echo home_url('/'); ?>/dist/js/tether.min.js"></script>
<script src="<?php echo home_url('/'); ?>/dist/js/bootstrap.min.js"></script>
<script src="<?php echo home_url('/'); ?>/dist/js/app.js"></script>
<script type="text/javascript">
window.cfields = [];
window._show_thank_you = function(id, message, trackcmp_url) {
  var form = document.getElementById('_form_' + id + '_'), thank_you = form.querySelector('._form-thank-you');
  form.querySelector('._form-content').style.display = 'none';
  thank_you.innerHTML = message;
  thank_you.style.display = 'block';
  if (typeof(trackcmp_url) != 'undefined' && trackcmp_url) {
    // Site tracking URL to use after inline form submission.
    _load_script(trackcmp_url);
  }
  if (typeof window._form_callback !== 'undefined') window._form_callback(id);
};
window._show_error = function(id, message, html) {
  var form = document.getElementById('_form_' + id + '_'), err = document.createElement('div'), button = form.querySelector('button'), old_error = form.querySelector('._form_error');
  if (old_error) old_error.parentNode.removeChild(old_error);
  err.innerHTML = message;
  err.className = '_error-inner _form_error _no_arrow';
  var wrapper = document.createElement('div');
  wrapper.className = '_form-inner';
  wrapper.appendChild(err);
  button.parentNode.insertBefore(wrapper, button);
  if (html) {
    var div = document.createElement('div');
    div.className = '_error-html';
    div.innerHTML = html;
    err.appendChild(div);
  }
};
window._load_script = function(url, callback) {
    var head = document.querySelector('head'), script = document.createElement('script'), r = false;
    script.type = 'text/javascript';
    script.charset = 'utf-8';
    script.src = url;
    if (callback) {
      script.onload = script.onreadystatechange = function() {
      if (!r && (!this.readyState || this.readyState == 'complete')) {
        r = true;
        callback();
        }
      };
    }
    head.appendChild(script);
};
(function() {
  if (window.location.search.search("excludeform") !== -1) return false;
  var getCookie = function(name) {
    var match = document.cookie.match(new RegExp('(^|; )' + name + '=([^;]+)'));
    return match ? match[2] : null;
  }
  var setCookie = function(name, value) {
    var now = new Date();
    var time = now.getTime();
    var expireTime = time + 1000 * 60 * 60 * 24 * 365;
    now.setTime(expireTime);
    document.cookie = name + '=' + value + '; expires=' + now + ';path=/';
  }
      var addEvent = function(element, event, func) {
    if (element.addEventListener) {
      element.addEventListener(event, func);
    } else {
      var oldFunc = element['on' + event];
      element['on' + event] = function() {
        oldFunc.apply(this, arguments);
        func.apply(this, arguments);
      };
    }
  }
  var _removed = false;
  var form_to_submit = document.getElementById('_form_1_');
  var allInputs = form_to_submit.querySelectorAll('input, select, textarea'), tooltips = [], submitted = false;

  var getUrlParam = function(name) {
    var regexStr = '[\?&]' + name + '=([^&#]*)';
    var results = new RegExp(regexStr, 'i').exec(window.location.href);
    return results != undefined ? decodeURIComponent(results[1]) : false;
  };

  for (var i = 0; i < allInputs.length; i++) {
    var regexStr = "field\\[(\\d+)\\]";
    var results = new RegExp(regexStr).exec(allInputs[i].name);
    if (results != undefined) {
      allInputs[i].dataset.name = window.cfields[results[1]];
    } else {
      allInputs[i].dataset.name = allInputs[i].name;
    }
    var fieldVal = getUrlParam(allInputs[i].dataset.name);

    if (fieldVal) {
      if (allInputs[i].type == "radio" || allInputs[i].type == "checkbox") {
        if (allInputs[i].value == fieldVal) {
          allInputs[i].checked = true;
        }
      } else {
        allInputs[i].value = fieldVal;
      }
    }
  }

  var remove_tooltips = function() {
    for (var i = 0; i < tooltips.length; i++) {
      tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
    }
      tooltips = [];
  };
  var remove_tooltip = function(elem) {
    for (var i = 0; i < tooltips.length; i++) {
      if (tooltips[i].elem === elem) {
        tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
        tooltips.splice(i, 1);
        return;
      }
    }
  };
  var create_tooltip = function(elem, text) {
    var tooltip = document.createElement('div'), arrow = document.createElement('div'), inner = document.createElement('div'), new_tooltip = {};
    if (elem.type != 'radio' && elem.type != 'checkbox') {
      tooltip.className = '_error';
      arrow.className = '_error-arrow';
      inner.className = '_error-inner';
      inner.innerHTML = text;
      tooltip.appendChild(arrow);
      tooltip.appendChild(inner);
      elem.parentNode.appendChild(tooltip);
    } else {
      tooltip.className = '_error-inner _no_arrow';
      tooltip.innerHTML = text;
      elem.parentNode.insertBefore(tooltip, elem);
      new_tooltip.no_arrow = true;
    }
    new_tooltip.tip = tooltip;
    new_tooltip.elem = elem;
    tooltips.push(new_tooltip);
    return new_tooltip;
  };
  var resize_tooltip = function(tooltip) {
    var rect = tooltip.elem.getBoundingClientRect();
    var doc = document.documentElement, scrollPosition = rect.top - ((window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0));
    if (scrollPosition < 40) {
      tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _below';
    } else {
      tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _above';
    }
  };
  var resize_tooltips = function() {
    if (_removed) return;
    for (var i = 0; i < tooltips.length; i++) {
      if (!tooltips[i].no_arrow) resize_tooltip(tooltips[i]);
    }
  };
  var validate_field = function(elem, remove) {
    var tooltip = null, value = elem.value, no_error = true;
    remove ? remove_tooltip(elem) : false;
    if (elem.type != 'checkbox') elem.className = elem.className.replace(/ ?_has_error ?/g, '');
    if (elem.getAttribute('required') !== null) {
      if (elem.type == 'radio' || (elem.type == 'checkbox' && /any/.test(elem.className))) {
        var elems = form_to_submit.elements[elem.name];
        no_error = false;
        for (var i = 0; i < elems.length; i++) {
          if (elems[i].checked) no_error = true;
        }
        if (!no_error) {
          tooltip = create_tooltip(elem, "Please select an option.");
        }
      } else if (elem.type =='checkbox') {
        var elems = form_to_submit.elements[elem.name], found = false, err = [];
        no_error = true;
        for (var i = 0; i < elems.length; i++) {
          if (elems[i].getAttribute('required') === null) continue;
          if (!found && elems[i] !== elem) return true;
          found = true;
          elems[i].className = elems[i].className.replace(/ ?_has_error ?/g, '');
          if (!elems[i].checked) {
            no_error = false;
            elems[i].className = elems[i].className + ' _has_error';
            err.push("Checking %s is required".replace("%s", elems[i].value));
          }
        }
        if (!no_error) {
          tooltip = create_tooltip(elem, err.join('<br/>'));
        }
      } else if (elem.tagName == 'SELECT') {
        var selected = true;
        if (elem.multiple) {
          selected = false;
          for (var i = 0; i < elem.options.length; i++) {
            if (elem.options[i].selected) {
              selected = true;
              break;
            }
          }
        } else {
          for (var i = 0; i < elem.options.length; i++) {
            if (elem.options[i].selected && !elem.options[i].value) {
              selected = false;
            }
          }
        }
        if (!selected) {
          no_error = false;
          tooltip = create_tooltip(elem, "Please select an option.");
        }
      } else if (value === undefined || value === null || value === '') {
        elem.className = elem.className + ' _has_error';
        no_error = false;
        tooltip = create_tooltip(elem, "This field is required.");
      }
    }
    if (no_error && elem.name == 'email') {
      if (!value.match(/^[\+_a-z0-9-'&=]+(\.[\+_a-z0-9-']+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i)) {
        elem.className = elem.className + ' _has_error';
        no_error = false;
        tooltip = create_tooltip(elem, "Enter a valid email address.");
      }
    }
    if (no_error && /date_field/.test(elem.className)) {
      if (!value.match(/^\d\d\d\d-\d\d-\d\d$/)) {
        elem.className = elem.className + ' _has_error';
        no_error = false;
        tooltip = create_tooltip(elem, "Enter a valid date.");
      }
    }
    tooltip ? resize_tooltip(tooltip) : false;
    return no_error;
  };
  var needs_validate = function(el) {
    return el.name == 'email' || el.getAttribute('required') !== null;
  };
  var validate_form = function(e) {
    var err = form_to_submit.querySelector('._form_error'), no_error = true;
    if (!submitted) {
      submitted = true;
      for (var i = 0, len = allInputs.length; i < len; i++) {
        var input = allInputs[i];
        if (needs_validate(input)) {
          if (input.type == 'text') {
            addEvent(input, 'input', function() {
              validate_field(this, true);
            });
          } else if (input.type == 'radio' || input.type == 'checkbox') {
            (function(el) {
              var radios = form_to_submit.elements[el.name];
              for (var i = 0; i < radios.length; i++) {
                addEvent(radios[i], 'click', function() {
                  validate_field(el, true);
                });
              }
            })(input);
          } else if (input.tagName == 'SELECT') {
            addEvent(input, 'change', function() {
              validate_field(input, true);
            });
          }
        }
      }
    }
    remove_tooltips();
    for (var i = 0, len = allInputs.length; i < len; i++) {
      var elem = allInputs[i];
      if (needs_validate(elem)) {
        validate_field(elem) ? true : no_error = false;
      }
    }
    if (!no_error && e) {
      e.preventDefault();
    }
    resize_tooltips();
    return no_error;
  };
  addEvent(window, 'resize', resize_tooltips);
  addEvent(window, 'scroll', resize_tooltips);
  window._old_serialize = null;
  if (typeof serialize !== 'undefined') window._old_serialize = window.serialize;
  _load_script("//d3rxaij56vjege.cloudfront.net/form-serialize/0.3/serialize.min.js", function() {
    window._form_serialize = window.serialize;
    if (window._old_serialize) window.serialize = window._old_serialize;
  });
  var form_submit = function(e) {
    e.preventDefault();
    if (validate_form()) {
            var serialized = _form_serialize(document.getElementById('_form_1_'));
      var err = form_to_submit.querySelector('._form_error');
      err ? err.parentNode.removeChild(err) : false;
      _load_script('https://caixacolonial.activehosted.com/proc.php?' + serialized + '&jsonp=true');
    }
    return false;
  };
  addEvent(form_to_submit, 'submit', form_submit);
})();
</script>
<?php get_footer(); ?>
