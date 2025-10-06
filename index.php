<?php

$string = file_get_contents('disks.json');

$disks = json_decode($string, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Disks and Json</title>
</head>
<body>
    <header>
        <div class="px-5 py-4 d-flex justify-content-between align-items-center">
            <h3>Music all night long</h3>
            <div>
                <!-- Aggiungere menù a tendina per il form -->
            </div>
        </div>
    </header>

    <main>
        <section class="container-fluid px-5">
            <ul class="list-unstyled row">
                <?php 
                
                foreach ($disks as $disk) {
                    echo "<li class='p-4 col-12 col-sm-6 col-lg-4'>
                        
                        <div class='album-card p-4'>
                    
                            <img src='$disk[urlCover]' alt='album cover' class='w-100'>
                        
                            <h4 class='mb-0 mt-3'>$disk[titolo]</h4>

                            <div class='mt-4 d-flex justify-content-between align-items-center'>
                                <h5 class='mb-0'>$disk[artista]</h5>
                                <p class='mb-0'>$disk[annoPubblicazione]</p>
                            </div>

                            <p class='text-center mb-0 mt-4'>$disk[genere]</p>
                        </div>
                    
                    </li>";
                }
                
                ?>
            </ul>
        </section>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>