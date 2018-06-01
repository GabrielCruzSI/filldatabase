<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 06/05/18
 * Time: 20:40
 */

namespace FillDataBase;

require_once '../autoload.php';

/**
 * Class Ajax
 */
abstract class Ajax
{

    /**
     * @var
     */
    private $function;

    /**
     * @var
     */
    private $params;

    /**
     * Ajax constructor.
     */
    public function __construct()
    {
        //Pega o nome da função via GET
        $this->function = $_GET['function'];

        //Só prepara os parâmetros e existir parâmetros
        if (isset($_POST['params'])) {
            //Pega os parâmetros via POST
            $this->params   = $_POST['params'];

            //Prepara a chamada da função
            $this->functionPrepare();

            //Chama a função de fato
            $this->{$this->function}($this->params);
        } else {

            //Chama a função de fato
            $this->{$this->function}();
        }
    }

    /**
     *
     */
    public function functionPrepare()
    {
        //Variável Temporária
        $temp = "";

        //Põe todos os parâmetros na temporária separados por virgula
        foreach ($this->params as $param) {
            $temp .= " $param,";
        }

        //Procura a posição da última ocorrência da vírgula
        $last = strripos($temp, ",");

        //Onde ficarão os parâmetros
        $params = "";

        //Verifica se a última posição é de fato uma vírgula. Se sim, põe a string sem a vírgula em $params
        if ($temp[$last] === ',') {
            $params = substr($temp, 0, $last);
        }

        //Por fim armazena os parâmetros em $this->params
        $this->params = $params;
    }
}