
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
            height: 300px;
        };

        .aukstis3{
            height: 150px;
        };



    </style>
</head>
<body>
<div class="container">

        <?php
        $validation = [];
        if (isset($_POST['send'])){
         validate($_POST);
         if (empty($validation)){
         printing($_POST);}}?>


    <?php
    if (isset($_POST['prnt'])){
        validate($_POST);
    if (empty($validation)){
    printing($_POST);
        table();}}?>


    <?php if (isset($_POST['send']) & empty($validation)):?>


        <div class="main shadow-lg rounded aukstis mt-4">

            <div class="row aukstis1">
                <div class="col-md-2 flight rounded text-light display-4">Flight Ticket</div>
                <div class="col-md-10">





        <?php foreach ($_POST as $duomenys => $value):?>
        <?php if($duomenys != "send"):?>

                    <?php if ($duomenys == "flightNumber"):?>
                        <div class="row aukstis ">
                            <div class="col" >
                                <h1>Flight Number <?=htmlspecialchars(ucfirst($value));?></h1>
                            </div>
                            <?php endif;?>

                            <?php if ($duomenys == "departure"):?>
                                <div class=" mt-4 col-2" >
                                    <h3>  Departure   <?=htmlspecialchars(ucfirst($value));?> --></h3>
                                </div>
                            <?php endif;?>

                            <?php if ($duomenys == "arrival"):?>
                            <div class="mt-4 col" >
                                <h3> Arrival  <?=htmlspecialchars(ucfirst($value));?></h3>
                            </div>
                            <?php endif;?>

                            <?php if ($duomenys == "price"):?>
                            <div class="mt-4 col" >
                                <h4>   Price  <?=htmlspecialchars(ucfirst($value));?>$</h4>
                            </div>
                            <?php endif;?>

                            <?php if ($duomenys == "idName"):?>
                            <div class=" mt-4 mr-4 col" >
                                <h3>   ID  <?=htmlspecialchars(ucfirst($value));?></h3>
                            </div>
                            <?php endif;?>

                            <?php if ($duomenys == "name" || $duomenys == "lastname"):?>
                            <?php if ($duomenys == "name"):?>
                            <div class="row aukstis3">
                            <div class="ml-3 col" >
                                <h4>   Name / Lastname  <?=htmlspecialchars(ucfirst($value));?>
                                <?php else:?>
                                <?=htmlspecialchars(ucfirst($value));?></h4>

                            </div>
                            <?php endif;?>
                                <?php endif;?>





                            <?php if ($duomenys == "bag"):?>
                            <div class="col-2" >
                              <h4> Baggage <?=htmlspecialchars(ucfirst($value));?>kg. </h4>
                            </div>
                            <?php endif;?>

                            <?php if ($duomenys == "email"):?>
                            <div class="col-3 mr-2">
                             <h4> Email <?=htmlspecialchars(ucfirst($value));?></h4>
                                </div>
                                <?php endif;?>

                            <?php if ($duomenys == "message"):?>
                            <div class="ml-4 col">
                                <h4> Information <?=htmlspecialchars(ucfirst($value));?></h4>
                            </div>
                            <?php endif;?>








            <?php endif;?>
        <?php endforeach;?>
        </div>
                </div>
            </div>
        </div




<?php else:?>
    <?php foreach ($validation as $error):?>
    <div class="alert alert-danger" role="alert">
    <?=$error;?>
</div>
<?php endforeach;?>

    <form method="post" class="text-white">
<div class="row">
        <div class="col form-group mt-4 text-white">
        <label for="name">Skrydžio numeris: </label>
        <select name="flightNumber" aria-label="Default select example"  >

            <option selected>Pasirinkite skrydžio numerį </option>
            <?php foreach ($flightNumber as $number):?>
                <option name="name"  id="name" name="name" value=<?=$number;?>><?=$number;?></option>
            <?php endforeach?>
        </select>
        </div>

            <div class="col form-group mt-4">
                <label class="text-white" for="name">Iš kur skrendate?  </label>
                <select name="departure" aria-label="Default select example"  >

                    <option selected>Pasirinkite miestą</option>
                    <?php foreach ($departures as $departure):?>
                        <option name="name"  id="name" name="name" value=<?=$departure;?>><?=$departure;?></option>
                    <?php endforeach?>
                </select>
            </div>

        <div class="col form-group mt-4">
            <label for="name">Į kur skrendate?  </label>
            <select name="arrival" aria-label="Default select example"  >

                <option selected>Pasirinkite miestą</option>
                <?php foreach ($arrivals as $arrival):?>
                    <option name="name"  id="name" name="name" value=<?=$arrival;?>><?=$arrival;?></option>
                <?php endforeach?>
            </select>
        </div>
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
        <button type="submit" class="btn btn-primary" name="send">Spausdinti bilietą</button>
        <button type="submit" class="btn btn-primary" name="prnt">Spausdinti lentelę</button>


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