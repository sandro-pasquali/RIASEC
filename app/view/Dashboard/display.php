<?php include(ROOT."/app/view/head.php"); ?>
<?php include(ROOT."/app/view/navbar.php"); ?>

<div class="ui main text container">
    <div class="ui special cards">
        <h1 class="ui teal icon center aligned header">
            <i class="settings icon"></i>
            <div class="content">
                Dashboard
            </div>
        </h1>
        <div class="ui hidden divider"></div>
        <div class="ui three special stackable cards">
            <div class="card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <a href="?query=classe" class="ui inverted button">Voir</a>
                            </div>
                        </div>
                    </div>
                    <img src="./assets/img/classroom.svg">
                </div>
                <div class="content">
                    <h1 class="header">Gérer les promotions</h1>
                </div>
                <div class="content">
                    Ajout, suppression des promotions et génération des codes de connexion.
                </div>
            </div>
            <div class="card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <a href="?query=dashboard/admin" class="ui inverted button">Voir</a>
                            </div>
                        </div>
                    </div>
                    <img src="./assets/img/addAdmin.svg">
                </div>
                <div class="content">
                    <h1 class="header">Gérer les administrateurs</h1>
                </div>
                <div class="content">
                    Ajout et suppression d'un administrateur de la plateforme.
                </div>
            </div>
            <div class="card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <a href="?query=questionnaire/edit" class="ui inverted button">Voir</a>
                            </div>
                        </div>
                    </div>
                    <img src="./assets/img/questionnaire.svg">
                </div>
                <div class="content">
                    <h1 class="header">Modifier Questionnaire</h1>
                </div>
                <div class="content">
                    Modifier les intitulés des questionnaires.
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.special.cards .image').dimmer({
        on: 'hover'
    });
</script>
<?php include(ROOT."/app/view/footer.php"); ?>
