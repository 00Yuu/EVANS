<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">EVANS</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            
        </a>
        
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="user user-menu">
                    <?php
                        $session = Yii::$app->session;
                        if($session->has('email')){
                            $nama = $session->get('nama');
                            $jabatan = $session->get('jabatan');
                            echo Html::a("<span><i class='fa fa-user'></i>&nbsp; Log out</span>", 
                            ['site/logout-user'], 
                            ['class' => 'nav-link']);
                            
                        }
                        else{
                            echo Html::a("<span><i class='fa fa-user'></i>&nbsp; Log in</span>", 
                            /*login sso : dummy, login-user : pake sso*/
                            ['site/login-sso'], 
                            // ['site/login-user'], 
                            ['class' => 'nav-link']);
                        }
                    ?>
                </li>
                <?php
                    if($session->has('email')){
                        echo 
                        "
                        <li class='user user-menu'>
                        <a class='nav-link'>"
                            .$jabatan.
                        "</a>
                        </li>"
                        ;
                    }
                    
                    
                ?> 
            </ul>
        </div>
    </nav>
</header>
