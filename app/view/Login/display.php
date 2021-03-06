<?php include(ROOT."/app/view/head.php"); ?>
<?php include(ROOT."/app/view/navbar.php"); ?>

<div class="ui main text container">
    <div class="ui special cards">
        <div class="card">
            <div class="blurring dimmable image">
                <div class="ui dimmer">
                    <div class="content">
                        <div class="center">
                            <a class="ui inverted button" href="?query=login/etudiant">Se connecter</a>
                        </div>
                    </div>
                </div>
                <img src="./assets/img/student.svg">
            </div>
            <div class="content">
                <a class="ui center aligned header" href="?query=login/etudiant">Etudiant</a>
                <div class="description">
                    Vous pouvez passer le test RIASEC si cela n'est pas déjà fait. Sinon vous pourrez consulter vos résultats
                    et les comparer à ceux de votre promotion.
                </div>
            </div>
            <div class="extra content">
                <a>
                    <i class="users icon"></i>
                    <?php
                        echo $this->nbEtudiant.' Membre';
                        if ($this->nbEtudiant > 1)
                            echo 's';
                    ?>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="blurring dimmable image">
                <div class="ui inverted dimmer">
                    <div class="content">
                        <div class="center">
                            <a class="ui primary button" href="?query=login/admin">Se connecter</a>
                        </div>
                    </div>
                </div>
                <img src="./assets/img/admin.svg">
            </div>
            <div class="content">
                <a class="ui center aligned header" href="?query=login/admin">Administrateur</a>
                <div class="description">
                    Si vous êtes un professeur autorisé, vous pourrez consulter les stats sur les promotions et/ou département de Polytech
                    , modifier le questionnaire et gérer les étudiants.
                </div>
            </div>
            <div class="extra content">
                <a>
                    <i class="users icon"></i>
                    <?php
                    echo $this->nbAdmin.' Membre';
                    if ($this->nbAdmin > 1)
                        echo 's';
                    ?>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    /**
     * Script pour révéler les boutons sur les cards au moment du hover
     */
    $('.special.cards .image').dimmer({
        on: 'hover'
    });
</script>

<?php include(ROOT."/app/view/footer.php"); ?>

