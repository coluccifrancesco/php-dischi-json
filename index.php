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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&family=Edu+TAS+Beginner:wght@400..700&family=Fugaz+One&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Jost:ital,wght@0,100..900;1,100..900&family=Lexend+Deca:wght@100..900&family=Lexend:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Racing+Sans+One&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sometype+Mono:ital,wght@0,400..700;1,400..700&family=Space+Grotesk:wght@300..700&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Tektur:wght@400..900&display=swap" rel="stylesheet">
    <title>Disks and Json</title>
</head>
<body class="body-bg">
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
                    echo "<li class='p-4 col-12 col-md-6 col-xl-4'>
                        
                        <div class='album-card p-4'>
                    
                            <img src='$disk[urlCover]' alt='album cover' class='w-100'>
                        
                            <div class='px-1'>
                                <h2 class='mb-0 mt-4'>$disk[titolo]</h2>

                                <h4 class='mb-0 mt-2'>$disk[artista]</h4>
                                
                                <div class='mt-4 d-flex justify-content-between align-items-center'>
                                    <h5 class='mb-0'>$disk[annoPubblicazione]</h5>
                                    <p class='mb-0'>$disk[genere]</p>
                                </div>
                            </div>
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