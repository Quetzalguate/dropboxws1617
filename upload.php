<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>MinimalBox - Profil</title>
        <link rel='shortcut icon' type='image/x-icon' href='images/minimalboxfavicon.ico' />

        <!-- Start Include Dateien -->
        <?php include ("includes/bsfixednavbar.php"); ?>
        <?php include ("includes/bsfooter.php"); ?>
        <?php include ("includes/bseinbindung.php"); ?>
        <?php echo $_COOKIE["background"]; ?>
        <!-- Ende Include Dateien -->

    </head>
    <body>
        </br></br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>Lade eine Datei hoch</h3>
                    <form>
                        <input id="input-1" type="file" class="file" align="center">
                        </br>
                        <button type="submit" class="btn btn-default">Datei hochladen</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- --------------------------------------------------- HTML -> PHP ----------------------------------------------- -->

    </body>
</html>