<?php
    require_once '../../classes/Paciente.php';
    require_once '../../classes/Endereco.php';

    if(isset($_POST['btn-update']))
    {
        $paciente =  new Paciente();
        $endereco =  new Endereco();

        $id_paciente = $_POST['id_paciente'];
        //DADOS DO PACIENTE: NÃO ESQUEÇER DE VALIDAR **************************************
        $nome_update = $_POST['NomePaciente_update'];
        $data_nasc_update = $_POST['dataNascimento_update'];
        $rg_update = $_POST['rg_update'];
        $cartao_sus_update = $_POST['cartao_sus_update'];
        $sexo_update = $_POST['sexo_update'];
        $observacao_update = $_POST['observacao_update'];


        $id_endereco = $_POST['id_endereco'];
        //DADOS DO ENDERECO: NÃO ESQUEÇER DE VALIDAR **************************************
        $endereco_update = $_POST['endereco_update'];
        $numero_update = $_POST['numero_update'];
        $cidade_update = $_POST['cidade_update'];
        $estado_update = $_POST['estado_update'];
        $bairro_update = $_POST['bairro_update'];




        $paciente->__set('nome', $nome_update);
        $paciente->__set('data_nascimento', $data_nasc_update);
        $paciente->__set('sexo', $sexo_update);
        $paciente->__set('observacao', $observacao_update);
        $paciente->__set('rg', $rg_update);
        $paciente->__set('cartao_sus', $cartao_sus_update);

        $endereco->__set('numero', $numero_update);
        $endereco->__set('bairro', $bairro_update);
        $endereco->__set('rua', $endereco_update);
        $endereco->__set('estado', $estado_update);
        $endereco->__set('cidade', $cidade_update);

        $paciente->editar($id_paciente);
        $endereco->editar($id_endereco);

        header("location: ../../views/relatorios.php");
    }

?>