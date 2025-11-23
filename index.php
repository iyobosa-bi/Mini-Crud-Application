<?php

//initialized page for codes

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.5/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="assets/style.css">
    <title>Mini CRUD Table Application </title>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container p-3">
            <a class="navbar-brand ms-5" href=""><i class="fas fa-server"></i> Crud Application</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5" id="navbarNav">
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Amount</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h4 class="text-center text-danger fw-medium">Crud Application with PHP OOP MVC,Ajax,SSMS/SQL DataBase,SweetAlert</h4>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 ">
                <p class="mt-2 text-primary fw-bold">All Users in database</p>
            </div>
            <div class="col-md-6 text-md-end">
                <button type="button" class="btn btn-primary"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Users</button>
                <a href="#" class="btn btn-success "> <i class="fa fa-table" aria-hidden="true"></i> Export To Excel</a>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-table-striped table-bordered table-sm">
                        <thead>
                            <tr class="text-center">
                                <td>ID</td>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 

                            for($i=1;$i<=20;$i++){?>
                                 <tr class="text-center text-secondary">
                                <td><?php echo $i ?></td>
                                <td>User</td>
                                <td>Title 1</td>
                                <td>email.1@gmail.com</td>
                                <td>7896541254</td>
                                <td>
                                    <a href="#" title="view details" class="text-success"> <i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                     <a href="#" title="edit details" class="text-primary"><i class="fas fa-edit "></i></a>
                                      <a href="#" title="delete details" class="text-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                         <?php   }   ?>
                        
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        



    </div>


    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>