<?php

    require_once 'fpdf/fpdf.php';
    require_once '../classes/Ocorrencia.php';
    require_once '../classes/Motorista.php';

    $motorista = new Motorista();
    $motorista::verificarLogin();

    if(isset($_GET['id_paciente']) && isset($_GET['id_ocorrencia']))
    {
        $ocorrencia = new Ocorrencia();
        $id_paciente = $_GET['id_paciente'];
        $id_ocorrencia = $_GET['id_ocorrencia'];
        $pdf = new FPDF();

        $width_cell_Origem_comunicacao=array(50,90,50);
        $width_cell_Dados_Atendimento=array(90,72,28,30,30,30,37,33,30);
        $width_cell_Qualificacao_Paciente=array(115,75,70,60,60,190,80,15,95);
       
        /*echo '<pre>';
        var_dump($ocorrencia->DadosDoAtendimento($id_paciente));
        var_dump($ocorrencia->EquipeAtendimento($id_ocorrencia));
        die();*/

        $dadosOcorrencia = $ocorrencia->DadosDoAtendimento($id_paciente);
        $integrantesDaEquipe = $ocorrencia->EquipeAtendimento($id_ocorrencia);

        /*Origem da comunicação*/
        $nome_solicitante = isset($dadosOcorrencia['NOME_SOLICITANTE']) && $dadosOcorrencia['NOME_SOLICITANTE'] != '' ? $dadosOcorrencia['NOME_SOLICITANTE']: '' ;
        $solicitamento = isset($dadosOcorrencia['SOLICITAMENTO']) && $dadosOcorrencia['SOLICITAMENTO'] != '' ? $dadosOcorrencia['SOLICITAMENTO']: '';
        $hora_comunicacao = $dadosOcorrencia['HORA_COMUNICACAO'];
        $data_fato = $dadosOcorrencia['DATA_FATO'];

        /*Dados do Atendimento*/
        $natureza_ocorrencia = $dadosOcorrencia['NATUREZA_OCORRENCIA'];
        $prefixo_amb = $dadosOcorrencia['PREFIXO_AMB'];
        $ra = $dadosOcorrencia['RA'];
        $km_inicial = $dadosOcorrencia['KM_INICIAL'];
        $km_final = $dadosOcorrencia['KM_FINAL'];
        $km_rodado =  $dadosOcorrencia['KM_RODADO'];
        $hora_fato =  $dadosOcorrencia['HORA_FATO'];
        $hora_local = $dadosOcorrencia['HORA_LOCAL'];
        $hora_final =$dadosOcorrencia['HORA_FINAL'];

        /*Qualificação do paciente */
        $nome_paciente = $dadosOcorrencia['NOME'];
        $rg = $dadosOcorrencia['RG'];
        $cartao_sus = $dadosOcorrencia['CARTAO_SUS'];
        $sexo = $dadosOcorrencia['SEXO'];
        $data_nascimento = $dadosOcorrencia['DATA_NASCIMENTO'];
        $rua = $dadosOcorrencia['RUA'];
        $bairro = $dadosOcorrencia['BAIRRO'];
        $numero = $dadosOcorrencia['NUMERO'];
        $cidade = $dadosOcorrencia['CIDADE'];
        $estado = $dadosOcorrencia['ESTADO'];

        /*Relatório do atendente*/
        $observacao = $dadosOcorrencia['OBSERVACAO'];

        /*Destino Ocorrência*/
        $destino = $dadosOcorrencia['DESTINO'];


        /*Header do PDF*/
        $pdf->AddPage();
        $pdf->Image('img/brasao.jpg',10,10,20,0);
        $pdf->Image('img/saude.png',180,10,20,0);
        $pdf->SetFont('Arial','B',12);

        
        
        $pdf->Cell(0,5,"PREFEITURA MUNICIPAL DE ITAPEVA",0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(0,5,"SECRETARIA MUNICIPAL DE DEFESA SOCIAL",0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(0,5,"SADI - SERVIÇO DE ATENDIMENTO DOMICILIAR DE ITAPEVA",0,1,'C');
        $pdf->Ln(2);
        $pdf->Cell(0,5,"","B",1,'C');
        /*FIM do PDF*/

        /*Dados Origem da comunicação*/ 
        $pdf->Ln(6);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,5,"REGISTRO DE ATENDIMENTO DOMICILIAR",0,1,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',8);
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(0,7,"ORIGEM DA COMUNICAÇÃO",1,1,'C',1);
        $pdf->Cell($width_cell_Origem_comunicacao[0],10,"HORA COMUNICAÇÃO: $hora_comunicacao",1,'C');
        $pdf->Cell($width_cell_Origem_comunicacao[1],10,"COMO FOI SOLICITADO O ATENDIMENTO: $solicitamento",1,'C');
        $pdf->Cell($width_cell_Origem_comunicacao[2],10,"DATA DO FATO: $data_fato ",1,'C');
        $pdf->Ln(10);
        $pdf->MultiCell(0,5," ", 1,'L');
        $pdf->MultiCell(0,8,"NOME SOLICITANTE: $nome_solicitante", 1,'L');
        /*FIM DADOS ORIGEM COMUNICAÇÃO*/

        /*Dados do atendimento */
        $pdf->SetFillColor(211,211,211);
        $pdf->SetFont('Arial','B',7.5);
        $pdf->Cell(0,7,"DADOS DO ATENDIMENTO",1,1,'C',1);
        $pdf->Cell($width_cell_Dados_Atendimento[0],10,"NATUREZA DA OCORRÊNCIA: $natureza_ocorrencia",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[1],10,"PREFIXO DA AMB: $prefixo_amb",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[2],10,"RA Nº: $ra",1,'C');
        $pdf->Ln(10);
        $pdf->Cell($width_cell_Dados_Atendimento[3],10,"KM INICIAL: $km_inicial ",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[4],10,"KM FINAL: $km_final ",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[5],10,"KM RODADO: $km_rodado",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[6],10,"HORA DO FATO: $hora_fato ",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[7],10,"HORA LOCAL: $hora_local ",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[8],10,"HORA FINAL: $hora_final",1,'C');
        /*FIM DADOS DO ATENDIMENTO*/

        /*QUALIFICAÇÃO DO PACIENTE */
        $pdf->Ln(9);
        $pdf->SetFont('Arial','B',9);
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(0,7,"QUALIFICAÇÃO DO PACIENTE",1,1,'C',1);
        $pdf->Cell($width_cell_Qualificacao_Paciente[0],8,"NOME COMPLETO: $nome_paciente",1,'C');
        $pdf->Cell($width_cell_Qualificacao_Paciente[1],8,"RG: $rg",1,'C');
        $pdf->Ln(8);
        $pdf->Cell($width_cell_Qualificacao_Paciente[2],8,"CARTÃO SUS: $cartao_sus",1,'C');
        $pdf->Cell($width_cell_Qualificacao_Paciente[3],8,"SEXO: $sexo",1,'C');
        $pdf->Cell($width_cell_Qualificacao_Paciente[4],8,"DATA DE NASCIMENTO: $data_nascimento",1,'C');
        $pdf->Ln(8);
        $pdf->Cell($width_cell_Qualificacao_Paciente[5],8,"ENDEREÇO: $rua"." nº $numero ",1,'C');
        $pdf->Ln(8);
        $pdf->Cell($width_cell_Qualificacao_Paciente[6],8,"MUNICÍPIO: $cidade ",1,'C');
        $pdf->Cell($width_cell_Qualificacao_Paciente[7],8,"UF: $estado ",1,'C');
        $pdf->Cell($width_cell_Qualificacao_Paciente[8],8,"BAIRRO: $bairro ",1,'C');
        /*FIM QUALIFICAÇÃO DO PACIENTE */

        /*RELATÓRIO DO PACIENTE */
        $pdf->Ln(8);
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(0,7,"RELATÓRIO DO ATENDENTE",1,1,'C',1);
        $pdf->MultiCell(0,8,"$observacao", 1,'C');
        /*FIM RELATÓRIO PACIENTE */

        /* DESTINO DA OCORRÊNCIA */
        $pdf->Ln(9);
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(0,7,"DESTINO DA OCORRÊNCIA",1,1,'C',1);
        $pdf->Cell(0,7,"$destino",1,1,'C');
        /* DESTINO DA OCORRÊNCIA */

        
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(0,7,"INTEGRANTES DA EQUIPE",1,1,'C',1);
        if(count($integrantesDaEquipe) > 0)
        {
            for ($i=0; $i < count($integrantesDaEquipe) ; $i++) 
            { 
                foreach ($integrantesDaEquipe[$i] as $k => $v) 
				{
                    $pdf->Cell(0,7,"NOME: $v ",1,1,'L');
                }
            }
        }
        
                
        
        $pdf->Output();

        
        
        
        
    }
?>