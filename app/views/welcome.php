<?php include __DIR__ . '/layouts/header.php' ?>

    <main>
        <h1>Bienvenue sur notre boutique</h1>
        <section class="product-list">
            <?php foreach ($liste as $produit) { ?>
            <article class="product-card">
                <a href="produits<?= $produit['id'] ?>">
                    <img src="../../assets/images/<?= $produit['img'] ?>" alt="Produit 1">
                    <h2><?=  $produit['nom'] ?></h2>
                    <p>Prix : <?= $produit['prix'] ?>Ar</p>
                </a>
            </article>
            <?php } ?>
            <!-- Ajoutez d'autres produits ici -->
        </section>
    </main>
    
<?php include __DIR__ . '/layouts/footer.php' ?>