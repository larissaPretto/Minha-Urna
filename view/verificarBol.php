<form name="frmUEscolha" action="../model/incluirCadastro.php" method="POST" enctype="multipart/form-data">
    <input type="radio" id="notVer" name="verif" value="0" checked>
    <label for="user">Não verificados</label><br>
    <input type="radio" id="ver" name="verif" value="1">
    <label for="adm">Já verificados</label><br>
    <input type="radio" id="rej" name="verif" value="2">
    <label for="adm">Rejeitados</label><br>

    <select name="selectUF" class="UFField" id="idUF" required>
        <?php
        include("../model/conexao.php");
        $UF = "<option value='0'>UF</option>";
        $sql = "SELECT * FROM estadoUF GROUP BY uf ORDER BY uf";
        $rs = mysqli_query($conectado, $sql);
        while ($registro = mysqli_fetch_array($rs)) {
            if ($registro['uf'] != "BR") {
                $UF = $UF . "<option value='" . $registro['id'] . "'>" . $registro['uf'] . "</option>";
            }
        }
        echo $UF;
        ?>
    </select>
    <select name="selectMuni" id="idMuni" class="municipioField" required>
        <option value="0">Municipio</option>
    </select>

</form>
<div id="resul">
    <br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../js/listarBolADM.js"></script>