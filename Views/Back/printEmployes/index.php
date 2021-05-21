<?php

    require "fpdf.php";

    $db = new PDO('mysql:host=localhost;dbname=cuisinet','root','');

    class myPDF extends FPDF{

        function header(){
            $this->Image('logoPrint.png',10,6);
            $this->SetFont('Arial','B',30);
            $this->Cell(276,5,'Tableau Des Employes',0,0,'C');
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
            $this->Cell(34,10,'ID',1,0,'C');
            $this->Cell(34,10,'Nom',1,0,'C');
            $this->Cell(34,10,'Prenom',1,0,'C');
            $this->Cell(34,10,'Age',1,0,'C');
            $this->Cell(34,10,'Sexe',1,0,'C');
            $this->Cell(34,10,'Titre demploi',1,0,'C');
            $this->Cell(34,10,'Salaire',1,0,'C');
            $this->Cell(34,10,'Num Telephone',1,0,'C');
            $this->Ln();
        }
        function viewTable($db){
            $this->SetFont('Times','',12);
            $stmt = $db->query('select * from employes');
            while($data = $stmt->fetch(PDO::FETCH_OBJ))
            {
                $this->Cell(34,10,$data->idEmploye,1,0,'C');
                $this->Cell(34,10,$data->nom,1,0,'L');
                $this->Cell(34,10,$data->prenom,1,0,'L');
                $this->Cell(34,10,$data->age,1,0,'L');
                $this->Cell(34,10,$data->sexe,1,0,'L');
                $this->Cell(34,10,$data->titreEmploi,1,0,'L');
                $this->Cell(34,10,$data->salaire,1,0,'L');
                $this->Cell(34,10,$data->numeroTelephone,1,0,'L');
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