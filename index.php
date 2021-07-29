<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="script.js"></script>
    <title>Zarządzanie strukturą drzewa</title>
</head>
<body onselectstart="return false;">

    <?php
        require_once("functions.php");
        $conn = DBconnect();

        error_reporting(0);

        $query = "SELECT id, id_rodzica, nazwa FROM drzewo ORDER BY id_rodzica, id";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        $val1 = $_POST['val1'];
        $val2 = $_POST['val2'];
        $val3 = $_POST['val3'];
        $button = $_POST['button'];

        if($button == "Dodaj") {
            if(mysqli_query($conn, "SELECT * FROM drzewo WHERE nazwa='$val1'")->num_rows == 0); {
                $insert = "INSERT INTO drzewo(nazwa,id_rodzica) VALUES('$val1','$val2')";
                mysqli_query($conn,$insert);
            }
        }
        else if($button == "Edytuj") {
            if(mysqli_query($conn, "SELECT * FROM drzewo WHERE nazwa='$val2'")->num_rows == 0); {
                if(empty($val2)) {
                    $edit = "UPDATE drzewo SET id_rodzica='$val3' WHERE id='$val1'";
                    mysqli_query($conn,$edit);
                }
                else {
                    $edit = "UPDATE drzewo SET nazwa='$val2', id_rodzica='$val3' WHERE id='$val1'";
                    mysqli_query($conn,$edit);
                }
            }
        }
        else if($button == "Usuń") {
            $delete = "DELETE FROM drzewo WHERE id='$val1'";
            mysqli_query($conn,$delete);
        }
    ?>   

    <script>
        let data;
        window.onload = () => {
            data = <?php echo json_encode($data); ?>;
            list();
            menuToggle();
            treeToggle();
            validate();
        }

        function list() {
            let element = document.querySelectorAll('.parentList');
            element.forEach(el => {
                data.forEach(el2 => {
                    let el3 = document.createElement("option");
                    el3.innerText = el2.nazwa;
                    el3.value = el2.id;
                    el.append(el3);
                });
            });
        }
        </script>

    <div id="container">
        <div id="tree">
            <h1>Struktura Drzewa</h1>
            <iframe id="iframe" src="tree.php" frameborder="0" width="90%" height="700px"></iframe>
            <div id="button">Rozwiń</div>
        </div>
        <div id="admin" style="display: block;">
            <h1>Zarządzanie strukturą drzewa</h1>

            <form id="newNodeForm" method="POST">
                Nowy węzeł:
                <input type="text" name="val1" id="newNode">
                Rodzic węzła:
                <select name="val2" id="nodeParent" class="parentList">
                    <option value="0" selected disabled hidden>Wybierz rodzica</option>
                </select>
                <input type="checkbox" name='val3' hidden checked>
                <input type="submit" class="btn" value="Dodaj" name="button">
            </form>

            <form id="nodeEditForm" method="POST">
                Nazwa węzła:
                <select name="val1" id="nodeName" class="parentList">
                    <option value="0" selected disabled hidden>Wybierz węzeł</option>
                </select>

                Nowa nazwa węzła:
                <input type="text" name="val2" id="nodeEdit">

                Nowy rodzic węzła:
                <select name="val3" id="newNodeParent" class="parentList">
                    <option value="0" selected disabled hidden>Wybierz węzeł</option>
                </select>

                <input type="submit" class="btn" value="Edytuj" name="button">
            </form>

            <form id="nodeDelForm" method="POST">
                Nazwa węzła:
                <select name="val1" id="nodeDel" class="parentList">
                    <option value="0" selected disabled hidden>Wybierz rodzica</option>
                </select>
                <input type="checkbox" name='val2' hidden checked>
                <input type="checkbox" name='val3' hidden checked>
                <input type="submit" class="btn" value="Usuń" name="button">
            </form>
        </div>
        <span id="menuToggle" class="material-icons open">close</span>
    </div>
</body>
</html>