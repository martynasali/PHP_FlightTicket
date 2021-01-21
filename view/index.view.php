
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="view/css/bootstrap.css" rel="stylesheet" >
    <title>Forma</title>

    <style>

        body
        {
            background-color: #3b3b3b;
            font-family: "Helvetica Neue";
        }
        .aukstis{
            height: 300px;
            background: rgb(12,88,68);
            background: linear-gradient(90deg, rgba(12,88,68,1) 0%, rgba(32,167,136,1) 49%, rgba(0,255,158,1) 100%);
        }
        .flight{
            height: 300px;

            background-color: #000000;
            text-align: center;
        }
        .aukstis3{
            height: 50px;
        };
        .main {
            display: flex;
        }

        .aukstis1{
            height: 100px;
        };


    </style>
</head>
<body>
<div class="container">

        <?php
        $validation = [];
        if (isset($_POST['send'])):?>


            <?php

            if ($_POST["flightNumber"] == "Pasirinkite skrydžio numerį"||!preg_match('/./',$_POST["flightNumber"])){
                $validation[] = 'Nepasirinkote skrydžio numerio';}

            if ($_POST["departure"] == "Pasirinkite miestą"||!preg_match('/./',$_POST["departure"])){
                $validation[] = 'Nepasirinkote iš kur skrendate';}

            if ($_POST["arrival"] == "Pasirinkite miestą"||!preg_match('/./',$_POST["arrival"])){
                $validation[] = 'Nepasirinkote į kur skrendate';}

            if (!preg_match('/\d{11}/',$_POST['idName'])){
                $validation[] = 'Blogai įvestas arba neįvestas asmens kodas';}

            if (!preg_match('/[A-Z]./',$_POST['name'])){
                $validation[] = 'Neįvedete vardo';}
           if (!preg_match('/[A-Z]./',$_POST['lastname'])){
               $validation[] = 'Neįvedete pavardės';}


            if (!preg_match('/\d{1,5}/',$_POST['price'])){$validation[] = 'Blogai įvesta arba neįvesta kaina';}

            if ($_POST["bag"] == "Pasirinkite bagažo svorį" || !preg_match('/./',$_POST["bag"])){
                $validation[] = 'Nepasirinkote bagažo svorio';}
            else if ($_POST["bag"] >= 20|| $_POST["bag"] == 25|| $_POST["bag"] == 30 ){
                $_POST['price'] += 30;
            }
            if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',$_POST['email'])){
                $validation[] = 'Neįvestas el. paštas';}
            if (!preg_match('/^\w{1,200}$/',$_POST['message'])){
                $validation[] = 'Neįvedėte žinutės arba viršijote simbolių kiekį';}
            ?>

            <?php endif ?>
    <?php if (isset($_POST['send']) & empty($validation)):?>


        <div class="main shadow-lg rounded aukstis mt-4">
            <div class="aukstis1 row">
            <h1 class="display-4 rounded col-2 text-light flight">Flight Ticket</h1>


        <?php foreach ($_POST as $duomenys => $value):?>
        <?php if($duomenys != "send"):?>

                <?php if ($duomenys == "flightNumber"):?>
                <h4 class=" col-1">Flight Number: <?=htmlspecialchars(ucfirst($value));?></h4>
            <?php endif;?>

                <?php if ($duomenys == "arrival"):?>
                    <h4 class=" col-1 ">Arrival : <?=htmlspecialchars(ucfirst($value));?></h4>
                <?php endif;?>

                <?php if ($duomenys == "departure"):?>
                    <h4 class="col-1">Departure : <?=htmlspecialchars(ucfirst($value));?></h4>
                    <h1 class="display-3 col-1"> > </h1>
                <?php endif;?>







                <?php if ($duomenys == "idName"):?>

                    <h4 class="col-1 ">ID: <?=htmlspecialchars(ucfirst($value));?></h4>
                <?php endif;?>
                <?php if ($duomenys == "name"):?>
                    <h4 class="col-1">Name: <?=htmlspecialchars(ucfirst($value));?></h4>
                <?php endif;?>


                <?php if ($duomenys == "lastname"):?>
                    <h4 class="col-1">LastName: <?=htmlspecialchars(ucfirst($value));?></h4>


                <?php endif;?>
                <?php if ($duomenys == "email"):?>
                    <h4 class="">Email: <?=htmlspecialchars(ucfirst($value));?></h4>
                <?php endif;?>
                <?php if ($duomenys == "bag"):?>
                    <h4 class="col-1">Baggage: <?=htmlspecialchars(ucfirst($value));?>kg.</h4>

                <?php endif;?>
                <?php if ($duomenys == "price"):?>
                <div class="row">
                    <h4 class="col-1">Price: <?=htmlspecialchars(ucfirst($value));?>€</h4>
                <?php endif;?>
                <?php if ($duomenys == "message"):?>
                    <h6 class="col-1">Information: <?=htmlspecialchars(ucfirst($value));?></h6>
                <?php endif;?>





            <?php endif;?>
        <?php endforeach;?>
        </div>
        </div>




