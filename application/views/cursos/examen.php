<link rel="stylesheet" href="<?php print(base_url("static/slick-quiz/slickQuiz.css")) ?>">
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-advanced">
                <div class="widget-main">
                    <div id="slickQuiz" class="row">
			            <h1 class="quizName"></h1>
			            <div>Tiempo Restante: <h1 id="cronometroExamen"></h1><h2 id="resueltoEn"></h2></div>
                        <div id="ocultoHastaFin">
                            <form method="POST" action="<?php print(base_url("cursos/".$curso['codigo_uri']."/validar_examen")) ?>">
                                <div class="col-md-6">
                                    <div class="block-section">
                                        <button type="submit" class="btn btn-lg btn-primary" name="aceptarFinExamen">Confirmar Resultado.</button>
                                        <input type="hidden" name="quizScore" id="quizScore2" class="quizScore2">
                                        <input type="hidden" name="id_curso" id="id_curso" value="<?php print($curso['id_curso']) ?>">
                                        <input type="hidden" name="id_examen" id="id_examen">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="quizArea">
			                <div class="quizHeader">
			                    <a id="iniciarExamen" class="button startQuiz" href="#">Empezar.</a>
			                </div>
			            </div>
			            <div class="quizResults">
			                <h3 class="quizScore">Tu Puntaje: <span></span></h3>
			                <h3 class="quizLevel"><strong>Posicion:</strong><span></span></h3>
			                <div class="quizResultsCopy"></div>
			            </div>
			        </div>
        		</div>
            </div>
        </div>
    </div>
</div>
<!-- FUNCIONALIDADES JS -->
<script src="<?php print(base_url("static/slick-quiz/slickQuiz.js")) ?>"></script>
<script src="<?php print(base_url("static/slick-quiz/jquery.timer.js")) ?>"></script>
<script type="text/javascript">
function pad(number, length) {
    var str = '' + number;
    while (str.length < length) {str = '0' + str;}
    return str;
};
function formatTime(time) {
    var min = parseInt(time / 6000),
        sec = parseInt(time / 100) - (min * 60),
        hundredths = pad(time - (sec * 100) - (min * 6000), 2);
    return (min > 0 ? pad(min, 2) : "00") + ":" + pad(sec, 2) + ":" + hundredths;
};
function obtenerExamen() {
    var examen={};
    $.ajaxSetup({async: false});
    $.getJSON("<?php print(base_url("examen/obtener_examen_por_curso/".$curso['id_curso'])) ?>",function(response) {
        if(response==null||response.nombre==null||response.nombre==""){
            Swal.fire({
                title: "Error",
                text: "El examen no ha cargado Correctamente, por favor, actualize la pagina.",
                type: "error"});
        }
        var preguntasJson=JSON.parse(response.preguntas);
        var instrucciones=response.instrucciones;
        instrucciones=instrucciones.replace("#nroPreguntas",preguntasJson.length);
        instrucciones=instrucciones.replace("#tiempo",response.tiempo);
        examen={
            id_examen: response.id_examen,
            preguntas: preguntasJson, 
            tiempo: response.tiempo,
            nombre: response.nombre, 
            instrucciones: instrucciones
        };
    });
    return examen;
};
var examen=obtenerExamen();
var tiempoMinutos=examen.tiempo;
var id_examen=examen.id_examen;
var quizJSON = {
    "info": {
        "name":    "<h1>"+examen.nombre+"</h1>",
        "main":    "<p><b> Instrucciones del examen: </b> "+examen.instrucciones+"</p>",
        "results": "<h2> El Examen : "+examen.nombre+", ha Terminado."+"</h2><h3><b>Revise las respuestas.</b></h3>",
        "level1":  "Master",
        "level2":  "Senior",
        "level3":  "Semi Senior",
        "level4":  "Developer",
        "level5":  "Junior"
    },
    "questions": examen.preguntas
};
$(document).ready(function() {
    var opcionesExamen={
    	scoreAsPercentage: true,
    	checkAnswerText:"Revisar respuesta",
    	nextQuestionText:"Siguiente >>",
    	completeQuizText: "Terminar Examen.",
    	backButtonText: "<< Anterior",
    	tryAgain: false,
    	preventUnansweredText: "Debe seleccionar una respuesta.",
    	questionCountText: "Pregunta %current de %total",
    	questionTemplateText: "%count.- %text",
    	scoreTemplateText: "%score / %total",
    	nameTemplateText: "<span> Pregunta : </span>%name",
    	skipStartButton: false,
    	numberOfQuestions: null,//null todas
    	randomSortQuestions: true,//cambia aqui
    	randomSortAnswers: true,
    	preventUnanswered: false,//cambiar para forzar a seleccionar respuesta
    	perQuestionResponseMessaging: false,//aqui cambia
    	perQuestionResponseAnswers: false,//aqui cambia
    	completionResponseMessaging: true,
    	displayQuestionCount: true,
    	displayQuestionNumber: true,
    	disableScore: false,
    	disableRanking: false//cambia aqui
    };
    var examen=$("#slickQuiz").slickQuiz(opcionesExamen);
    var tiempoExamen=(tiempoMinutos*60*100);
    $("#cronometroExamen").html(tiempoMinutos+" minutos.");
    var cronometroExamen = new (function() {
        var $countdown,
            incrementTime = 70,
            currentTime = tiempoExamen,//tiempo en milisegundos
            updateTimer = function() {
                $countdown.html(formatTime(currentTime));
                if (currentTime == 0) {
                    cronometroExamen.Timer.stop();
                    timerComplete();
                    return;
                }
                currentTime -= incrementTime/10;
                if (currentTime < 0)currentTime=0;
            },
            timerComplete = function() {
                var url="<?php print(base_url("cursos/".$curso["codigo_uri"])) ?>";
                Swal.fire({
                    title: "Examen Concluido",
                    text: "Tiempo de Examen ha Terminado.",
                    type: "error",
                    allowOutsideClick: false,
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar mi error :(",
                }).then((result) => {
                  if (result.value) {
                    $(location).attr("href",url);
                  }
                });
                //alert("Tiempo de Examen ha Terminado.");
            },
            init = function() {
                $countdown = $("#cronometroExamen");
                cronometroExamen.Timer=$.timer(updateTimer, incrementTime,false);
            };
        $(init);
    });
    var fechaInicio,fechaFin="";
    $("#ocultoHastaFin").hide();
    $("#iniciarExamen").click(function() {
    	var objetoInicio=cronometroExamen.Timer.play(true);
    	fechaInicio=objetoInicio.last;
    });
    $(".lastQuestion").click(function() {
        var quizScore=$(".quizScore").html();
        var quizLevel=$(".quizLevel").html();
        var quizResultsCopy=$(".quizResultsCopy").html();
        var objetoPausa=cronometroExamen.Timer.pause();
        fechaFin=objetoPausa.last;
        cronometroExamen.Timer.stop();
        var lapso=(fechaFin.getTime()-fechaInicio.getTime())/1000;
        $("#resueltoEn").html(" Termino examen en : "+lapso+" segundos");
        $("#ocultoHastaFin").show();
        $("#id_examen").val(id_examen);
        $("#quizScore2").val(quizScore);
    });
});
</script>