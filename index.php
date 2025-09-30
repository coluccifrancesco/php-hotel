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
        <!-- <form class="my-5">
            <label></label>
            <input>
        </form> -->

        <!-- Visualizzazione hotel -->
        <div class="mx-auto mt-5 w-50">
            <ul class="list-unstyled">
                <?php foreach($hotels as $hotel){
                        
                    echo "<li class='p-4 border rounded my-4'>";
                    echo "<div class='d-flex justify-content-between align-items-center gap-4'>";
                        
                        foreach($hotel as $key => $value){
                            

                            if($key === 'name'){
                            
                                echo "<div>";
                                echo "<h4 class='m-0'>$value</h4>";
                            
                            } else if ($key === 'description') {
                            
                                echo "<p class='m-0'>Info: $value</p>";
                            
                            } else if ($key === 'parking' && $value === true) {
                            
                                echo "<p class='m-0'>Parking: ✅</p>";
                                echo "</div>";
                            
                            } else if ($key === 'parking' && $value === false) {
                            
                                echo "<p class='m-0'>Parking: ❌</p>";
                                echo "</div>";
                            
                            } else if ($key === 'vote' && $value >= 1 && $value <= 2) {
                            
                                echo "<div>";
                                    echo "<div class='d-flex justify-content-end align-items-center'>";
                                        echo "<h3 class='m-0 text-danger'>$value</h3>";
                                        echo "<p class='m-0'>/ 5 <span class='ps-2'>⭐️</span></p>";
                                    echo "</div>";
                            
                            } else if ($key === 'vote' && $value >= 3 && $value <= 4) {
                            
                                echo "<div>";
                                    echo "<div class='d-flex justify-content-end align-items-center'>";
                                        echo "<h3 class='m-0 text-success'>$value</h3>";
                                        echo "<p class='m-0'>/ 5 <span class='ps-2'>⭐️</span></p>";
                                    echo "</div>";
                            
                            } else if ($key === 'vote' && $value = 5) {
                            
                                echo "<div>";
                                    echo "<div class='d-flex justify-content-end align-items-center'>";
                                        echo "<h3 class='m-0 text-primary'>$value</h3>";
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
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>