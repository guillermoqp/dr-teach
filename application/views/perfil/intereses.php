<div class="row draggable-blocks">
    <form method="POST">
    <div class="col-sm-4 column">         
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="python" <?php print(in_array("python",$interesesUsuario)?"checked":"")?>> Python</p>
        </div>
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="ruby" <?php print(in_array("ruby",$interesesUsuario)?"checked":"")?>> Ruby</p>
        </div>
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="php" <?php print(in_array("php",$interesesUsuario)?"checked":"")?>> PHP</p>
        </div>
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="javascript" <?php print(in_array("javascript",$interesesUsuario)?"checked":"")?>> Javascript</p>
        </div>
    </div>

    <div class="col-sm-4 column">
    	<div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="htmlcss" <?php print(in_array("htmlcss",$interesesUsuario)?"checked":"")?>> HTML/CSS</p>
        </div>
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="ios" <?php print(in_array("ios",$interesesUsuario)?"checked":"")?>> iOS</p>
        </div>
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="android" <?php print(in_array("android",$interesesUsuario)?"checked":"")?>> Android</p>
        </div>
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="base-de-datos" <?php print(in_array("base-de-datos",$interesesUsuario)?"checked":"")?>> Base de datos</p>
        </div>
    </div>

    <div class="col-sm-4 column">
    	<div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="servidores" <?php print(in_array("servidores",$interesesUsuario)?"checked":"")?>> Servidores</p>
        </div>

        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="electivos" <?php print(in_array("electivos",$interesesUsuario)?"checked":"")?>> Electivos</p>
        </div>
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="illustrator" <?php print(in_array("illustrator",$interesesUsuario)?"checked":"")?>> Illustrator</p>
        </div>
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"><i class="fa fa-user"></i></a>
                </div>
            </div>
            <p><input type="checkbox" name="intereses[]" value="java" <?php print(in_array("java",$interesesUsuario)?"checked":"")?>> Java</p>
        </div>
    </div>
    <hr/>
    <div class="col-md-3">
        <button type="submit" class="btn btn-sm btn-primary" name="btnGuardarIntereses"><i class="fa fa-angle-right"></i> Guardar</button>
        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
    </div>
    <hr/>
    </form>
</div>