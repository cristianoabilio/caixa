<?php /* Template Name: home */ ?>
<?php 
add_action('wp_enqueue_scripts', 'load_home_style');
function load_home_style() {
    wp_enqueue_style('home-style', home_url("/dist/css/bootstrap.min.css?v=2"));
}
?>
<?php get_header(); ?>
<style type="text/css">
#home.lp-caixa-colonial #selecoes .item a .overlay .label {background: none;}
#home.lp-caixa-colonial #header { position: relative; height: 0; padding: 0 0 43%; background: url('<?php echo home_url('/'); ?>/dist/images/caixa-colonial-home.jpg') no-repeat; background-size: 100%; }
#home.lp-caixa-colonial #header .container { position: absolute; left: 0; bottom: 60px; right: 0; }
#home.lp-caixa-colonial #header .slogan { margin-bottom: 20px; }
#home .row{width: auto; max-width: none;} 
#box-news { margin-bottom: 100px; }
#subfooter .row {width: auto; margin-left: auto; margin-right: auto;}
.progress {display: none;}
body header a {font-family: 'Poppins', sans-serif;}
body header a:hover {text-decoration: none;}
@media (max-width: 768px){#home.lp-caixa-colonial #carona .image img {margin-left: 0;}}
@media (max-width: 425px){#home.lp-caixa-colonial #header {padding-bottom: 100%; background-size: cover; background-position: center;}}
</style>
<div id="home" class="lp-caixa-colonial">
    <header id="header">
      <div class="container text-xs-center">
        <h2 class="slogan text-uppercase">Produtos locais e artesanais, todo mês, na porta de casa</h2>
        <a href="#box-news" class="btn btn-warning btn-lg text-uppercase trigger-scroll track-btn-box-news-header" title="Ganhe 15% de desconto e concorra a uma caixa GRÁTIS todo mês">Faça parte do clube</a>
      </div>
    </header>
    <div class="container">
        <section id="produtos">
            <div class="row text-xs-center">
                <div class="col-xs-12">
                    <h2 class="title-section h1 text-uppercase">O que você encontra na caixa?</h2>            
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-7">
                    <div class="pack pull-xs-right">
                      <img src="<?php echo home_url('/'); ?>/dist/images/pack.png" alt="Produtos locais, naturais e orgânicos">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <ul class="list-unstyled m-t-1">
                        <li class="" title="Bebidas artesanais"><i class="icon icons-bebidas"></i> Bebidas artesanais</li>
                        <li class="" title="Molhos e codimentos"><i class="icon icons-molhos-condimentos"></i> Molhos e condimentos</li>
                        <li class="" title="Conservas"><i class="icon icons-conservas"></i> Conservas</li>
                        <li class="" title="Doces e geléias"><i class="icon icons-doces-geleias"></i> Doces e geléias</li>
                        <li class="" title="Pães e biscoitos"><i class="icon icons-paes"></i> Pães e biscoitos</li>
                        <li class="" title="Grãos e farinhas"><i class="icon icons-graos-farinhas"></i> Grãos e farinhas</li>
                        <li class="" title="Embutidos e queijos"><i class="icon icons-embutidos-queijos"></i> Embutidos e queijos</li>
                        <li class="" title="Artesanato"><i class="icon icons-bebidas"></i> Artesanato</li>
                        <li class="" title="Descontos em serviços locais"><i class="icon icons-servicos"></i> Descontos em serviços locais</li>
                    </ul>
                </div>
            </div>
        </section>
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
                    <p>Nossa equipe, expert em gastronomia, viaja o Brasil para encontrar <strong>os melhores produtos locais</strong> para você.</p>
                </div>
                <div class="col-sm-12 col-md-4 item praticidade text-xs-center">
                    <i class="icon icons-assinatura"></i>
                    <h3 class="h4 text-uppercase title-texture">Diversidade</h3>
                    <p>Todo mês preparamos uma caixa com no mínimo <strong>5 produtos exclusivos</strong>, sempre de uma região diferente.</p>
                </div>
                <div class="col-sm-12 col-md-4 item assinatura text-xs-center">
                    <i class="icon icons-praticidade"></i>
                    <h3 class="h4 text-uppercase title-texture">Comodidade</h3>
                    <p>Assine e receba em casa, junto com a <strong>história dos produtores</strong> e dicas de turismo local. Entrega em todo país.</p>
                </div>
            </div>
        </section>
        
          <section id="selecoes" class="text-xs-center">
            <div class="row">
              <div class="col-xs-12">
                <h2 class="title-section h1 text-uppercase">Cada mês uma região diferente</h2>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-4 item">
                <a href="#box-news" class="trigger-scroll track-item-selecoes">
                  <div class="overlay">
                    <span class="label text-uppercase">
                      <span class="text-label">Seja avisado <br>e ganhe 15% de desconto</span>
                    </span>
                  </div>
                  <div class="text">
                    <h3 class="text-uppercase">Morretes - PR</h3>
                  </div>
                  <img src="<?php echo home_url('/'); ?>/dist/images/morretes.jpg" alt="Morretes - PR">
                </a>
              </div>

              <div class="col-sm-12 col-md-4 item">
                <a href="#box-news" class="trigger-scroll track-item-selecoes">
                  <div class="overlay">
                    <span class="label text-uppercase">
                      <span class="text-label">Seja avisado <br>e ganhe 15% de desconto</span>
                    </span>
                  </div>
                  <div class="text">
                    <h3 class="text-uppercase">Colônia Witmarsum - PR</h3>
                  </div>
                  <img src="<?php echo home_url('/'); ?>/dist/images/palmeira.jpg" alt="Colônia Witmarsum - PR">
                </a>
              </div>

              <div class="col-sm-12 col-md-4 item">
                <a href="#box-news" class="trigger-scroll track-item-selecoes">
                  <div class="overlay">
                    <span class="label text-uppercase">
                      <span class="text-label">Seja avisado <br>e ganhe 15% de desconto</span>
                    </span>
                  </div>
                  <div class="text">
                    <h3 class="text-uppercase">Joinville - SC</h3>
                  </div>
                  <img src="<?php echo home_url('/'); ?>/dist/images/joinville.jpg" alt="Joinville - SC">
                </a>
              </div>
            </div>
          </section>

          <section id="produtores" class="text-xs-center">
            <div class="row">
              <div class="col-xs-12">
                <h2 class="title-section h1 text-uppercase">Conectamos produtores locais até você</h2>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4 item">
                <img src="<?php echo home_url('/'); ?>/dist/images/produtor-marilei.png" alt="Marilei Cândido A. - Colônia Cecília - Palmeira - PR">
                <h3 class="nome h6 font-weight-bold d-block m-t-1">Marilei Cândido A.</h3>
                <small class="estabelecimento d-inline-block">Vinhos e Sucos</small>
                <small class="local d-block"><i class="fa fa-map-marker text-danger"></i> Colônia Cecília - PR</small>
              </div>

              <div class="col-sm-4 item">
                <img src="<?php echo home_url('/'); ?>/dist/images/produtor-tadeu.png" alt="Tadeu Kowalsky - Colônia Santa Bárbara - Palmeira - PR">
                <h3 class="nome h6 font-weight-bold d-block m-t-1">Tadeu Kowalsky</h3>
                <small class="estabelecimento d-inline-block">Erva Mate Orgânica</small>
                <small class="local d-block"><i class="fa fa-map-marker text-danger"></i> Colônia Santa Bárbara - PR</small>
              </div>

              <div class="col-sm-4 item">
                <img src="<?php echo home_url('/'); ?>/dist/images/produtor-edeltraude.png" alt="Edeltraude Lowen G. - Colônia Witmarsum - Palmeira - PR">
                <h3 class="nome h6 font-weight-bold d-block m-t-1">Edeltraude Lowen G.</h3>
                <small class="estabelecimento d-inline-block">Geléias e Doces</small>
                <small class="local d-block"><i class="fa fa-map-marker text-danger"></i> Colônia Witmarsum - PR</small>
              </div>
            </div>
          </section>
        </div>

        <section id="carona" class="text-xs-center">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h2 class="title-section h1 text-uppercase">Pegue carona com a gente</h2>
                <p>Acompanhe no <a href="<?php echo home_url('/'); ?>/blog/" target="_blank">blog</a> nossa expedição em busca dos melhores produtos locais.</p>
              </div>
            </div>
          </div>

          <!-- <div class="background"></div> -->
          <a href="<?php echo home_url('/'); ?>/blog/" target="_blank"  class="image">
            <div class="group-btn">
              <span class="btn-square">Acesse o Blog</span>
            </div>
            <img src="<?php echo home_url('/'); ?>/dist/images/carona-kombi-caixa-colonial.jpg" alt="Pegue carona com a gente">
          </a>
        </section>

        <div class="container">
          <section id="box-news">
            <div class="row text-xs-center">
              <div class="col-xs-12">
                <h2 class="title-section h1 text-uppercase">PRÉ-LANÇAMENTO</h2>
              </div>
            </div>

            <div class="row optin text-xs-center">
              <div class="col-xs-12">
                <i class="icons-box box"></i>
                <h3 class="h4 title text-uppercase m-b-1">Ganhe 15% de desconto e concorra a uma caixa GRÁTIS todo mês</h3>

                <!-- <form action="" class="form-inline">
                  <input type="text" placeholder="Nome" class="form-control">
                  <input type="text" placeholder="Email" class="form-control">
                  <button type="submit" class="btn btn-warning text-uppercase" title="Cadastre-se">Cadastre-se</button>
                </form> -->

                <form method="POST" action="https://caixacolonial.activehosted.com/proc.php" id="_form_1_" class="_form _form_1 _inline-form _inline-style _dark" novalidate>
                  <input type="hidden" name="u" value="1" />
                  <input type="hidden" name="f" value="1" />
                  <input type="hidden" name="s" />
                  <input type="hidden" name="c" value="0" />
                  <input type="hidden" name="m" value="0" />
                  <input type="hidden" name="act" value="sub" />
                  <input type="hidden" name="v" value="2" />
                  <div class="_form-content">
                    <div class="_form_element _x59868378 _inline-style">
                      <div class="_field-wrapper">
                        <input type="text" name="fullname" placeholder="Nome" class="form-control" required />
                      </div>
                    </div>
                    <div class="_form_element _x81799530 _inline-style">
                      <div class="_field-wrapper">
                        <input type="text" name="email" placeholder="Email" class="form-control" required />
                      </div>
                    </div>
                    <div class="_button-wrapper _inline-style">
                      <button id="_form_1_submit" class="_submit btn btn-warning text-uppercase" type="submit" title="Cadastre-se">Cadastre-se</button>
                    </div>
                    <div class="_clear-element"></div>
                  </div>
                  <div class="_form-thank-you" style="display:none;">
                  </div>
                </form>
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
