<?php

    require "fpdf.php";

    $db = new PDO('mysql:host=localhost;dbname=cuisinet','root','');

    class myPDF extends FPDF{

        function header(){
            $this->Image('logoPrint.png',10,6);
            $this->SetFont('Arial','B',30);
            $this->Cell(276,5,'Tableau Des Clients',0,0,'C');
            $this->Ln(10);
            $this->SetFont('Times','',20);
            $this->Cell(276,10,'Restaurant Cuisinet',0,0,'C');
            $this->Ln(20);
        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        function headerTable(){
            $this->Ln(20);
            $this->SetFont('Times','B',12);
            $this->Cell(55,10,'ID',1,0,'C');
            $this->Cell(55,10,'Nom dutilisateur',1,0,'C');
            $this->Cell(55,10,'Mot de passe',1,0,'C');
            $this->Cell(55,10,'Email',1,0,'C');
            $this->Cell(55,10,'Num Telephone',1,0,'C');
            $this->Ln();
        }
        function viewTable($db){
            $this->SetFont('Times','',12);
            $stmt = $db->query('select * from clients');
            while($data = $stmt->fetch(PDO::FETCH_OBJ))
            {
                $this->Cell(55,10,$data->id,1,0,'C');
                $this->Cell(55,10,$data->username,1,0,'L');
                $this->Cell(55,10,$data->password,1,0,'L');
                $this->Cell(55,10,$data->email,1,0,'L');
                $this->Cell(55,10,$data->phone,1,0,'L');
                $this->Ln();
            }

        }


    }

    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->viewTable($db);
    $pdf->Output();