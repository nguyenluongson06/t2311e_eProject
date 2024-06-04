<?php
require_once ("database/db.php");
$categories = get_categories();
$manufacturers = get_manufacturers();
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Shop Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($categories as $item): ?>
                            <li>
                                <a href="/category.php?id=<?php echo $item["id"] ?>"
                                    class="dropdown-item"><?php echo $item["name"] ?></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Manufacturers
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($manufacturers as $item): ?>
                            <li>
                                <a href="/category.php?id=<?php echo $item["id"] ?>"
                                    class="dropdown-item"><?php echo $item["name"] ?></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>