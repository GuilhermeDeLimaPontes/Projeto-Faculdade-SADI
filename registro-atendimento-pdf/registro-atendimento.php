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
        $width_cell_Dados_Atendimento=array(90,72,28,30,30,30,37,35,28);
        $width_cell_Qualificacao_Paciente=array(115,75,70,60,60,190,80,15,95);
       
       /* echo '<pre>';
        var_dump($ocorrencia->DadosDoAtendimento($id_paciente));
        var_dump($ocorrencia->EquipeAtendimento($id_ocorrencia));
        die();*/

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
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(0,5,"REGISTRO DE ATENDIMENTO DOMICILIAR",0,1,'C');
        $pdf->Ln(5);
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(0,7,"ORIGEM DA COMUNICAÇÃO",1,1,'C',1);
        $pdf->Cell($width_cell_Origem_comunicacao[0],10,"HORA COMUNICAÇÃO: 18:43",1,'C');
        $pdf->Cell($width_cell_Origem_comunicacao[1],10,"COMO FOI SOLICITADO O ATENDIMENTO: Via central",1,'C');
        $pdf->Cell($width_cell_Origem_comunicacao[2],10,"DATA DO FATO: 29/05/1998 ",1,'C');
        $pdf->Ln(10);
        $pdf->MultiCell(0,5," ", 1,'L');
        $pdf->MultiCell(0,8,"NOME SOLICITANTE: JORANDIR ALMEIDA DE SOUZA AMARAL DOS SANTOS", 1,'L');
        /*FIM DADOS ORIGEM COMUNICAÇÃO*/

        /*Dados do atendimento */
        $pdf->SetFillColor(211,211,211);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(0,7,"DADOS DO ATENDIMENTO",1,1,'C',1);
        $pdf->Cell($width_cell_Dados_Atendimento[0],10,"NATUREZA DA OCORRÊNCIA: C-20",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[1],10,"PREFIXO DA AMB: G.S",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[2],10,"RA Nº: ",1,'C');
        $pdf->Ln(10);
        $pdf->Cell($width_cell_Dados_Atendimento[3],10,"KM INICIAL: 54900 ",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[4],10,"KM FINAL: 54906 ",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[5],10,"KM RODADO: 06",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[6],10,"HORA DO FATO: 19:05 ",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[7],10,"HORA LOCAL: 19:20 ",1,'C');
        $pdf->Cell($width_cell_Dados_Atendimento[8],10,"HORA FINAL: 19:35",1,'C');
        /*FIM DADOS DO ATENDIMENTO*/

        /*QUALIFICAÇÃO DO PACIENTE */
        $pdf->Ln(9);
        $pdf->SetFont('Arial','B',9);
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(0,7,"QUALIFICAÇÃO DO PACIENTE",1,1,'C',1);
        $pdf->Cell($width_cell_Qualificacao_Paciente[0],8,"NOME COMPLETO: MIRIAM VITÓRIA DE OLIVEIRA LIMA",1,'C');
        $pdf->Cell($width_cell_Qualificacao_Paciente[1],8,"R.G: 45.455.455.9",1,'C');
        $pdf->Ln(8);
        $pdf->Cell($width_cell_Qualificacao_Paciente[2],8,"CARTÃO SUS: 700001993714809",1,'C');
        $pdf->Cell($width_cell_Qualificacao_Paciente[3],8,"SEXO: F",1,'C');
        $pdf->Cell($width_cell_Qualificacao_Paciente[4],8,"DATA DE NASCIMENTO: 22/04/2018",1,'C');
        $pdf->Ln(8);
        $pdf->Cell($width_cell_Qualificacao_Paciente[5],8,"ENDEREÇO: RUA ITALO TURIANI Nº66 ",1,'C');
        $pdf->Ln(8);
        $pdf->Cell($width_cell_Qualificacao_Paciente[6],8,"MUNICÍPIO: ITAPEVA ",1,'C');
        $pdf->Cell($width_cell_Qualificacao_Paciente[7],8,"UF: SP ",1,'C');
        $pdf->Cell($width_cell_Qualificacao_Paciente[8],8,"BAIRRO: JARDIM VITÓRIA ",1,'C');
        /*FIM QUALIFICAÇÃO DO PACIENTE */

        /*RELATÓRIO DO PACIENTE */
        $pdf->Ln(8);
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(0,7,"RELATÓRIO DO ATENDENTE",1,1,'C',1);
        $pdf->MultiCell(0,8,"Paciente Com febre CONDUZIDA ATÉ À UPA  ", 1,'C');
        /*FIM RELATÓRIO PACIENTE */

        /* DESTINO DA OCORRÊNCIA */
        $pdf->Ln(9);
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(0,7,"DESTINO DA OCORRÊNCIA",1,1,'C',1);
        $pdf->Cell(0,7,"UNIDADE DE PRONTO ATENDIMENTO",1,1,'C');
        /* DESTINO DA OCORRÊNCIA */

        $pdf->Ln(9);
        $pdf->SetFillColor(211,211,211);
        $pdf->Cell(0,7,"INTEGRANTES DA EQUIPE",1,1,'C',1);
        $pdf->Cell(0,7,"NOME: ",1,1,'L');
                
        
        $pdf->Output();

        
        
        
        
    }
?>