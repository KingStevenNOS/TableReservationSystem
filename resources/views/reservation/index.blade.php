<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Table Reservation System Shapes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <nav class="nav nav-fill m-2 mr-5">
            <li class="nav-item">
                <a class="nav-link" href="#">Table Reservation System</a>
            </li>
            <li class="nav-item">
                <li ><a href="" class="nav-link">Home</a></li>
                <li ><a href="" class="nav-link">About Us</a></li>
                <li><a href="" class="nav-link">Portfolio</a></li>
                <li ><a href="" class="nav-link">Blog</a></li>
                <li ><a href="" class="nav-link">Contact us</a></li>
            </li>
        </nav>
        <div class="container">
            <div class="container-fluid text-center">
                <div class="form-group admin-menu">
                    <div class="row">
                        <form method="POST" action="update.php">
                            <div class="col-sm-2 col-sm-offset-3 form-group">
                                <label>Width (px)</label>
                                <input type="number" id="width" class="form-control" value="302" name="width" />
                            </div>
                            <div class="col-sm-2 form-group">
                                <label>Height (px)</label>
                                <input type="number" id="height" class="form-control" value="812" name="height" />
                            </div>
                            <div class="col-sm-2 form-group">
                                <label>&nbsp;</label>
                                <br />
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-primary rectangle">+ &#9647; Table</button>
                        <button class="btn btn-primary circle">+ &#9711; Table</button>
                        <button class="btn btn-primary triangle">+ &#9651; Table</button>
                        <button class="btn btn-primary chair">+ Chair</button>
                        <button class="btn btn-primary bar">+ Bar</button>
                        <button class="btn btn-default wall">+ Wall</button>
                        <button class="btn btn-danger remove">Remove</button>
                        <button class="btn btn-warning customer-mode">Customer mode</button>
                    </div>
                </div>

                <div class="form-group customer-menu" style="display: none;">
                    <div class="btn-group">
                        <button class="btn btn-success submit">Submit reservation</button>
                        <button class="btn btn-warning admin-mode">Admin mode</button>
                    </div>
                    <br />
                    <br />
                    <div id="slider"></div>
                    <div id="slider-value"></div>
                </div>

                <canvas id="canvas" width="302" height="812"></canvas>
            </div>

            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <p id="modal-table-id"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" async defer></script>
        <script src="js/fabric.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
