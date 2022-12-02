<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    var_dump($hotels );
    var_dump($hotels [0]);
    var_dump(array_keys($hotels[0]));
    
    // foreach($hotel as $key => $value){
    //     if($key === 'parking' && $value === true) $value = 'Si';
    //     else if($key === 'parking' && $value === false) $value = 'No';

    // }

    $filteredhotels = $hotels;

        // verifico se è presente il dato in $_GET['parking']
        // if(isset($_GET['parking']) && $_GET['parking'] == 1) sono uguali a quella sotto ma quella è più corta
        if(!empty($_GET['parking'])){
            // faccio un array temporaneo dove salvare l'array filtarto
            $temp_hotels = [];

            foreach($filteredhotels as $hotel){
                if($hotel['parking']) $temp_hotels[] = $hotel;
            }
            // sostituire il $filteredhotels con l'array $temp_hotels
            $filteredhotels = $temp_hotels;
        };
        if(!empty($_GET['vote'])){
            // faccio un array temporaneo dove salvare l'array filtarto
            $temp_hotels = [];

            foreach($filteredhotels as $hotel){
                // §puschio l'elemnto se il voto è >= di quello che mi arriva in GET
                if($hotel['vote'] >= $_GET['vote']) $temp_hotels[] = $hotel;
            }
            // sostituire il $filteredhotels con l'array $temp_hotels
            $filteredhotels = $temp_hotels;
        };

        // if(!empty($_GET['star'])){
        //     if(in_array($_GET['star'], ))
        // }

        // echo $hotel ['parking'] ? 'Si' : 'N0';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    

    <title>Document</title>
</head>
<body>
    <header>
        <h1>Hotel List</h1>
    </header>
    <main>
    
        <div class="form d-flex">
            <form action="./index.php" method="GET">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parking" id="parking1" value="" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                    Senza parcheggio
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parking" id="parking1" value="1">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Con Parcheggio
                    </label>
                </div>

                <select name="star" class="form-select m-2" aria-label="Default select example">
                    <label for="">Voto</label>
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                </select>
                <button class="btn btn-primary">SEND</button>
            </form>
            
        </div>
    


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            
            </thead>
            <tbody>
                <?php foreach($filteredhotels as $hotel): ?>
                    <tr>
                        <td><?php echo $hotel ['name'] ?></td>
                        <td><?php echo $hotel ['description'] ?></td>
                        <td><?php echo $hotel ['parking'] ? 'Si' : 'N0' ?></td>
                        <td><?php echo $hotel ['vote']?></td>
                        <td><?php echo $hotel ['distance_to_center'] ?></td>
                    </tr>
                <?php endforeach; ?>   
            </tbody>
        </table>
    </main>
</body>
</html>