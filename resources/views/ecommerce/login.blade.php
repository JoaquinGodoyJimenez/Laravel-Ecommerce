@extends('layout.layout')

@section('title','Login')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Login & Register</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">    
                <div class="register-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label>First Name</label>
                            <input id="first_name" class="form-control" type="text" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input id="last_name" class="form-control" type="text" placeholder="Last Name">
                        </div>
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input id="email" class="form-control" type="text" placeholder="E-mail">
                        </div>
                        <div class="col-md-6">
                            <label>Phone</label>
                            <input id="phone" class="form-control" type="text" placeholder="Phone">
                        </div>
                        <div class="col-md-12">
                            <label>Address</label>
                            <input id="address" class="form-control" type="text" placeholder="Address">
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input id="password" class="form-control" type="password" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <label>Retype Password</label>
                            <input id="retype_password" class="form-control" type="password" placeholder="Password">
                        </div>                        
                        <div class="col-md-12">
                            <button id="register_button" class="btn">Register</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label>E-mail / Username</label>
                            <input class="form-control" type="text" placeholder="E-mail / Username">
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control" type="text" placeholder="Password">
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#register_button').click(function () {
            console.log("Botón Register clickeado.");
            // Obtén los valores de los campos de entrada
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var password = $('#password').val();
            var retypePassword = $('#retype_password').val();            

            // Verifica si las contraseñas coinciden
            if (password !== retypePassword) {
                alert("Las contraseñas no coinciden.");
                return;
            }

            // Crea un objeto con los datos del usuario
            var userData = {
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone: phone,
                address: address,
                password: password
            };

            // Envía la solicitud AJAX a la API
            $.ajax({
                url: 'http://localhost:3000/api/v1/users/',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(userData),
                success: function (response) {
                    alert("Registro exitoso");
                },
                error: function (error) {
                    alert("Error en el registro: " + error.responseText);
                }
            });
        });
    });
</script>

<!-- Login End -->
@endsection