<?php else:?>
    <?php foreach ($validation as $error):?>
    <div class="alert alert-danger" role="alert">
    <?=$error;?>
</div>
<?php endforeach;?>

    <form method="post" class="text-white">

        <div class="form-group mt-4 text-white">
        <label for="name">Skrydžio numeris: </label>
        <select name="flightNumber" aria-label="Default select example"  >

            <option selected>Pasirinkite skrydžio numerį </option>
            <?php foreach ($flightNumber as $number):?>
                <option name="name"  id="name" name="name" value=<?=$number;?>><?=$number;?></option>
            <?php endforeach?>
        </select>
        </div>

            <div class="form-group mt-4">
                <label class="text-white" for="name">Iš kur skrendate?  </label>
                <select name="departure" aria-label="Default select example"  >

                    <option selected>Pasirinkite miestą</option>
                    <?php foreach ($departures as $departure):?>
                        <option name="name"  id="name" name="name" value=<?=$departure;?>><?=$departure;?></option>
                    <?php endforeach?>
                </select>
            </div>

        <div class="form-group mt-4">
            <label for="name">Į kur skrendate?  </label>
            <select name="arrival" aria-label="Default select example"  >

                <option selected>Pasirinkite miestą</option>
                <?php foreach ($arrivals as $arrival):?>
                    <option name="name"  id="name" name="name" value=<?=$arrival;?>><?=$arrival;?></option>
                <?php endforeach?>
            </select>
        </div>

        <div class="form-group">
            <input for="price" name="price" type="number" class="form-control" placeholder="įveskite siūlomą kainą">
        </div>

        <div class="form-group">
            <label for="idName">Asmens kodas</label>
            <input type="text" class="form-control" id="idName" name="idName" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">Įveskite vardą</small>
        </div>
        <div class="form-group">
            <label for="name">Vardas</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">Įveskite vardą</small>
        </div>
        <div class="form-group">
            <label for="lastname">Pavardė</label>
            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastNameHelp">
            <small id="lastNameHelp" class="form-text text-muted">Įveskite pavardę</small>
        </div>

        <div class="form-group mt-4">
            <label for="bag">Bagažas  </label>
            <select name="bag" aria-label="Default select example"  >

                <option selected>Pasirinkite bagažo svorį</option>
                <?php foreach ($baggage as $bag):?>
                    <option name="name"  id="name" name="name" value=<?=$bag;?>><?=$bag;?></option>
                <?php endforeach?>
            </select>
        </div>


        <div class="form-group">
            <label for="InputEmail1">El. paštas</label>
            <input type="email" class="form-control" id="InputEmail1" name= "email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Jūsų el. pašto adresas</small>
        </div>
        <div class="form-group">
            <label for="message">Pastabos</label>
            <textarea class="form-control" id="message" rows="3" name="message" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="send">Spausdinti</button>


    </form>



</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>
<?php endif;?>