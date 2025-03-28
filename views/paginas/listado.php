<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) { ?>
        <div class="anuncio">

            <img loading="lazy" src="/imagenes/imagenesPropiedades/<?php echo $propiedad->imagen; ?>" alt="anuncio">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>

                <p class="precio">
                    <?php echo number_format($propiedad->precio, 0, ',', '.') . ' €'; ?>
                </p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono aparcamiento">
                        <p><?php echo $propiedad->aparcamiento; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                    <li>
                        <p><?php echo $propiedad->superficie; ?> &#13217;</p>
                    </li>
                </ul>

                <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                    Ver propiedad
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->
    <?php }; ?>
</div> <!--.contenedor-anuncios-->