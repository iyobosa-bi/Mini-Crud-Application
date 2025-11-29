<?php

// define('ROOT',__DIR__);
// require_once ROOT.'/Controllers/Interactions.php';

require_once __DIR__ . '/autoload.php';

use Controllers\Interactions;


$db = new Interactions();
$users = $db->getAllUsers();

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Mini CRUD Table Application </title>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container p-3">
            <a class="navbar-brand ms-5" href=""><i class="fas fa-server"></i> Crud Application</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                <h4 class="text-center text-danger fw-medium">Crud Application with PHP OOP MVC,Ajax,SSMS/SQL
                    DataBase,SweetAlert</h4>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 ">
                <p class="mt-2 text-primary fw-bold">All Users in database</p>
            </div>
            <div class="col-md-6 text-md-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i
                        class="fa fa-plus-circle" aria-hidden="true"></i> Add New Users</button>
                <a href="#" class="btn btn-success "> <i class="fa fa-table" aria-hidden="true"></i> Export To Excel</a>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <?php if (count($users) > 0) { ?>
                    <div class="table-responsive">
                        <table id="tableList" class="table table-striped table-bordered table-sm">
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
                                foreach ($users as $index => $user) { ?>
                                    <tr class="text-center text-secondary">
                                        <td><?php echo $index + 1 ?></td>
                                        <td><?php echo $user['FirstName'] ?></td>
                                        <td><?php echo $user['LastName'] ?></td>
                                        <td><?php echo $user['Email'] ?></td>
                                        <td><?php echo $user['Telephone'] ?></td>
                                        <td>
                                            <a href="#" title="view details" class="text-success"> <i class="fa fa-info-circle"
                                                    aria-hidden="true"></i></a>
                                            <a href="#" title="edit details" class="text-primary"><i
                                                    class="fas fa-edit "></i></a>
                                            <a href="#" title="delete details" class="text-danger"> <i class="fa fa-trash"
                                                    aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>


                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning text-center">No Users found</div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-bold" id="exampleModalLabel">Add New User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4">
                    <form action="" method="post" id="mainFormElement">
                        <div class="form-group mb-2">
                            <!-- <label for="my-input">Text</label> -->
                            <input id="fname" class="form-control" type="text" name="fname"
                                placeholder="First Name goes here" required>
                        </div>
                        <div class="form-group mb-2">
                            <!-- <label for="my-input">Text</label> -->
                            <input id="lname" class="form-control" type="text" name="lname"
                                placeholder="Last Name goes here" required>
                        </div>
                        <div class="form-group mb-2">
                            <!-- <label for="my-input">Text</label> -->
                            <input id="email" class="form-control" type="email" name="email" placeholder="Email"
                                required>
                        </div>
                        <div class="form-group mb-2">
                            <!-- <label for="my-input">Text</label> -->
                            <input id="phone" class="form-control" type="tel" name="phone" placeholder="Telephone"
                                pattern="[0-9]*" inputmode="numeric" maxlength="11" required>
                        </div>

                        <button type="button" name="btnSubmit" class="col-12 btn btn-danger" id="btnSubmit">Add
                            User</button>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>

        <script src="jquery-3.7.1.min.js"></script>
        <script src="https://cdn.datatables.net/2.3.5/js/dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#phone').on('input', function () {
                    this.value = this.value.replace(/\D/g, "");
                });

                function showAllUsers() {
                    $.ajax({

                        type: 'GET',
                        url: 'Controllers/Process.php',
                        data: {
                            action: 'retrieve'
                        },
                        success: function (res) {

                            const mainData = JSON.parse(res);
                            console.log(typeof (mainData));
                            if (res.length > 0) {
                                if ($.fn.DataTable.isDataTable('#tableList')) {
                                    $('#tableList').DataTable().destroy();
                                }
                                var tbodyEntity = document.getElementById('tableList').getElementsByTagName('tbody')[0];
                                tbodyEntity.innerHTML = '';
                                // console.log(tbodyEntity);

                                let mainIndex = 0;

                                mainData.forEach(function (item) {

                                    // // console.log(item) //create  row
                                    // tbodyEntity.innerHTML += `<tr class="text-center text-secondary"><td>${mainIndex + 1}</td><td>${item.FirstName}</td><td>${item.LastName}</td><td>${item.Email}</td><td>${item.Telephone}</td><td>
                                    //  <a href="#" title="view details" class="text-success"> <i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                    //         <a href="#" title="edit details" class="text-primary"><i class="fas fa-edit "></i></a>
                                    //         <a href="#" title="delete details" class="text-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    // </td></tr>`
                                    let newRow = document.createElement('tr');
                                    newRow.className = 'text-center text-secondary';

                                    newRow.innerHTML = `
                                    <td>${mainIndex + 1}</td>
                                    <td>${item.FirstName}</td>
                                    <td>${item.LastName}</td>
                                    <td>${item.Email}</td>
                                    <td>${item.Telephone}</td>
                                    <td>
                                        <a href="#" title="view details" class="text-success"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                        <a href="#" title="edit details" class="text-primary"><i class="fas fa-edit"></i></a>
                                        <a href="#" title="delete details" class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                `;

                                    tbodyEntity.appendChild(newRow);


                                    mainIndex++
                                })

                                $('#tableList').DataTable({
                                    order: [0, 'desc']
                                });
                                // console.log(tbodyEntity);

                            }


                        }
                    });

                }
                function insertFormData() {
                    // console.log($('#mainFormElement').serialize());

                    $.ajax({
                        url: 'Controllers/Process.php',
                        type: 'POST',
                        data: $('#mainFormElement').serialize(),
                        success: function (res) {
                            console.log(res);
                            let parsedResponse;

                            parsedResponse = JSON.parse(res);
                            Swal.fire({
                                icon: parsedResponse.ResponseCode == "01" ? 'success' : 'error',
                                title: parsedResponse.ResponseMessage,
                                showConfirmButton: true
                            });

                            showAllUsers();
                            $('#exampleModal').modal('hide');
                            $('#mainFormElement')[0].reset();

                            // } catch (e) {
                            //     Swal.fire({
                            //         icon: 'error',
                            //         title: 'Invalid server response',
                            //         text: 'Could not parse server response.',
                            //         showConfirmButton: true
                            //     });
                            //     //  $('#exampleModal').modal('hide');
                            //     $('#mainFormElement')[0].reset();


                            // }
                        }
                    })
                }

                $('#tableList').DataTable({
                    order: [0, 'desc']
                    
                });



                $('#btnSubmit').off('click').on('click', function (e) {
                    e.preventDefault();
                    insertFormData();
                })

            })
        </script>

</body>

</html>