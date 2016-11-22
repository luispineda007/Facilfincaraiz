                                                                                                                                                                                                                                                                                                                                                                                     @extends('layouts.principal')

@section('style')

    <style>
        .cargando {
            font-size: 16px;
        }
        .rol{

        }
        .btn-default:active, .btn-default.active {
            color: #fff;
            background-color: #e8573e;
            border-color: #c1c1c1;
        }

        .btn-default:active:hover, .btn-default.active:hover, .btn-default:active:focus, .btn-default.active:focus, .btn-default:active.focus, .btn-default.active.focus {
            color: #fff;
            background-color: #e8573e;
            border-color: #c1c1c1;
        }
        .btn-default:hover {
            color: #fff;
            background-color: rgba(253, 88, 63, 0.45);
            border-color: #c1c1c1;;
        }
        .has-error{
            border: red solid 1px !important;
        }

        .has-success{
            border: #058313 solid 1px !important;
        }
    </style>

@endsection

@section('content')
    <!---->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route("home")}}">Inicio</a></li>
            <li class="active">Registro</li>
        </ol>
        <div class="registration">
            <div class="registration_left">
                <h2>Usuario nuevo? <span> crea una cuenta </span></h2>

                <div class="registration_form">
                    <!-- Form -->
                    {!!Form::open(['id' => 'formRegistro'])!!}

                    <h4>Registrarse como:</h4>
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-default rol active" data-rol="Propietario">Propietario</button>
                        <button type="button" class="btn btn-default rol" data-rol="Comisionista">Comisionista</button>
                        <button type="button" class="btn btn-default rol" data-rol="Inmobiliaria">Inmobiliaria</button>
                    </div>
                    <div class="hidden">
                        <input name="razon" placeholder="Nombre o Razon Social" type="text" class="inmobiliaria" required autofocus disabled >
                    </div>
                    <div class="hidden">
                        <input name="nit" placeholder="NIT: xxxxxxxxxx-x" type="text" class="inmobiliaria" required autofocus disabled>
                    </div>
                    <div>
                        <input name="nombres" placeholder="Nombres:" type="text"  required autofocus onkeypress="return justletters(event)">
                    </div>
                    <div>
                        <input name="apellidos" placeholder="Apellidos:" type="text" required onkeypress="return justletters(event)">
                    </div>
                    <div>
                        <input id="correo" name="email" placeholder="Email:" type="email" required>
                    </div>
                    <div>
                        <input name="telefono" placeholder="Telefono:" type="text" required minlength="7" maxlength="10" onkeypress="return justNumbers(event)">
                    </div>
                    <div class="hidden">
                        <input name="telefono2" placeholder="Telefono 2:" type="text" class="inmobiliaria" required disabled minlength="7" maxlength="10" onkeypress="return justNumbers(event)">
                    </div>
                    {{--                    <div class="sky_form1">
                                            <ul>
                                                <li><label class="radio left"><input type="radio" name="radio" checked=""><i></i>Male</label></li>
                                                <li><label class="radio"><input type="radio" name="radio"><i></i>Female</label></li>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>--}}
                    <div>
                        <input name="password" placeholder="contraseña" type="password" required>
                    </div>
                    <div>
                        <input name="cpassword" placeholder="confirmar cantraseña" type="password" required>
                    </div>
                    <div id="alertContacto" class="form-group ">


                    </div>
                    <div>
                        <button class="mybutton " type="submit" id="submitForm">Registrarme! <i
                                    class="fa fa-spinner fa-pulse fa-3x fa-fw cargando hidden"></i>
                            <span class="sr-only">Loading...</span></button>
                    </div>
                {{--                    <div class="sky-form">
                                        <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>i agree to mobilya.com &nbsp;<a class="terms" href="#"> terms of service</a> </label>
                                    </div>--}}
                {!!Form::close()!!}
                <!-- /Form -->
                </div>
            </div>
            <div class="registration_left">
                <h2>Ya tienes una cuenta</h2>
                <div class="registration_form">
                    <!-- Form -->
                    {!!Form::open(['route' => 'login'])!!}
                    <div>
                        <label>
                            <input name="email" placeholder="email:" type="email" tabindex="3" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input name="password" placeholder="contraseña" type="password" tabindex="4" required>
                        </label>
                    </div>
                    <div>
                        <input type="submit" value="Iniciar Sesión" id="register-submit">
                    </div>
                    <div class="forget">
                        <a href="{{route("getEmail")}}">Olvide mi contraseña</a>
                    </div>
                {!!Form::close()!!}
                <!-- /Form -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!---->
