                                                                                                                                                                                                                                                                                                                                                                                     @extends('layouts.principal')

@section('style')

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
                <form id="registration_form" action="contact.php" method="post">
                    <div>
                        <label>
                            <input placeholder="Nombres:" type="text" tabindex="1" required autofocus>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input placeholder="Apellidos:" type="text" tabindex="2" required autofocus>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input placeholder="Email:" type="email" tabindex="3" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input placeholder="Telefono:" type="email" tabindex="3" required>
                        </label>
                    </div>
{{--                    <div class="sky_form1">
                        <ul>
                            <li><label class="radio left"><input type="radio" name="radio" checked=""><i></i>Male</label></li>
                            <li><label class="radio"><input type="radio" name="radio"><i></i>Female</label></li>
                            <div class="clearfix"></div>
                        </ul>
                    </div>--}}
                    <div>
                        <label>
                            <input placeholder="contraseña" type="password" tabindex="4" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input placeholder="confirmar cantraseña" type="password" tabindex="4" required>
                        </label>
                    </div>
                    <div>
                        <input type="submit" value="Registrarme" id="register-submit">
                    </div>
{{--                    <div class="sky-form">
                        <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>i agree to mobilya.com &nbsp;<a class="terms" href="#"> terms of service</a> </label>
                    </div>--}}
                </form>
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
                        <a href="#">Olvide mi contraseña</a>
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
        (function() {

            // Create input element for testing
            var inputs = document.createElement('input');

            // Create the supports object
            var supports = {};

            supports.autofocus   = 'autofocus' in inputs;
            supports.required    = 'required' in inputs;
            supports.placeholder = 'placeholder' in inputs;

            // Fallback for autofocus attribute
            if(!supports.autofocus) {

            }

            // Fallback for required attribute
            if(!supports.required) {

            }

            // Fallback for placeholder attribute
            if(!supports.placeholder) {

            }

            // Change text inside send button on submit
            var send = document.getElementById('register-submit');
            if(send) {
                send.onclick = function () {
                    this.innerHTML = '...Sending';
                }
            }

        })();
    </script>



@endsection