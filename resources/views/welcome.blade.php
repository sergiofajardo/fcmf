<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FCMF</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

  button{
         border: none;
 background: #3a7999;
 color: #f2f2f2;
 padding: 10px;
 font-size: 12px;
 border-radius: 5px;
 position: relative;
 box-sizing: border-box;
 transition: all 500ms ease;

       }
      button:hover:before {
 width: 100%;
}

    button:before {
 content:'';
 position: absolute;
 top: 0px;
 left: 0px;
 width: 0px;
 height: 33px;
 background: rgba(255,255,255,0.3);
 border-radius: 5px;
 transition: all 2s ease;
}


        </style>
    </head>
    <body >
          <img src="../public/image/fcmf.png" width="100%" alt="Facultad de Ciencias Matematicas y Físicas" />
        

       
             <div class="wrapp" style="margin-top: 2;margin-bottom: 2">
                   <div id="navbar" style="text-align: right; margin-right: 10%; margin-bottom: 5px; " >
 
       @auth
                        <a href="{{ url('/home') }}"><input type="button" class="boton boton-hover" value="Inicio" /> </a>
                    @else
                        <a href="{{ route('login') }}">
                            <button>Iniciar Sesion</button></a>
                        <a href="{{ route('register') }}"> <button>Registrarse</button></a>
                    @endauth
 
</div>
             </div>
          
        
       
                 <div class="inner-wrap clearfix" style="background-color: white; margin-left: 10%;margin-right: 10%;margin-bottom: 3%">
                <form style="border-style: dotted; border-color: #045FB4;  width:100%; height: 100%; text-align: center;">
                 <br/>
                  <label style="font-size:16px;color: #045FB4; text-align:center"><b>
                       Asignación de espacios físicos a los docentes de la FCMF
                   </b>
                  </label>
                  <br/>
                  <br/>
                  <div style="text-align: center; color: black;" ><b> &nbsp; Propósito</b></div>
                  <p style="color: black;font-size: 10px; margin-left: 20px;margin-right: 20px; text-align: left;">
                   <b>
                 El proposito de este sitio web es poder administrar los horarios que tiene cada uno de los espacios físicos pertenecientes a la Facultad de Ciencias Matemáticas y Físicas los cuales pueden ser:
                  Aulas, Laboratorios, Cubículos. Los cuales son asignados por un tiempo determinado a cada docente que pertenece a la misma para que puedan cubrir sus horarios laborales dentro de la institución.
                </b>
                  </p>
                  <p style="color: black;font-size: 10px; margin-left: 20px;margin-right: 20px; text-align: left;">
                    <b>
                 De esta manera se podra proporcionar información a los estudiantes del horario que se le asigno a cada docente para poder cubrir con sus actividades y así podran acceder al sistema para verificar si hay algun cambio en los horarios asignados.
                 <b>
                  </p>
                   
              <br/>
               <label style="font-size:14px;color: #045FB4; text-align:center"><b>
                       Acerca de la Facultad de Ciencias Matemáticas y Físicas
                   </b>
               </label>
                 <img src="../public/image/FCMF_entrada.png" width="70%" height="300px" alt="Facultad de Ciencias Matematicas y Físicas" />
        
                    <p>

                    </p>

                </form>
                

            </div>
    </body>
</html>
