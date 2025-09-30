<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <title>PHP Hotels</title>
    </head>
    <body>
        
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
        ?>

        <!-- Filtro per parcheggio -->
        <div class="my-5 mx-auto w-50 border border-dark-subtle border-2 rounded p-4">

            <!-- Parcheggio? -->
            <form action="index.php" method="get" class="d-flex justify-content-between align-items-center form-check">
                <div>
                    <label class="form-check-label">Hotel con parcheggio</label>
                    <input type="checkbox" name="parkOnly" class="form-check-input"
                        
                        <?=
                        // Shorthand rispetto a <?php echo
                        
                        // Se parkOnly è settato, l'input risulterà 'cheked', altrimenti no
                        isset($_GET['parkOnly']) ? 'checked' : ''
                    
                        ?>
                    >
                </div>
            
                <button type="submit" class="btn btn-success">Applica filtri</button>
            </form>

        </div>
        
        <!-- Logica filtri -->
        <?php
        
        // Array vuoto dove inserire elementi filtrati
        $filteredHotels = [];
        
        // Prendo i parametri dall'url
        $parkUrl = $_GET['parkOnly'];

        //  SE HO IL PARAMETRO...
        if (isset($parkUrl)){
        
            // ...per ogni hotel...
            foreach($hotels as $hotel){
                foreach($hotel as $key => $value){

                    // ...se il parametro parking è vero lo aggiungo al nuovo array
                    if($key === 'parking' && $value === true){
                        $filteredHotels[] = $hotel;
                    }
                };
            };

            // Modifico l'array originale, probabilmente non la scelta migliore
            $hotels = $filteredHotels;
        }

        ?>
        
        
        <!-- Visualizzazione hotel -->
        <section class="mx-auto mt-5 w-50">
            <ul class="list-unstyled">
                <?php foreach($hotels as $hotel){
                        
                    echo "<li class='p-4 border border-dark-subtle border-2 rounded my-4'>";
                    echo "<div class='d-flex justify-content-between align-items-center gap-4'>";
                        
                        foreach($hotel as $key => $value){
                            

                            if($key === 'name'){
                            
                                echo "<div>";
                                echo "<h3 class='mb-1'>$value</h3>";
                            
                            } else if ($key === 'description') {
                            
                                echo "<p class='mb-2'>Info: $value</p>";
                            
                            } else if ($key === 'parking' && $value === true) {
                            
                                echo "<p class='m-0'>Parking: ✅</p>";
                                echo "</div>";
                            
                            } else if ($key === 'parking' && $value === false) {
                            
                                echo "<p class='m-0'>Parking: ❌</p>";
                                echo "</div>";
                            
                            } else if ($key === 'vote' && $value >= 1 && $value <= 2) {
                            
                                echo "<div>";
                                    echo "<div class='d-flex justify-content-end align-items-center'>";
                                        echo "<h3 class='mb-0 me-1 text-danger'>$value</h3>";
                                        echo "<p class='m-0'>/ 5 <span class='ps-2'>⭐️</span></p>";
                                    echo "</div>";
                            
                            } else if ($key === 'vote' && $value >= 3 && $value <= 4) {
                            
                                echo "<div>";
                                    echo "<div class='d-flex justify-content-end align-items-center'>";
                                        echo "<h3 class='mb-0 me-1 text-success'>$value</h3>";
                                        echo "<p class='m-0'>/ 5 <span class='ps-2'>⭐️</span></p>";
                                    echo "</div>";
                            
                            } else if ($key === 'vote' && $value = 5) {
                            
                                echo "<div>";
                                    echo "<div class='d-flex justify-content-end align-items-center'>";
                                        echo "<h3 class='mb-0 me-1 text-primary'>$value</h3>";
                                        echo "<p class='m-0'>/ 5 <span class='ps-2'>⭐️</span></p>";
                                    echo "</div>";
                            
                            } else if ($key === 'distance_to_center' && $value > 10) {
                            
                                    echo "<p class='m-0 text-end'>Dal centro: <span class='m-0 text-danger'>$value </span>km</p>";
                                echo "</div>";
                            
                            } else if ($key === 'distance_to_center' && $value < 10 && $value > 5) {
                            
                                    echo "<p class='m-0 text-end'>Dal centro: <span class='m-0 text-warning'>$value </span>km</p>";
                                echo "</div>";
                            
                            } else if ($key === 'distance_to_center' && $value < 5 && $value > 1) {
                            
                                    echo "<p class='m-0 text-end'>Dal centro: <span class='m-0 text-success'>$value </span>km</p>";
                                echo "</div>";
                            
                            } else if ($key === 'distance_to_center' && $value <= 1) {
                            
                                    echo "<p class='m-0 text-end'>Dal centro: <span class='m-0 text-primary'>$value </span>km</p>";
                                echo "</div>";
                            
                            } 
                        }
                        
                    echo "</div>";
                    echo '</li>';
                }
                ?>
            </ul>
        </section>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>