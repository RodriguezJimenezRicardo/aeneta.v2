@php
    $layout = 'layouts.index';
    $navbar = ['navbar' => true];

    if (Session::get('user')) {
        if (Session::get('user')->rol === 'Estudiante') {
            $layout = 'layouts.baseUser';
            $navbar = ['navbar' => true, 'id_estudiante' => Session::get('user')->id_estudiante];
        } elseif (Session::get('user')->rol === 'Docente') {
            $layout = 'layouts.baseUser';
            $navbar = ['navbar' => true, 'id_docente' => Session::get('user')->id_docente];
        }
    }
@endphp

@extends($layout, $navbar)

@section('title', 'Frequently Asked Questions')

@section('content')
<div class="faq-container">
    <header class="faq-header">
        <h1 class="faq-h1">Frequently Asked Questions</h1>
    </header>

    <main class="faq-main">
        <div class="faq-container">
            <div class="faq-item">
                <h2 class="faq-h2">¿Para qué sirve esta aplicación?</h2>
                <p class="faq-p"> Es una aplicación diseñada para apoyar a estudiantes, sinodales y profesores; incluso a externos para consultar tésis o trabajos terminales.</p>
            </div>
            <div class="faq-item">
                <h2 class="faq-h2">¿La aplicación es gratuita?</h2>
                <p class="p">Sí, fue diseñada para el uso del público general, pero enfocado a estudiantes y profesores que se encuentran en la realización de alguna tésis.</p>
            </div>
            <div class="faq-item">
                <h2 class="faq-h2">¿Qúe funcionalidades tiene?</h2>
                <p class="faq-p">Las funcionalidades que tiene esta aplicación son:</p>
                <ul>
                    <li>Subir tesis</li>
                    <li>Registrarse en la aplicción</li>
                    <li>Búsqueda avanzada</li>
                </ul>
            </div>
            <div class="faq-item">
                <h2 class="faq-h2">¿Qúe utipos de usuario tiene?</h2>
                <p class="p">Los usuarios con los que contamos son:</p>
                <ul>
                    <li>Administrador</li>
                    <li>Estudiante</li>
                    <li>Docente</li>
                </ul>
            </div>
            <div class="faq-item">
                <h2 class="faq-h2">¿Qúe metodos de Titulacion existen en ESCOM?</h2>
                <p class="faq-p">Las formas de titulacion que ofrece ESCOM son:</p>
                <ul>
                    <li>Curricular  <a href="https://www.canva.com/design/DAFAcbd_b90/view">Mas Info</a></li>
                    <li>Por Escolaridad  <a href="https://www.canva.com/design/DAFAcZiBktc/D4xWOUYvOQMCEWf-jpPstg/view">Mas Info</a></li>
                    <li>Creditos de Posgrado  <a href="https://www.canva.com/design/DAFAcIw2nOs/39iW05VaKUnYpfO3U4tp7w/view">Mas Info</a></li>
                    <li>Memoria de esperiencia profesional  <a href="https://www.canva.com/design/DAFAb3rzk_4/Ckb0r3SmcujSQWjcyXu8EQ/view">Mas Info</a></li>
                    <li>Trabajo de investigacion  <a href="https://www.canva.com/design/DAE_8dfd9nU/uwW9KuLADVRNLdRrRRx9cg/view">Mas Info</a></li>
                    <li>Tesis  <a href="https://www.canva.com/design/DAFAb0nSxAc/s86eIZXo8jq83Vi-F-S7BA/view?utm_content=DAFAb0nSxAc&utm_campaign=designshare&utm_medium=link&utm_source=homepage_design_menu">Mas Info</a></li>
                    <li>Examen de conocimientos   <a href="https://www.canva.com/design/DAFyH6l6HDE/EZ5dJm-3z0FlgKZqi7AeTw/view?utm_content=DAFyH6l6HDE&utm_campaign=designshare&utm_medium=link&utm_source=editor">Mas Info</a></li>
                    <li>Seminario de Tesis  <a href="https://www.canva.com/design/DAFM5nnTOyQ/fdPqFrB3f4VDGt6TPOe_jw/view?utm_content=DAFM5nnTOyQ&utm_campaign=designshare&utm_medium=link&utm_source=publishsharelink#1">Mas Info</a></li>
                    <li>Practica profesional  <a href="https://www.canva.com/design/DAFzh1_rer0/4GE3ODFL4640T5cJb5D9MA/view?utm_content=DAFzh1_rer0&utm_campaign=designshare&utm_medium=link&utm_source=editor">Mas Info</a></li>
                </ul>
            </div>
            <div class="faq-item">
                <h2 class="faq-h2">¿Qúe se necesita para tramitar el Examen de Acta profesional?</h2>
                <p class="faq-p">Para tramitar el Acta de Examen Profesional debes de contar con los siguientes documentos:</p>
                <ul>
                    <li>Carta de pasante: <br> El trámite se realiza <a href="https://www.sicert.ipn.mx/plataforma/login.aspx">aqui. </a> Para tramitarla requieres la boleta global certificada (emitida por Gestión Escolar)</li>
                    <li>Certificado total de estudios: <br> El trámite se realiza <a href=" https://www.sicert.ipn.mx/plataforma/login.aspx ">aqui. </a> Para tramitarla requieres la boleta global certificada (emitida por Gestión Escolar)</li>
                    <li>Constancia del dominio inglés (nivel B2):<br>Tipos de validación:<br>1. Aprobar nivel Avanzado 5 en CELEX o CENLEX del IPN;<br>2. Examen de 4 habilidades nivel B2;<br>3. Certificado Cambridge (previa validación: <a href="https://docs.google.com/forms/d/e/1FAIpQLScgDCCQvpQasxMBjv7mJ1A6fcsBQ1ldeBqhneaPP2BHZLxIUw/viewform?pli=1">aqui. </a>)<br>4. TOEFL ITP (puntuación de 543 a 626 puntos, previa validación: <a href="https://docs.google.com/forms/d/e/1FAIpQLScgDCCQvpQasxMBjv7mJ1A6fcsBQ1ldeBqhneaPP2BHZLxIUw/viewform">aqui. </a>)</li>
                    <li>Constancia de liberación de servicio social: <br>Versión impresa (año 2019 o previo) o versión digital (2020 o posterior)</li>
                    <li> Carta responsiva de Trabajo Terminal: <br> Documento emitido por la Comisión Académica de Trabajos Terminales (ejemplos: <a href="https://drive.google.com/file/d/11lU8n55zz52As71Cmv8q9AHJ-p3CLsR-/view?pli=1">aqui. </a>)</li>
                </ul>
            </div>
        </div>
    </main>

    <footer class="faq-footer">
        <p>&copy; 2024 Challenge team</p>
    </footer>
</div>
@endsection

