<?php
require_once ("conexao/conexaoDB.php");

$con = conexaoDB::getConexao();

$acao = $_REQUEST["acao"];
$return = array();

if($acao == ""){
    $query = "select 
    meta_id,
     meta,
      usuario_id, 
      usuario";


    $consulta = $con->prepare($query);
    $consulta->execute();

    while($data = $consulta->fetch(PDO::FETCH_ASSOC));
    {
    $return[] = array(
        "id_meta" => $data["id_meta"],
        "id_usuario" => $data["id_usuario"],

    );
}
}

die(json_encode(($return)));










?>