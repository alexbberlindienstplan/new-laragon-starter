<!doctype html>
<?php require_once '.assets/ini.php';?>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content name="description">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/architects-daughter" rel="stylesheet">
    <link href=".assets/localstyle.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center bg-secondary rounded-4 blue-border">
            <div class="col-10 mx-auto my-2">
                <h1>Laragon</h1>
                <ul class="list-group bg-dark">
                    <li class="list-group-item col-12 text-center text-yellow border-0 py-0">
                        <h4>Serverinfos</h4>
                    </li>
                    <?php echo outputInidata(); ?>
                </ul>


                <ul class="list-group bg-dark">

                    <li class="list-group-item col-12 text-center text-yellow border-0 py-0">
                        <h4>Hostliste
                            (<?php echo count(listHosts()); ?>)

                        </h4>
                    </li>
                    <li class="list-group-item">
                        <ul class="list-group list-group-horizontal d-flex py-0 bg-transparent">
                            <?php
							$projectItems = listHosts();
							foreach ($projectItems as $projectName) {
								echo '<li class="list-group-item flex-shrink-1 text-start text-yellow border-0 py-0">
					<a href="' . $projectName . '" target="_blank" class="text-decoration-none text-red">
					<i class="ps-1 bi bi-door-open"></i>' . $projectName . '</a></li>';
							} ?>

                        </ul>
                    </li>
                </ul>


                <ul class="list-group bg-dark">
                    <li class="list-group-item col-12 text-center text-yellow border-0 py-0">
                        <h4>Infotools</h4>
                    </li>
                    <li class="list-group-item">
                        <ul class="list-group list-group-horizontal d-flex py-0 bg-transparent">
                            <li class="list-group-item col-3 text-start text-blue border-0 py-0">Laragon Manual</li>
                            <li class="list-group-item flex-shrink-1 text-start text-yellow border-0 py-0">
                                <a href="https://laragon.org/docs" target="_blank"
                                    class="text-decoration-none text-red">Seite öffnen <i
                                        class="bi bi-door-open"></i></a>
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <ul class="list-group list-group-horizontal d-flex py-0 bg-transparent">
                            <li class="list-group-item col-3 text-start text-blue border-0 py-0">PHP Info</li>
                            <li class="list-group-item flex-shrink-1 text-start text-yellow border-0 py-0">
                                <a href=".assets/php_info.php" target="_blank"
                                    class="text-decoration-none text-red">Seite öffnen <i
                                        class="bi bi-door-open"></i></a>
                            </li>
                        </ul>
                    </li>
                </ul>


                <ul class="list-group bg-dark">
                    <li class="list-group-item col-12 text-center text-yellow border-0 py-0">
                        <h4>Tools</h4>
                    </li>
                    <li class="list-group-item">
                        <ul class="list-group list-group-horizontal d-flex py-0 bg-transparent">
                            <li class="list-group-item col-3 text-start text-blue border-0 py-0">PHP MyAdmin</li>
                            <li class="list-group-item flex-shrink-1 text-start text-yellow border-0 py-0">
                                <a href="https://localhost/phpmyadmin/" target="_blank"
                                    class="text-decoration-none text-red">Seite öffnen <i
                                        class="bi bi-door-open"></i></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>