@endsection

@section('scripts')

    <script>
        (function () {

            // Create input element for testing
            var inputs = document.createElement('input');

            // Create the supports object
            var supports = {};

            supports.autofocus = 'autofocus' in inputs;
            supports.required = 'required' in inputs;
            supports.placeholder = 'placeholder' in inputs;

            // Fallback for autofocus attribute
            if (!supports.autofocus) {

            }

            // Fallback for required attribute
            if (!supports.required) {

            }

            // Fallback for placeholder attribute
            if (!supports.placeholder) {

            }

            // Change text inside send button on submit
            var send = document.getElementById('register-submit');
            if (send) {
                send.onclick = function () {
                    this.innerHTML = '...Sending';
                }
            }

        })();

        var usuario_tipo;
        $(function () {


            $("#correo").blur(function(){
                expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if ($(this).val() != ""){
                    if (!expr.test($(this).val())) {
                        $(this).addClass("has-error");
                        $(this).focus();
                    }
                    else {
                        $(this).removeClass("has-error");
                        $(this).addClass("has-success");
                    }
                }
                else {
                    $(this).removeClass("has-error");
                    $(this).removeClass("has-success");
                }
            });




            usuario_tipo="Propietario";

            $(".rol").click(function () {
                $(".rol").removeClass("active");
                $(this).addClass("active");

                if($(this).data("rol")=="Inmobiliaria"){
                    $(".inmobiliaria").parent().removeClass("hidden");
                    $(".inmobiliaria").attr("disabled", false);
                    usuario_tipo=$(this).data("rol");
                }else{
                    $(".inmobiliaria").parent().addClass("hidden");
                    $(".inmobiliaria").attr("disabled", true);
                    usuario_tipo= $(this).data("rol");
                }
            });

            var formRegistro = $("#formRegistro");
            formRegistro.submit(function (e) {
                e.preventDefault();
                console.log(formRegistro.serialize());
                $(".cargando").removeClass("hidden");
                $.ajax({
                    type: "POST",
                    context: document.body,
                    url: '{{route('registroUserPost')}}',
                    data: formRegistro.serialize()+"&usuario_tipo="+usuario_tipo,
                    success: function (data) {
                        $(".cargando").addClass("hidden");
                        $("#alertContacto").empty();
                        if (data == "exito") {
                            html = '<div class="alert alert-success">' +
                                    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                                    '<strong>Perfecto!</strong> ya tienes una cuenta en FacilFicaRaiz' +
                                    '</div>';
                            $("#alertContacto").append(html);
                        }
                        else if(data=="existe") {
                            html = '<div class="alert alert-danger">' +
                                    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                                    '<strong>Ups!</strong> este correo ya se encuentra en uso por otro usuario' +
                                    '</div>';
                            $("#alertContacto").append(html);
                        }else{
                            html = '<div class="alert alert-danger">' +
                                    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                                    '<strong>Ups!</strong> No fue posible crear la cuenta ...' +
                                    '</div>';
                            $("#alertContacto").append(html);
                        }
                    },
                    error: function () {
                        console.log('ok');
                    }
                });
            });


        });

        function justNumbers(e)
        {
            var keynum = window.event ? window.event.keyCode : e.which;
            if (keynum == 8)
                return true;
            return /\d/.test(String.fromCharCode(keynum));
        }

        function justletters(e) {
            var keynum = window.event ? window.event.keyCode : e.which;
            patron =/[A-Za-zñÑ\s]/;
            te = String.fromCharCode(keynum);
            return patron.test(te);
        }
    </script>



@endsection