<?php
    require_once '../../classes/Motorista.php';
    require_once '../../classes/Endereco.php';
    require_once '../../classes/Ocorrencia.php';
    require_once '../../classes/Origem.php';
    require_once '../../classes/Paciente.php';
    require_once '../../classes/Ocorrencia_Motorista.php';
    
    

    if(isset($_POST['cadastrar']))
    { 

            //tratamento dos inputs Endereço
            $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
            $endereco = filter_input(INPUT_POST,'endereco', FILTER_SANITIZE_STRING);
            $cidade = filter_input(INPUT_POST,'cidade', FILTER_SANITIZE_STRING);
            $estado  = filter_input(INPUT_POST,'estado', FILTER_SANITIZE_STRING);
            $numero = filter_input(INPUT_POST,'numero', FILTER_SANITIZE_NUMBER_INT);
            
            //tratamento dos inputs  Origem
            $nome_solicitante = filter_input(INPUT_POST,'NomeSolicitante', FILTER_SANITIZE_STRING);
            $hora_comunicacao = addslashes($_POST['HoraComunicacao']);
            $solicitamento = addslashes($_POST['solicitamento']);
            $data_fato = addslashes($_POST['dataFato']);

            //tratamento dos inputs Paciente
            $nome_paciente = filter_input(INPUT_POST, 'NomePaciente', FILTER_SANITIZE_STRING);
            $data_nascimento = $_POST['dataNascimento'];
            $sexo = addslashes($_POST['sexo']);
            $observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);
            $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
            $cartao_sus = filter_input(INPUT_POST, 'cartao_sus', FILTER_SANITIZE_STRING);

            //tratamento dos inputs Ocorrência
            $natureza_ocorrencia = filter_input(INPUT_POST, 'naturezaOcorrencia', FILTER_SANITIZE_STRING); 
            $amb = filter_input(INPUT_POST, 'amb', FILTER_SANITIZE_STRING);
            $ra = filter_input(INPUT_POST, 'RA', FILTER_SANITIZE_STRING);
            $km_inicial = filter_input(INPUT_POST,'kmInicial', FILTER_SANITIZE_NUMBER_INT);
            $km_final = filter_input(INPUT_POST,'kmFinal', FILTER_SANITIZE_NUMBER_INT);
            $km_rodado = filter_input(INPUT_POST,'kmRodado', FILTER_SANITIZE_NUMBER_INT);
            $destino = filter_input(INPUT_POST, 'destino', FILTER_SANITIZE_STRING);
            $hora_fato = addslashes($_POST['horaFato']);
            $hora_local = addslashes($_POST['horaLocal']);
            $hora_final = addslashes($_POST['horaFinal']);
            
            
                $motorista = new Motorista();
                $paciente = new Paciente();
                $origem = new Origem();
                $ocorrencia = new Ocorrencia();
                $endereco_paciente = new Endereco();
                $ocorrencia_motorista = new Ocorrencia_Motorista();
        
                $endereco_paciente->__set('numero', $numero);
                $endereco_paciente->__set('bairro', $bairro);
                $endereco_paciente->__set('rua', $endereco);
                $endereco_paciente->__set('cidade', $cidade);
                $endereco_paciente->__set('estado', $estado);
                

                $origem->__set('nome_solicitante',$nome_solicitante);
                $origem->__set('hora_comunicacao',$hora_comunicacao);
                $origem->__set('solicitamento',$solicitamento);
                $origem->__set('data_fato', $data_fato);
                
                
                $paciente->__set('nome',$nome_paciente);
                $paciente->__set('data_nascimento',$data_nascimento);
                $paciente->__set('sexo',$sexo);
                $paciente->__set('observacao',$observacao);
                $paciente->__set('rg',$rg);
                $paciente->__set('cartao_sus',$cartao_sus);
                $paciente->__set('fk_id_endereco', $endereco_paciente->getLastIdEndereco());
            
                $ocorrencia->__set('destino',$destino);
                $ocorrencia->__set('hora_final',$hora_final);
                $ocorrencia->__set('hora_fato',$hora_fato);
                $ocorrencia->__set('hora_local',$hora_local);
                $ocorrencia->__set('km_inicial',$km_inicial);
                $ocorrencia->__set('km_rodado',$km_rodado);
                $ocorrencia->__set('km_final',$km_final);
                $ocorrencia->__set('prefixo_amb',$amb);
                $ocorrencia->__set('nat_ocorrencia',$natureza_ocorrencia);
                $ocorrencia->__set('ra',$ra);
                $ocorrencia->__set('fk_id_paciente',$paciente->getLastIdPaciente());
                $ocorrencia->__set('fk_id_origem',$origem->getLastIdOrigem());
 

                try{
                    $endereco_paciente->cadastrar();
                }catch(Exception $e){
                    echo "Erro Genérico".$e->getMessage();
                }

                try{
                    $origem->cadastrar();
                }catch(Exception $e){
                    echo "Erro Genérico".$e->getMessage();
                }

                try{
                    $paciente->cadastrar();
                }catch(Exception $e){
                    echo "Erro Genérico".$e->getMessage();
                }

                try{
                    $ocorrencia->cadastrar();
                }catch(Exception $e){
                    echo "Erro Genérico".$e->getMessage();
                }

                if(isset($_POST['check_motorista']))
                {
                    $dados_checkbox = array_values($_POST['check_motorista']);

                    for($i = 0; $i < count($dados_checkbox); $i++)
                    {
                        $ocorrencia_motorista->__set('id_ocorrencia', $ocorrencia->getLastIdOcorrencia());
                        $ocorrencia_motorista->__set('id_motorista', intval($dados_checkbox[$i]));
                        $ocorrencia_motorista->cadastrar();
                    }
                    
                }

                header("location: ../../views/cadastro-relatorio.php");

     }

?>