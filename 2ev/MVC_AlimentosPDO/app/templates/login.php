<?php ob_start() ?>

<div id="login">
    <form action="index.php?ctl=login" method="POST">
        <input type="text" placeholder="Username" name="user" required />
        <br><br>
        <input type="password" placeholder="Password" name="password" required />
        <br><br>
        <input class="bg-success" type="submit" value="Iniciar sesión" name="bLogin" />
        <hr>
        <h5 class="text-light">No tienes cuenta?</h5>
        <input type="submit" value="Regístrate" name="bRegister" />
    </form>

</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
