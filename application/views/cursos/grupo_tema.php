<!-- target="_blank" rel="noopener noreferrer" href=" -->
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-advanced">
                <div class="widget-header text-center themed-background-dark">
                    <h3 class="widget-content-light">
                        <a href="#"><?php print($grupo_tema["nombre"]); ?></a><br>
                        <small><?php print($grupo_tema["descripcion"]); ?></small>
                    </h3>
                </div>
                <div class="widget-main">
                    <table class="table table-vcenter">
                        <thead>
                            <tr class="active">
                                <th><?php print($grupo_tema["nombre"]); ?></th>
                                <th class="text-right"><small><em><?php print($grupo_tema["lecciones"]); ?> TEMAS</em></small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($grupo_tema["temas"] as $key => $tema) { ?>
                            <tr>
                            	<?php $urlTema=str_replace("index.php/","",current_url()."/".$tema["codigo_uri"]."/"); ?>
                                <td><?php print($tema["orden"]); ?>.- <a target="_blank" rel="noopener noreferrer" href="<?php print($urlTema); ?>"><?php print($tema["nombre"]); ?></a></td>
                                <td class="text-right"><a target="_blank" rel="noopener noreferrer" href="<?php print($urlTema); ?>" class="btn btn-xs btn-success" data-toggle="tooltip" title="Ver">
                                        <i class="fa fa-play"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>