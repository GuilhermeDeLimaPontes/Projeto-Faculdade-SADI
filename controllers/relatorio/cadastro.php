<?php
    require_once '../../classes/Motorista.php';
    require_once '../../classes/Endereco.php';
    require_once '../../classes/Ocorrencia.php';
    require_once '../../classes/Origem.php';
    require_once '../../classes/Paciente.php';
    

    //tratamento dos inputs do tipo text
    if(isset($_POST['cadastrar'])){ 
        session_start();
        
            $nome_solicitante = $_POST['NomeSolicitante'];
            $natureza_ocorrencia = $_POST['naturezaOcorrencia'];
            $amb = $_POST['amb'];
            $ra = $_POST['RA'];
            $km_inicial = $_POST['kmInicial'];
            $km_final = $_POST['kmFinal'];
            $km_rodado = $_POST['kmRodado'];
            $nome_paciente = $_POST['NomePaciente'];
            $rg = $_POST['rg'];
            $cartao_sus = $_POST['cartao_sus'];
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $bairro = $_POST['bairro'];
            $observacao = $_POST['observacao'];
            $destino = $_POST['destino'];
            $motorista = $_POST['motorista'];
            $data_fato = $_POST['dataFato'];
            $hora_comunicacao = $_POST['HoraComunicacao'];
            $solicitamento = $_POST['solicitamento'];
            $hora_fato = $_POST['horaFato'];
            $hora_local = $_POST['horaLocal'];
            $hora_final = $_POST['horaFinal'];
            $sexo = $_POST['sexo'];
            $data_nascimento = $_POST['dataNascimento'];
            $estado  = $_POST['estado'];
            $numero = $_POST['numero'];

            

            
                $motorista = new Motorista();
                $paciente = new Paciente();
                $origem = new Origem();
                $ocorrencia = new Ocorrencia();
                $endereco_paciente = new Endereco();
        
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
                     
    
                
                header("location: ../../views/cadastro-relatorio.php");

     }

?>