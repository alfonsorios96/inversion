<!DOCTYPE HTML>
<!--
	Slate by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html lang="es">
	<head>
		<title>Inversión tu casa | Inmuebles</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<?php
			include 'decorador.html';
		?>
	</head>
	<body>

		<?php
			include 'header2.html';
		?>

		<!-- Three -->
			<section id="three" class="wrapper style2">
				<div class="inner">
					<h2>Casas, departamentos y terrenos</h2>
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="text" id="filtro" class="typeahead" placeholder="Colonia / Tipo de inmueble">
						</div>
						<div class="6u 12u$(xsmall)">
							<a class="button special" data-bind="click: filtrar">Filtrar</a>
						</div>
					</div><hr>
					<div class="table-wrapper">
						<table>
							<thead>
								<th>Imagen</th>
								<th>Ubicación</th>
								<th>Recámaras</th>
								<th>Baños</th>
								<th>Detalles</th>
								<th>Acciones</th>
							</thead>
							<tbody data-bind="foreach: inmuebles">
								<td>
									<span class="image"><img data-bind="attr: {src: 'images/inmuebles/' + expediente() + '/thumbnail/' + pic()}" /></span>
								</td>
								<td>
									<span class="icon fa-home"></span> <span data-bind="text: ubicacion()"></span>
								</td>
								<td>
									<span class="icon fa-bed"></span> <span data-bind="text: rec()"></span>
								</td>
								<td>
									<span class="icon fa-bed"></span> <span data-bind="text: ban()"></span>
								</td>
								<td>
									<span class="icon fa-usd"></span> <span data-bind="text: deseado()"></span>
								</td>
								<td>
									<span class="icon fa-info"></span> <a data-bind="click: $root.openModal()">Detalles</a>
								</td>
							</tbody>
						</table>
					</div>
				</div>
				<div class="inner">
					<div id="myModal" class="modal fade">
					    <div class="modal-dialog modal-lg">
					        <div class="modal-content">
					            <div class="modal-header">
					            	<span class="fa fa-times" type="button" data-dismiss="modal" aria-hidden="true"></span>
					                <h4 class="modal-title">¡Adquiérela hoy mismo!</h4>
					            </div>
					            <div class="modal-body">
					            	<h2>Llama al 59-42-87-69 y pregunta por ella</h2>
					            	<div class="table-wrapper">
				                		<table>
				                			<thead>
				                				<th>Inmueble</th>
				                				<th>Zona</th>
				                				<th>Costo</th>
												<th>Descripción</th>
												<th>Baños</th>
												<th>Recámaras</th>
				                			</thead>
				                			<tbody>
				                				<td>512</td>
				                				<td>Plaza satélite</td>
			                					<td>$1,000,000</td>
				                				<td>Cerca de una plaza comercial</td>
				                				<td>Tienen una plomería decente</td>
				                				<td>Tapizados y con arreglos</td>
				                			</tbody>
				                		</table>
				                	</div>
				                	<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 800px;
								        height: 456px; background: #191919; overflow: hidden;">

								        <!-- Loading Screen -->
								        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
								            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
								                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
								            </div>
								            <div style="position: absolute; display: block; background: url(images/loading.gif) no-repeat center center;
								                top: 0px; left: 0px;width: 100%;height:100%;">
								            </div>
								        </div>

								        <!-- Slides Container -->
								        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 800px; height: 356px; overflow: hidden;">
								            <div>
								                <img u="image" src="images/alila/01.jpg" />
								                <img u="thumb" src="images/alila/thumb-01.jpg" />
								            </div>
								            <div>
								                <img u="image" src="images/alila/02.jpg" />
								                <img u="thumb" src="images/alila/thumb-02.jpg" />
								            </div>
								            <div>
								                <img u="image" src="images/alila/03.jpg" />
								                <img u="thumb" src="images/alila/thumb-03.jpg" />
								            </div>
								            <div>
								                <img u="image" src="images/alila/04.jpg" />
								                <img u="thumb" src="images/alila/thumb-04.jpg" />
								            </div>
								            <div>
								                <img u="image" src="images/alila/05.jpg" />
								                <img u="thumb" src="images/alila/thumb-05.jpg" />
								            </div>
								            <div>
								                <img u="image" src="images/alila/06.jpg" />
								                <img u="thumb" src="images/alila/thumb-06.jpg" />
								            </div>
								            <div>
								                <img u="image" src="images/alila/07.jpg" />
								                <img u="thumb" src="images/alila/thumb-07.jpg" />
								            </div>
								            <div>
								                <img u="image" src="images/alila/08.jpg" />
								                <img u="thumb" src="images/alila/thumb-08.jpg" />
								            </div>
								            <div>
								                <img u="image" src="images/alila/09.jpg" />
								                <img u="thumb" src="images/alila/thumb-09.jpg" />
								            </div>
								            <div>
								                <img u="image" src="images/alila/10.jpg" />
								                <img u="thumb" src="images/alila/thumb-10.jpg" />
								            </div>
								            
								            <div>
								                <img u="image" src="images/alila/11.jpg" />
								                <img u="thumb" src="images/alila/thumb-11.jpg" />
								            </div>
								            <div>
								                <img u="image" src="images/alila/12.jpg" />
								                <img u="thumb" src="images/alila/thumb-12.jpg" />
								            </div>
								        </div>
								        
								        <!--#region Arrow Navigator Skin Begin -->
								        <style>
								            /* jssor slider arrow navigator skin 05 css */
								            /*
								            .jssora05l                  (normal)
								            .jssora05r                  (normal)
								            .jssora05l:hover            (normal mouseover)
								            .jssora05r:hover            (normal mouseover)
								            .jssora05l.jssora05ldn      (mousedown)
								            .jssora05r.jssora05rdn      (mousedown)
								            */
								            .jssora05l, .jssora05r {
								                display: block;
								                position: absolute;
								                /* size of arrow element */
								                width: 40px;
								                height: 40px;
								                cursor: pointer;
								                background: url(images/a17.png) no-repeat;
								                overflow: hidden;
								            }
								            .jssora05l { background-position: -10px -40px; }
								            .jssora05r { background-position: -70px -40px; }
								            .jssora05l:hover { background-position: -130px -40px; }
								            .jssora05r:hover { background-position: -190px -40px; }
								            .jssora05l.jssora05ldn { background-position: -250px -40px; }
								            .jssora05r.jssora05rdn { background-position: -310px -40px; }
								        </style>
								        <!-- Arrow Left -->
								        <span u="arrowleft" class="jssora05l" style="top: 158px; left: 8px;">
								        </span>
								        <!-- Arrow Right -->
								        <span u="arrowright" class="jssora05r" style="top: 158px; right: 8px">
								        </span>
								        <!--#endregion Arrow Navigator Skin End -->
								        <!--#region Thumbnail Navigator Skin Begin -->
								        <!-- Help: http://www.jssor.com/development/slider-with-thumbnail-navigator-jquery.html -->
								        <style>
								            /* jssor slider thumbnail navigator skin 01 css */
								            /*
								            .jssort01 .p            (normal)
								            .jssort01 .p:hover      (normal mouseover)
								            .jssort01 .p.pav        (active)
								            .jssort01 .p.pdn        (mousedown)
								            */

								            .jssort01 {
								                position: absolute;
								                /* size of thumbnail navigator container */
								                width: 800px;
								                height: 100px;
								            }

								                .jssort01 .p {
								                    position: absolute;
								                    top: 0;
								                    left: 0;
								                    width: 72px;
								                    height: 72px;
								                }

								                .jssort01 .t {
								                    position: absolute;
								                    top: 0;
								                    left: 0;
								                    width: 100%;
								                    height: 100%;
								                    border: none;
								                }

								                .jssort01 .w {
								                    position: absolute;
								                    top: 0px;
								                    left: 0px;
								                    width: 100%;
								                    height: 100%;
								                }

								                .jssort01 .c {
								                    position: absolute;
								                    top: 0px;
								                    left: 0px;
								                    width: 68px;
								                    height: 68px;
								                    border: #000 2px solid;
								                    box-sizing: content-box;
								                    background: url(images/t01.png) -800px -800px no-repeat;
								                    _background: none;
								                }

								                .jssort01 .pav .c {
								                    top: 2px;
								                    _top: 0px;
								                    left: 2px;
								                    _left: 0px;
								                    width: 68px;
								                    height: 68px;
								                    border: #000 0px solid;
								                    _border: #fff 2px solid;
								                    background-position: 50% 50%;
								                }

								                .jssort01 .p:hover .c {
								                    top: 0px;
								                    left: 0px;
								                    width: 70px;
								                    height: 70px;
								                    border: #fff 1px solid;
								                    background-position: 50% 50%;
								                }

								                .jssort01 .p.pdn .c {
								                    background-position: 50% 50%;
								                    width: 68px;
								                    height: 68px;
								                    border: #000 2px solid;
								                }

								                * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
								                    /* ie quirks mode adjust */
								                    width /**/: 72px;
								                    height /**/: 72px;
								                }
								        </style>

								        <!-- thumbnail navigator container -->
								        <div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;">
								            <!-- Thumbnail Item Skin Begin -->
								            <div u="slides" style="cursor: default;">
								                <div u="prototype" class="p">
								                    <div class=w><div u="thumbnailtemplate" class="t"></div></div>
								                    <div class=c></div>
								                </div>
								            </div>
								            <!-- Thumbnail Item Skin End -->
								        </div>
								        <!--#endregion Thumbnail Navigator Skin End -->
								        <a style="display: none" href="http://www.jssor.com">Image Slider</a>
								    </div>
					            </div>
					            <div class="modal-footer">
					                <button type="button" class="button" data-dismiss="modal">Cerrar</button>
					            </div>
					        </div>
					    </div>
					</div>
				</div>
			</section>

		<?php
			include 'footer.html';
		?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			<script src="frontend/knockout-min.js"></script>
			<script src="frontend/model.js"></script>
			<script src="frontend/controller.js"></script>
			<script src="assets/js/typeahead.js"></script>
			<script type="text/javascript">
			$(document).ready(function(){
				
				ko.applyBindings(new ControllerMain());
			});
			</script>
			<script type="text/javascript" src="assets/js/jssor.js"></script>
		    <script type="text/javascript" src="assets/js/jssor.slider.js"></script>
		    <script>

		        jQuery(document).ready(function ($) {

		            var _SlideshowTransitions = [
		            //Fade in L
		                {$Duration: 1200, x: 0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
		            //Fade out R
		                , { $Duration: 1200, x: -0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
		            //Fade in R
		                , { $Duration: 1200, x: -0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
		            //Fade out L
		                , { $Duration: 1200, x: 0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

		            //Fade in T
		                , { $Duration: 1200, y: 0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
		            //Fade out B
		                , { $Duration: 1200, y: -0.3, $SlideOut: true, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
		            //Fade in B
		                , { $Duration: 1200, y: -0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
		            //Fade out T
		                , { $Duration: 1200, y: 0.3, $SlideOut: true, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

		            //Fade in LR
		                , { $Duration: 1200, x: 0.3, $Cols: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
		            //Fade out LR
		                , { $Duration: 1200, x: 0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
		            //Fade in TB
		                , { $Duration: 1200, y: 0.3, $Rows: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
		            //Fade out TB
		                , { $Duration: 1200, y: 0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

		            //Fade in LR Chess
		                , { $Duration: 1200, y: 0.3, $Cols: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
		            //Fade out LR Chess
		                , { $Duration: 1200, y: -0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
		            //Fade in TB Chess
		                , { $Duration: 1200, x: 0.3, $Rows: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
		            //Fade out TB Chess
		                , { $Duration: 1200, x: -0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

		            //Fade in Corners
		                , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
		            //Fade out Corners
		                , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $SlideOut: true, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }

		            //Fade Clip in H
		                , { $Duration: 1200, $Delay: 20, $Clip: 3, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
		            //Fade Clip out H
		                , { $Duration: 1200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
		            //Fade Clip in V
		                , { $Duration: 1200, $Delay: 20, $Clip: 12, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
		            //Fade Clip out V
		                , { $Duration: 1200, $Delay: 20, $Clip: 12, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
		                ];

		            var options = {
		                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
		                $AutoPlayInterval: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
		                $PauseOnHover: 1,                                //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

		                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
		                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
		                $SlideDuration: 800,                                //Specifies default duration (swipe) for slide in milliseconds

		                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
		                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
		                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
		                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
		                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
		                },

		                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
		                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
		                    $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
		                },

		                $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
		                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
		                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

		                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
		                    $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
		                    $DisplayPieces: 10,                             //[Optional] Number of pieces to display, default value is 1
		                    $ParkingPosition: 360                          //[Optional] The offset position to park thumbnail
		                }
		            };

		            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
		            //responsive code begin
		            //you can remove responsive code if you don't want the slider scales while window resizes
		            function ScaleSlider() {
		                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
		                if (parentWidth)
		                    jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 800), 300));
		                else
		                    window.setTimeout(ScaleSlider, 30);
		            }
		            ScaleSlider();

		            $(window).bind("load", ScaleSlider);
		            $(window).bind("resize", ScaleSlider);
		            $(window).bind("orientationchange", ScaleSlider);
		            //responsive code end
		        });
		    </script>
	</body>
</html>