<?php
include "head.php";
?>



<div class="slider">
    <div class="slides">
        <!--Radio buttons-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <!--Fim Radio buttons-->
        
        
        <!--Slide images-->
        <div class="slide first">
            <img src="assets/img/imagem-slider1.jpg" alt="imagem 1">
        </div>
        <div class="slide">
            <img src="assets/img/imagem-slider2.jpg" alt="imagem 2">
        </div>
        <div class="slide">
            <img src="assets/img/imagem-slider3.jpg" alt="imagem 3">
        </div>
        <div class="slide">
            <img src="assets/img/imagem-slider4.jpg" alt="imagem 4">
        </div>
        <!--Fim Slide images-->
        
        
        <!--Navegation auto-->
        <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
        </div>
    </div>
    
    <div class="manual-navigation">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
    </div>
    <!--Fim Navegation auto-->
    
    
    
    
</div>

<script src="assets/js/script.js"></script>




<div>
    <h1 class="texto">TOPFERRO</h1>
    <p class="texto1">Valorizando seu ambiente</p>
</div>
<section class="flex">
    <div class="titulos">
        <h2>Prateleiras</h2>
        <a href="prateleira.php"><img src="assets/img/prateleira.png"></a>
    </div>
    <div class="titulos">
        <h2>Armários</h2>
        <a href="armarios.php"><img src="assets/img/armario.png"></a>
    </div>
    <div class="titulos">
        <h2>Decorações</h2>
        <a href="decoracoes.php"><img src="assets/img/decoracao.png"></a>
    </div>
    <div class="titulos">
        <h2>Suportes</h2>
        <a href="exteriores.php"><img src="assets/img/suportes.png"></a>
    </div>

    <div class="titulos">
        <h2>Industriais</h2>
        <a href="industriais.php"><img src="assets/img/industriais.png"></a>
    </div>
    <div class="titulos">
        <h2>Escrivaninha</h2>
        <a href="escrivaninha.php"><img src="assets/img/escrivaninha.png"></a>
    </div>
    <div class="titulos">
        <h2>Molduras</h2>
        <a href="molduras.php"><img src="assets/img/moldura.png"></a>
    </div>
    <div class="titulos">
        <h2>Cabideiros</h2>
        <a href="araras.php"><img src="assets/img/cabideiro.png"></a>
    </div>
</section>

<?php
include "footer.php"
?>