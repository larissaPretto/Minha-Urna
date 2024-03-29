<!DOCTYPE html>
<html>

<head lang="pt-br">
    <title>Candidato | Minha Urna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/secao.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body style="width: 390px; text-align: center; margin-left: 0px;">
    <p class="pageTitle">Dados da seção</p>

    <?php
    include("../model/conexao.php");
    include('../control/verificar.php');

    $email = $_SESSION['email'];
    $sql = "SELECT * from usuario where email = '$email'";
    $produtos = mysqli_query($conectado, $sql);
    while ($produto = mysqli_fetch_assoc($produtos)) {
        $nivel = $produto['nivel'];
    }

    $idBol = $_POST['idBol'];
    $idMuni = $_POST['idMuni'];
    $zona = $_POST['zona'];
    $secao = $_POST['secao'];

    $cargos = array(1, 3, 5, 6, 7, 8);


    echo '<h5 style="position: relative;
        width: 62px;
        height: 25px;
        margin-top: -32px;
        margin-left: 16px;
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 25px;
        box-sizing: border-box;
        display: flex;
        padding-top: 18px;
        padding-left: 16px;
        position: absolute;
        width: 358px;
        height: 88px;
        top: 118px;

        background: linear-gradient(104.06deg, rgba(228, 215, 171, 0.5) 1.9%, rgba(228, 205, 170, 0.75) 106.2%);
        border: 0.5px solid rgba(0, 0, 0, 0.25);
        border-radius: 16px;"""> Seção</h5>';
    echo '<h5 style="position: relative;
        width: 62px;
        height: 18px;
        text-align: left;
        display: flex;
        padding-top: 96px;
        padding-left: 17px;
        margin-top: -26px;
        margin-left: 16px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;"""> ' . $secao . '</h5>';

        echo '<h5 style="position: relative;
        height: 25px;
        text-align: right;
        right: 32px;
        margin-top: -70px;
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 25px;
        color: #000000;"""> Zona</h5><br>';

        echo '<h5 style="position: relative;
        width: auto;
        margin-top: -52px;
        height: 25px;
        right: 32px;
        text-align: right;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;
        color: #000000;""">' . $zona . '</h5><br>';

    $sql = "SELECT * FROM boletim WHERE idBoletim = " . $idBol;
    $registro = mysqli_query($conectado, $sql);
    while ($registros = mysqli_fetch_array($registro)) {
    ?>
        <img style="position: absolute;
            width: 23px;
            height: 23px;
            left: 35px;
            top: 194px;" src="illustrations/add_circle.svg">
        <img style="
        position: absolute;
        width: 23px;
        height: 23px;
        left: 35px;
        top: 221px;
        " src="illustrations/verificado.svg">
        <p style="position: absolute;
    left: 66px;
    top: 178px;"><?php echo $registros['UserRegister'] ?></p>
        <p style="position: absolute;
    left: 66px;
    top: 204px;"><?php echo $registros['userValidate'] ?></p>


        <?php
        $sql2 = "SELECT * FROM votos WHERE idBoletim = " . $idBol;
        $anterior = "nada";
        echo "<br>";
        for ($i = 0; $i < 6; $i++) {
            echo "<br>";
            echo "<br>";
            $teste = 0;
            echo '<img style="margin-bottom=1px;"src="illustrations/barra.svg">';
            if ($cargos[$i] == 1) {
                echo '<h5 style="text-align:center; margin-top:1px; margin-bottom: -32px;"">Presidente</h5><br>';
            } else if ($cargos[$i] == 3) {
                echo '<h5 style="text-align:center; margin-top:1px; margin-bottom: -32px;"">Governador</h5><br>';
            } else if ($cargos[$i] == 5) {
                echo '<h5 style="text-align:center; margin-top:1px; margin-bottom: -32px;"">Senador</h5><br>';
            } else if ($cargos[$i] == 6) {
                echo '<h5 style="text-align:center; margin-top:1px; margin-bottom: -32px;"">Deputado Federal</h5><br>';
            } else if ($cargos[$i] == 7) {
                echo '<h5 style="text-align: center; margin-top:1px; margin-bottom: -32px;"">Deputado Estadual</h5><br>';
            } else if ($cargos[$i] == 8) {
                echo '<h5 style="text-align:center; margin-top:1px; margin-bottom: -32px;"">Deputado Distrital</h5><br>';
            }
            echo '<img style="margin-bottom=1px;"src="illustrations/barra.svg">';
            echo "<br>";
            $registro2 = mysqli_query($conectado, $sql2);
            while ($registros2 = mysqli_fetch_array($registro2)) {

                $cand = $registros2['idCandidato'];
                $sql3 = "SELECT * FROM candidatos WHERE CD_CARGO = '$cargos[$i]' and ID_CANDIDATO = '$cand' GROUP BY '$cand'";
                $registro3 = mysqli_query($conectado, $sql3);
                $row = mysqli_num_rows($registro3);
                if ($row > 0) {
                    $teste = 1;
                }
                while ($registros3 = mysqli_fetch_array($registro3)) {
                    if ($anterior == $registros3['NM_URNA_CANDIDATO'])
                        continue;
                    echo '<h5 style="font-style: normal;
                    text-align: left;
                    width: auto;
                    font-weight: 600;
                    font-size: 20px;
                    margin-top:8px;
                    margin-bottom:0px;
                    margin-left: 16px;""> ' . $registros3['NM_URNA_CANDIDATO'] . '</h5>';

                    $sql4 = "SELECT sum(votos) as vtotal FROM votos WHERE idCandidato = '$cand' and idBoletim = '$idBol' ";
                    $registro4 = mysqli_query($conectado, $sql4);
                    while ($registros4 = mysqli_fetch_array($registro4)) {
                        echo '<h5 style="
                    position: relative;
                    width: auto; 

                    text-align: right;
                    margin-top: -26px;
                    margin-bottom: 4px;
                    right:20px;
                    font-style: normal;
                    font-weight: 600;
                    font-size: 20px;
                    line-height: 25px;"">' . $registros4['vtotal'] . '</h5>';
                    }
                    echo '<img style="margin-top: 1px; margin-bottom=1px;"src="illustrations/barra.svg">';
                    $anterior = $registros3['NM_URNA_CANDIDATO'];
                }
            }
            if ($row == 0 and  $teste == 0) {
                echo '<h5 style="font-style: normal;
                font-weight: 400;
                font-size: 20px;
                margin-top:8px;
                margin-bottom:1px;
                text-align: center;"">Sem votos para esse cargo</h5>';
               
            }
        }
        ?>
        <br><br>
        <a style="font-family: 'Plus Jakarta Sans';
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 24px;
            /* identical to box height, or 171% */

            text-decoration: none;
            align-items: center;
            letter-spacing: 0.5px;

            color: #1F64B4;" href="imgBol.php?idBol=<?php echo $registros['idBoletim'] ?>">Ver foto do boletim</a><br>
        <?php
        if ($nivel == 0) {
        ?>
            <br><br><br>
            <a style="position: relative;
                width: 326px;
                height: 52px;
                margin-left: -32px;
                padding: 14px 100px;

                background: #1F64B4;
                border-radius: 999px;
                font-family: 'Plus Jakarta Sans';
                font-style: normal;
                font-weight: 400;
                text-decoration: none;

                color: #FFFFFF;" class="verificar" href="https://resultados.tse.jus.br/oficial/app/index.html#/eleicao;e=e544;uf=rs;ufbu=rs;mubu=<?php echo $idMuni ?>;zn=<?php echo $zona ?>;se=<?php echo $secao ?>/dados-de-urna/boletim-de-urna"> Confira no TSE</a><br>
        <?php
        } else {
        ?>
            <br><br>
            <a style="position: relative;
                width: 326px;
                height: 52px;
                margin-left: 0px;
                padding: 14px 100px;

                background: #1F64B4;
                border-radius: 999px;
                font-family: 'Plus Jakarta Sans';
                font-style: normal;
                font-weight: 400;
                text-decoration: none;

                color: #FFFFFF; " href="../model/attBol.php?idBol=<?php echo $registros['idBoletim'] ?>&valido=1&email=<?php echo $email ?>"> Confirmar Boletim</a><br>
            <br><br>
            <a style="position: relative;
                width: 326px;
                height: 52px;
                margin-left: 0px;
                padding: 14px 104px;

                border: 2px solid #1F64B4;

                border-radius: 999px;
                font-family: 'Plus Jakarta Sans';
                font-style: normal;
                font-weight: 400;
                text-decoration: none;

                color: #1F64B4;;"href="../model/attBol.php?idBol=<?php echo $registros['idBoletim'] ?>&valido=2&email=<?php echo $email ?>"> Rejeitar Boletim</a><br><br><br>
    <?php
        }
    }
