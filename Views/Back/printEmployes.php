<?php

    require "fpdf.php";

    $db = new PDO('mysql:host=localhost;dbname=mydata','root','');

    class myPDF extends FPDF 
    {
        function header(){
            $this->Image('img/logoPrint.png',10,6);
            $this->SetFont('Arial','B',14);
            $this->Cell(276,5,'EMPLOYEES LIST',0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',12);
            $this->Cell(276,10,'Cuisinet',0,0,'C');
            $this->Ln(20);
        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            $this->Ln(20);
        }
        function headerTable(){
            $this->SetFont('Times','B',12);
            $this->Cell(20,10,'ID',1,0,'C');
            $this->Cell(40,10,'Nom dutilisateur',1,0,'C');
            $this->Cell(40,10,'Mot de passe',1,0,'C');
            $this->Cell(40,10,'Email',1,0,'C');
            $this->Cell(40,10,'Num Téléphone',1,0,'C');

        }
        function viewTable($db){
            $this->SetFont('Times','',12);
            $stmt = db->query('select * from employes');
            while($data = $stmt->fetch(PDO::FETCH_OBJ))
            {
                $this->Cell(20,10,$data->ID,1,0,'C');
                $this->Cell(40,10,$data->username,1,0,'L');
                $this->Cell(40,10,$data->password,1,0,'L');
                $this->Cell(40,10,$data->email,1,0,'L');
                $this->Cell(40,10,$data->phone,1,0,'L');
        
            }

        }


    }