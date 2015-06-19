<?php
  include_once 'conn.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
   <title>Form com Passos</title>
   <link rel="shortcut icon" href='http://www.serdemkimya.com/img/bottom_img_2.png' />
   <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">-->
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="keywords" content="[!] Devl0ped By Cah0s [!]">
   <meta name="description" content="[!] Devel0ped By Cah0s [!]">
   <link href='http://fonts.googleapis.com/css?family=Orbitron:700|Graduate|Aldrich|Nova+Square' rel='stylesheet' type='text/css'>
   <link href="css/style.css" rel="stylesheet" type="text/css" />
  </head>

<body>

<!-- Camada de mensagens -->
<div class="titulo"><span class='text-small'>==[ Mensagens de erro ou verificação ]==<div class='divider-arrow'></div></span></div>
<div class="mens"><div class="resp"></div></div>
<!-- /mensagens -->

<!-- formulario -->
 <form id="formulario" method="POST" enctype="multipart/form-data" name="formulario">
   <ul id="progress">
    <li class="ativo">Configurações</li>
    <li>Perfis Pessoas</li>
    <li>Detalhes</li>
   </ul>

   <fieldset>
    <h2>Configurações da Conta</h2>
    <h3>Algumas Configurações</h3>
    <input type="text" name="empresa" placeholder="Nome da Empresa" />
    <input type="text" name="end" placeholder="Endereço da Empresa" />
    <input type="text" name="email" placeholder="Email da Empresa" />
    <input type="button" name="next1" class="next acao" value="Proximo" />
   </fieldset>

   <fieldset>
    <h2>Perfils Pessoais</h2>
    <h3>Redes sociais</h3>
    <input type="text" name="facebook" class="web" placeholder="Seu Facebook" />
    <input type="text" name="twitter" class="web" placeholder="Seu Twitter" />
    <input type="text" name="google" placeholder="Seu Google+" />
    <input type="button" name="prev" class="prev acao" value="Voltar" />
    <input type="button" name="next2" class="next acao" value="Proximo" />
   </fieldset>

   <fieldset>
    <h2>Detalhes Pessoais</h2>
    <h3>Informe seus Dados</h3>
    <input type="text" name="nome" placeholder="Seu Nome" />
    <input type="text" name="sobrenome" placeholder="Sobrenme" />
    <input type="text" name="telefone" class="foneddd" placeholder="Um Telefone" />
    <input type="button" name="prev" class="prev acao" value="Voltar" />
    <input type="submit" name="next" class="acao" value="Enviar" />
   </fieldset>
 </form>
<!-- /formulario -->
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <script type="text/javascript" src="js/function.js"></script>
 <script src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="http://igorescobar.github.io/jQuery-Mask-Plugin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<script type="text/javascript">
  $(function() {
    $('.data').mask('00/00/0000');
    $('.hora').mask('00:00:00');
    $('.data_hora').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.fone').mask('0000-0000');
    $('.foneddd').mask('(00) 0000-00000');
    $('.place').mask("(00) 0000-00000", {placeholder: "(__) ____-_____"});
    $('.web').mask('http://');
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', {reverse: true});
    $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/, 
          fallback: '/'
        }, 
        placeholder: "__/__/____"
      }
    });

    $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});

    $('.cep_with_callback').mask('00000-000', {onComplete: function(cep) {
        console.log('Mask is done!:', cep);
      },
       onKeyPress: function(cep, event, currentField, options){
        console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField.attr('class'), ' options: ', options);
      },
      onInvalid: function(val, e, field, invalid, options){
        var error = invalid[0];
        console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
      }
    });

    $('.crazy_cep').mask('00000-000', {onKeyPress: function(cep, e, field, options){
      var masks = ['00000-000', '0-00-00-00'];
        mask = (cep.length>7) ? masks[1] : masks[0];
      $('.crazy_cep').mask(mask, options);
    }});

    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.money').mask('#.##0,00', {reverse: true});

    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.sp_celphones').mask(SPMaskBehavior, spOptions);

    $(".bt-mask-it").click(function(){
      $(".mask-on-div").mask("000.000.000-00");
      $(".mask-on-div").fadeOut(500).fadeIn(500)
    })

    $('pre').each(function(i, e) {hljs.highlightBlock(e)});
  });
</script>
</body>
</html>
