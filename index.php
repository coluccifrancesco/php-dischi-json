<?php

// Recupero il json come stringa
$string = file_get_contents('disks.json');

// Converto la stringa in array associativo
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Disks and Json</title>
</head>

<body class="body-bg">
    <header class="position-sticky top-0 z-1">
        
        <!-- Navbar con titolo e bottone form -->
        <nav class="px-5 py-4">
            <ul class="mb-0 list-unstyled d-flex justify-content-between align-items-center">
                <li>
                    <h1 class="mb-0">Music all night long</h1>
                </li>
                <li>
                    <button class="d-none d-md-block offcanvas-btn px-3 py-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#addForm" aria-controls="addForm">
                        Add your album!
                    </button>

                    <button class="d-block d-md-none offcanvas-btn px-3 py-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#addForm" aria-controls="addForm">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </li>
            </ul>

        </nav>

        <!-- Offcanvas con form -->
        <div class="offcanvas offcanvas-end p-4" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="addForm" aria-labelledby="addFormLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="addFormLabel">Add your album!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                
                <!-- Form che viene mandato alla pagina server.php -->
                <form action="server.php" method="POST">
              
                    <div class="mb-4">
                        <label for="inputName" class="form-label">Album name</label>
                        <input type="text" name="albumName" class="form-control" id="inputName">
                    </div>
                    
                    <div class="mb-4">
                        <label for="inputArtist" class="form-label">Artist</label>
                        <input type="text" name="artistName" class="form-control" id="inputArtist">
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-4 gap-5">
                        <div class="w-50">
                            <label for="inputYear" class="form-label">Publishing year</label>
                            <input type="number" name="YOP" class="form-control" id="inputYear" min=1900 max=2025>
                        </div>

                        <div class="w-50">
                            <label for="inputGenre" class="form-label">Genre</label>
                            <input type="text" name="albumGenre" class="form-control" id="inputGenre">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="inputCoverUrl" class="form-label">Cover url</label>
                        <input type="text" name="coverUrl" class="form-control" id="inputCoverUrl">
                        <div id="urlHelp" class="form-text">Please copy and paste a link that you can visit!</div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Add Album</button>
                </form>
            
            </div>
        </div>
    </header>

    <main>
        <section class="container-fluid px-5">
            <ul class="list-unstyled row">
                <?php

                // Mostrom ogni disco dal json in pagina
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>