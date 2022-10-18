<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="generar_horario.php" method="POST">
        <label for="seccion">seccion</label>
        <select name="seccion" id="">
            <option value="1">mañana</option>
            <option value="2">tarde</option>
        </select>
        <label for="anno">año</label>
        <select name="anno" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label for="semana">semana</label>
        <input type="number" name="semana" id="">

        <input type="submit" value="generar">
    </form>

    <form action="buscar_horario.php" method="POST">
        <label for="anno">año</label>
        <select name="anno" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label for="semana">semana</label>
        <select name="semana" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="grupo">grupo</label>
        <select name="grupo" id="">
            <option value="IDF1101">1</option>
            <option value="IDF1102">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <input type="submit" value="generar">
    </form>
</body>

</html>