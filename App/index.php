<?php 

//Parse_url vai receber dois parametros, uma url e o que que voce quer pegar dela
//$_SERVER['REQUEST_URI'] vai pegar o que o user esta tentando acessar, essa variavel e interna do php, pegando o endereco interio 
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url)
{
    case '/':
        echo'Pagina Inicial';
    break;
    
    case '/pessoa':
        echo'Listagem de pessoas';
    break;

    case '/pessoa/form':
        echo'Formulario para salvar pessoa';
    break;

    //Default funciona com um erro 404
    default:
        echo'Erro 404';
    break;
}
