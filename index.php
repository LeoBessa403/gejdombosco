<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
    <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
    <input type="hidden" name="code" value="260936F67F7F02AEE44D7F9E29D1226E" />
    <input type="hidden" name="iot" value="button" />
    <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
<?php
    $url = (isset($_GET['url']) && $_GET['url'] != "" ? $_GET['url'] : "web");

    $url = explode("/", $url);

    if($url[0] == "admin"):
        include './admin/sistema.php';
    else:
        include './web/web.php';
    endif;
?>