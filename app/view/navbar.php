<body>

<!-- Sidebar Menu -->
    <nav class="ui left vertical inverted labeled icon thin sidebar menu">
        <?php
            if($this->title === 'Accueil')
                echo '<a class="active item" href="./"><i class="home icon"></i>Accueil</a>';
            else
                echo '<a class="item" href="./"><i class="home icon"></i>Accueil</a>'
        ?>
        <?php
            if(isset($this->data['userData']) && $this->data['userData']["role"] === 'etudiant' && !isset($this->data['questionnaireRealise'])){
                if($this->title === 'Questionnaire')
                    echo '<a class="active item" href="?query=questionnaire"><i class="info icon"></i>Questionnaire</a>';
                else
                    echo '<a class="item" href="?query=questionnaire"><i class="info icon"></i>Questionnaire</a>';
            }
            else if(isset($this->data['userData']) && $this->data['userData']["role"] === 'etudiant' && isset($this->data['questionnaireRealise'])){
                if($this->title === 'Questionnaire')
                    echo '<a class="active item" href="?query=resultat"><i class="info icon"></i>Résultat</a>';
                else
                    echo '<a class="item" href="?query=resultat"><i class="info icon"></i>Résultat</a>';
            }
            else if(isset($this->data['userData']) && $this->data['userData']["role"] === 'admin'){
                if($this->title === 'Statistiques')
                    echo '<a class="active item" href="#"><i class="bar chart icon"></i> Statistiques</a>';
                else
                    echo '<a class="item" href="#"><i class="bar chart icon"></i> Statistiques</a>';
            }
            //Si la personne n'est pas connectée on n'affiche pas le bouton pour le questionnaire
        ?>
        <?php
            if(isset($this->data['userData']) && $this->data['userData']["role"] === 'admin') {
                if ($this->title === 'Dashboard')
                    echo '<a class="active item" href="?query=dashboard"><i class="dashboard icon"></i>Dashboard</a>';
                else
                    echo '<a class="item" href="?query=dashboard"><i class="dashboard icon"></i>Dashboard</a>';
            }
        ?>
        <?php
            if(!isset($this->data['userData'])){
                if ($this->title === 'S\'Enregistrer')
                    echo '<a class="active item" href="?query=register/etudiant"><i class="save icon"></i>S\'enregistrer</a>';
                else
                    echo '<a class="item" href="?query=register/etudiant"><i class="save icon"></i>S\'enregistrer</a>';
            }
            //Dans le cas d'un étudiant connecté on enleve simplement le bouton
        ?>
        <?php
        if(isset($this->data['userData']) && ($this->data['userData']["role"] === 'etudiant'||($this->data['userData']["role"] === 'admin'))){
            if($this->title === 'Mon Profil')
                echo '<a class="active item" href="?query=profile"><i class="user icon"></i>Mon Profil</a>';
            else
                echo '<a class="item" href="?query=profile"><i class="user icon"></i>Mon Profil</a>';
        }
        ?>
        <?php
          if(isset($this->data['userData']) && $this->data['userData']["role"] === 'admin'){
            echo '<a href="https://kevinhassan.github.io/riasec/" title="documentation" class="item"><i class="book icon"></i>Documentation</a>';
          }
        ?>
        <?php
            if(!isset($this->data['userData'])) {
                if ($this->title === 'Connexion')
                    echo '<a class="active item" href="?query=login"><i class="sign in icon"></i>Connexion</a>';
                else
                    echo '<a class="item" href="?query=login"><i class="sign in icon"></i>Connexion</a>';
            }
            else{
                if ($this->title === 'Déconnexion')
                    echo '<a class="active item" href="?query=login/disconnect"><i class="sign out icon"></i>Déconnexion</a>';
                else
                    echo '<a class="item" href="?query=login/disconnect"><i class="sign out icon"></i>Déconnexion</a>';
            }
        ?>
    </nav>
    <nav class="ui fixed inverted menu">
        <div class="ui container">
            <div class="ui compact icon large secondary inverted pointing menu">
                <a class="toc item">
                    <i class="sidebar icon"></i>
                    <span class="text">Menu</span>
                </a>
                <?php
                    if($this->title === 'Accueil')
                        echo '<a class="active item" href="./"><i class="home icon"></i>Accueil</a>';
                    else
                        echo '<a class="item" href="./"><i class="home icon"></i>Accueil</a>'
                ?>
                <?php
                if(isset($this->data['userData']) && $this->data['userData']["role"] === 'etudiant' && !isset($this->data['questionnaireRealise'])){
                    if($this->title === 'Questionnaire')
                        echo '<a class="active item" href="?query=questionnaire"><i class="info icon"></i>Questionnaire</a>';
                    else
                        echo '<a class="item" href="?query=questionnaire"><i class="info icon"></i>Questionnaire</a>';
                }
                else if(isset($this->data['userData']) && $this->data['userData']["role"] === 'etudiant' && isset($this->data['questionnaireRealise'])){
                    if($this->title === 'Questionnaire')
                        echo '<a class="active item" href="?query=resultat"><i class="info icon"></i>Résultat</a>';
                    else
                        echo '<a class="item" href="?query=resultat"><i class="info icon"></i>Résultat</a>';
                }
                else if(isset($this->data['userData']) && $this->data['userData']["role"] === 'admin'){
                    if($this->title === 'Statistiques')
                        echo '<a class="active item" href="?query=classe"><i class="bar chart icon"></i> Statistiques</a>';
                    else
                        echo '<a class="item" href="?query=classe"><i class="bar chart icon"></i> Statistiques</a>';
                }
                //Si la personne n'est pas connectée on n'affiche pas le bouton pour le questionnaire
                ?>
            </div>
            <div class="right menu">
                <?php
                if(!isset($this->data['userData'])){
                    if ($this->title === 'S\'Enregistrer')
                        echo '<a class="active item" href="?query=register/etudiant"><i class="save icon"></i>S\'enregistrer</a>';
                    else
                        echo '<a class="item" href="?query=register/etudiant"><i class="save icon"></i>S\'enregistrer</a>';
                }
                //Dans le cas d'un étudiant connecté on enleve simplement le bouton
                ?>
                <?php
                if(isset($this->data['userData']) && $this->data['userData']["role"] === 'admin') {
                    if ($this->title === 'Dashboard')
                        echo '<a class="active item" href="?query=dashboard"><i class="dashboard icon"></i>Dashboard</a>';
                    else
                        echo '<a class="item" href="?query=dashboard"><i class="dashboard icon"></i>Dashboard</a>';
                }
                ?>
                <?php
                    if(isset($this->data['userData']) && ($this->data['userData']["role"] === 'etudiant'||($this->data['userData']["role"] === 'admin'))){
                        if($this->title === 'Mon Profil')
                            echo '<a class="active item" href="?query=profile"><i class="user icon"></i>Mon Profil</a>';
                        else
                            echo '<a class="item" href="?query=profile"><i class="user icon"></i>Mon Profil</a>';
                    }
                ?>
                <?php
                  if(isset($this->data['userData']) && $this->data['userData']["role"] === 'admin'){
                    echo '<a href="https://kevinhassan.github.io/riasec/" title="documentation" class="item"><i class="book icon"></i>Documentation</a>';
                  }
                ?>
                <?php
                    if(!isset($this->data['userData'])) {
                        if ($this->title === 'Connexion')
                            echo '<a class="active item" href="?query=login"><i class="sign in icon"></i>Connexion</a>';
                        else
                            echo '<a class="item" href="?query=login"><i class="sign in icon"></i>Connexion</a>';
                    }
                    else{
                        if ($this->title === 'Déconnexion')
                            echo '<a class="active item" href="?query=login/disconnect"><i class="sign out icon"></i>Déconnexion</a>';
                        else
                            echo '<a class="item" href="?query=login/disconnect"><i class="sign out icon"></i>Déconnexion</a>';
                    }
                ?>
            </div>
        </div>
    </nav>
