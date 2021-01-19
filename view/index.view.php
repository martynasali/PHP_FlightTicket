
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

        @import url('https://fonts.googleapis.com/css?family=Oswald');
        *
        {
            margin: 0;
            padding: 0;
            border: 0;
            box-sizing: border-box
        }

        body
        {
            background-color: #dadde6;
            font-family: arial
        }

        .fl-left{float: left}

        .fl-right{float: right}

        .container
        {
            width: 90%;
            margin: 100px auto
        }

        h1
        {
            text-transform: uppercase;
            font-weight: 900;
            border-left: 10px solid #fec500;
            padding-left: 10px;
            margin-bottom: 30px
        }

        .row{overflow: hidden}

        .card
        {
            display: table-row;
            width: 49%;
            background-color: #fff;
            color: #989898;
            margin-bottom: 10px;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            border-radius: 4px;
            position: relative
        }

        .card + .card{margin-left: 2%}

        .date
        {
            display: table-cell;
            width: 25%;
            position: relative;
            text-align: center;
            border-right: 2px dashed #dadde6
        }

        .date:before,
        .date:after
        {
            content: "";
            display: block;
            width: 30px;
            height: 30px;
            background-color: #DADDE6;
            position: absolute;
            top: -15px ;
            right: -15px;
            z-index: 1;
            border-radius: 50%
        }

        .date:after
        {
            top: auto;
            bottom: -15px
        }

        .date time
        {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .date time span{display: block}

        .date time span:first-child
        {
            color: #2b2b2b;
            font-weight: 600;
            font-size: 250%
        }

        .date time span:last-child
        {
            text-transform: uppercase;
            font-weight: 600;
            margin-top: -10px
        }

        .card-cont
        {
            display: table-cell;
            width: 75%;
            font-size: 85%;
            padding: 10px 10px 30px 50px
        }

        .card-cont h3
        {
            color: #3C3C3C;
            font-size: 130%
        }

        .row:last-child .card:last-of-type .card-cont h3
        {
            text-decoration: line-through
        }

        .card-cont > div
        {
            display: table-row
        }

        .card-cont .even-date i,
        .card-cont .even-info i,
        .card-cont .even-date time,
        .card-cont .even-info p
        {
            display: table-cell
        }

        .card-cont .even-date i,
        .card-cont .even-info i
        {
            padding: 5% 5% 0 0
        }

        .card-cont .even-info p
        {
            padding: 30px 50px 0 0
        }

        .card-cont .even-date time span
        {
            display: block
        }

        .card-cont a
        {
            display: block;
            text-decoration: none;
            width: 80px;
            height: 30px;
            background-color: #D8DDE0;
            color: #fff;
            text-align: center;
            line-height: 30px;
            border-radius: 2px;
            position: absolute;
            right: 10px;
            bottom: 10px
        }

        .row:last-child .card:first-child .card-cont a
        {
            background-color: #037FDD
        }

        .row:last-child .card:last-child .card-cont a
        {
            background-color: #F8504C
        }

        @media screen and (max-width: 860px)
        {
            .card
            {
                display: block;
                float: none;
                width: 100%;
                margin-bottom: 10px
            }

            .card + .card{margin-left: 0}

            .card-cont .even-date,
            .card-cont .even-info
            {
                font-size: 75%
            }
        }
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
    <section>

        <div class="container">
            <div class="row">
        <h2>Flight Ticket</h2>

        <?php foreach ($_POST as $duomenys => $value):?>
        <?php if($duomenys != "send"):?>

    <li class=" col"><span><?=htmlspecialchars($duomenys);?>:  <?=htmlspecialchars(ucfirst($value));?></li>



        <?php endif;?>
        <?php endforeach;?>
        </div>
        </div>
    </section>


<?php else:?>
    <?php foreach ($validation as $error):?>
    <div class="alert alert-danger" role="alert">
    <?=$error;?>
</div>
<?php endforeach;?>

    <form method="post">

        <div class="form-group mt-4">
        <label for="name">Skrydžio numeris: </label>
        <select name="flightNumber" aria-label="Default select example"  >

            <option selected>Pasirinkite skrydžio numerį </option>
            <?php foreach ($flightNumber as $number):?>
                <option name="name"  id="name" name="name" value=<?=$number;?>><?=$number;?></option>
            <?php endforeach?>
        </select>
        </div>

            <div class="form-group mt-4">
                <label for="name">Iš kur skrendate?  </label>
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