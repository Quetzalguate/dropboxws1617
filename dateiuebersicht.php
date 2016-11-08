<!-- Start Include Dateien -->
<?php include ("includes/bsfixednavbar.php"); ?>
<?php include ("includes/bsfooter.php"); ?>
<?php include ("includes/bseinbindung.php"); ?>
<!-- Ende Include Dateien -->


<!-- Start Dateiübersicht -->
<?php ?>
<!-- Ende Dateiübersicht -->


<!-- --------------------------------------------------- PHP -> HTML ----------------------------------------------- -->


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Dropbox - Dateiübersicht</title>

</head>

<body>
</br></br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h3><u>Dateiübersicht</u></h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Dateiname</th>
                            <th>Dateigröße</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dateiname-Variable
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">HTML</a></li>
                                        <li><a href="#">CSS</a></li>
                                        <li><a href="#">JavaScript</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>Dateigröße-Variable</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>