<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tree.css">
</head>
<body onselectstart="return false;">
    <?php
        require_once("functions.php");
        $conn = DBconnect();

        $query = "SELECT id, id_rodzica, nazwa FROM drzewo ORDER BY id_rodzica, id";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    ?>

    <script>

        let data;
        window.onload = () => {
            data = <?php echo json_encode($data); ?>;
            tree();
            openElements();
        }

        function tree() {
            document.getElementById('ol_0').innerHTML = "";
            data.forEach(el => {
                let parentOl = document.getElementById('ol_' + el.id_rodzica);
            
                if(!parentOl) {
                    let parentLi = document.getElementById(el.id_rodzica);
                    parentOl = document.createElement('ol');
                    parentOl.id = 'ol_' + el.id_rodzica;
                    parentLi.append(parentOl);
                }

                let li = document.createElement('li');
                let ol = document.createElement('ol');

                ol.id = 'ol_' + el.id;
                ol.classList.add('hidden');
                li.innerHTML = '<span class="material-icons">folder</span>' + el.nazwa;
                li.id = el.id;
                li.classList.add('toggle');
                li.append(ol);
                parentOl.append(li);
            });
        }

        function openElements() {
            let toggler = document.querySelectorAll('.toggle');

            toggler.forEach(el => {
                el.addEventListener('click', (event) => {
                    event.stopPropagation();
                    let ol = el.querySelector('ol');
                    ol.classList.toggle('hidden');
                    let folder = el.querySelector('span');

                    if(folder.innerHTML == "folder") {
                        folder.innerHTML = "folder_open";
                    }
                    else if(folder.innerHTML == "folder_open") {
                        folder.innerHTML = "folder";
                    }
                    console.log(el);
                });
            });
        }
    </script>  

    <ol id="ol_0"></ol>
</body>
</html>