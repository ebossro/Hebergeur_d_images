<?php
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

    $error = 1;

    if($_FILES['image']['size'] <= 3000000) {
        $_informationsImage = pathinfo($_FILES['image']['name']);
        $_extensionImage = $_informationsImage['extension'];
        $extensionArray = array('jpg', 'jpeg', 'png', 'gif');
        if(in_array($_extensionImage, $extensionArray)) {
            $address = 'uploads/'.time().rand().rand().'.'.$_extensionImage;
            move_uploaded_file($_FILES['image']['tmp_name'], $address);
            $error = 0;
        }
    }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hébergeur d'images gratuit</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', Arial, sans-serif;
            background: linear-gradient(135deg, #f3e7e9 0%, #e3eeff 100%);
            margin: 0;
            padding: 0;
        }
        header {
            padding: 5px 0 10px 0;
            text-align: center;
            background: linear-gradient(90deg, #8f00ff 0%, #e100ff 100%);
            color: white;
            font-size: 2rem;
            letter-spacing: 2px;
            box-shadow: 0 2px 8px rgba(143,0,255,0.1);
        }
        .container {
            margin: 60px auto 0 auto;
            width: 100%;
            max-width: 700px;
        }
        article {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(143,0,255,0.08);
            padding: 40px 30px 30px 30px;
            text-align: center;
        }
        article h1 {
            color: #8f00ff;
            margin-bottom: 30px;
            font-size: 1.5rem;
            font-weight: 700;
        }

        #image {
            max-width: 300px;
        }

        #link {
            width: 90%;
            max-width: 400px;
            padding: 10px 14px;
            font-size: 1.1rem;
            border: 1.5px solid #8f00ff;
            border-radius: 8px;
            background: #f7f2fa;
            color: #8f00ff;
            margin: 10px 0 0 0;
            outline: none;
            transition: border 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(143,0,255,0.08);
        }
        #link:focus {
            border: 2px solid #e100ff;
            box-shadow: 0 4px 16px rgba(143,0,255,0.16);
        }
        form input[type="submit"]:hover {
            background: linear-gradient(90deg, #e100ff 0%, #8f00ff 100%);
            box-shadow: 0 4px 16px rgba(143,0,255,0.16);
        }

        form input[type="file"] {
            margin: 20px 0;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px;
            background: #fafafa;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            color: #8f00ff;
        }
        form input[type="file"]::-webkit-file-upload-button {
            background: linear-gradient(90deg, #8f00ff 0%, #e100ff 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(143,0,255,0.08);
        }
        form input[type="file"]::-webkit-file-upload-button:hover {
            background: linear-gradient(90deg, #e100ff 0%, #8f00ff 100%);
            box-shadow: 0 4px 16px rgba(143,0,255,0.16);
        }
        
        form button {
            background: linear-gradient(90deg, #8f00ff 0%, #e100ff 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 32px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(143,0,255,0.08);
        }
        form button:hover {
            background: linear-gradient(90deg, #e100ff 0%, #8f00ff 100%);
            box-shadow: 0 4px 16px rgba(143,0,255,0.16);
        }
    </style>
</head>
<body>
    <header><h1>PHOTOSHOOT</h1></header>
    <div class="container">
        <article>
            <h1>Héberger une image GRATUIT 🤩</h1>
            <?php
                if(isset($error) && $error == 0) {
                    echo '<img src="'.$address.'" alt="" id="image"><br /><br />
                            <input type="text" value="http://localhost/testRapid/'.$address.'" id="link">';
                }
                else if(isset($error) && $error == 1) {
                    echo 'Votre image ne peut pas être envoyée. Vérifier son extension et sa taille (maximum à 3 Mo).';
                }
            ?>
            <form action="test.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image" required><br>
                <button type="submit">Héberger</button>
            </form>
            
        </article>
    </div>
</body>
</html>