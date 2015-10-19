function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (expr.test(email)) {
        return true;
    }else{
        return false;
    }
}

function validPass(pass1, pass2){
    if (pass1 == pass2 && pass1.length >= 6) {
        return true;
    }else{
        return false;
    }
}

var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

ControllerPropuesta = function(){
    var self = this;

    self.inmueble = new Inmueble();
    self.error = new Inmueble();
    self.error.deseado("Sólo números Ej. 800000");

    self.clave1 = ko.observable();
    self.clave2 = ko.observable();

    self.tipos = ko.observableArray([]);
    $.getJSON("backend/common/tipos.php", function(data){
        ko.utils.arrayForEach(data, function(tipo){
            self.tipos.push(new Tipo(tipo));
        });
    });

    self.registrar = function(){
        var info = ko.toJS(self.inmueble);
        var pw1 = self.clave1();
        var pw2 = self.clave2();

        if (
            info.ubicacion == "" || 
            info.nExt == "" || 
            info.calle == "" || 
            info.colonia == "" || 
            info.ban == "" || 
            info.rec == "" || 
            info.detalle == "" ||
            info.propia == "" ||
            info.deseado == "" ||
            info.tipo.id == "" ||
            info.cliente.domicilio == "" ||
            info.cliente.telefono == "" ||
            !validarEmail(info.cliente.usuario.correo) ||
            info.cliente.usuario.nombre == "" ||
            !validPass(pw1,pw2)) {
                toastr.warning("Revisar información", "Servidor");
                if (info.ubicacion == "") {
                    self.error.ubicacion("Indique su domicilio");
                }else{
                    self.error.ubicacion("");
                }
                if (info.nExt == "") {
                    self.error.nExt("Indique número de su domicilio");
                }else{
                    self.error.nExt("");
                }
                if (info.calle == "") {
                    self.error.calle("Indique su calle");
                }else{
                    self.error.calle("");
                }
                if (info.colonia == "") {
                    self.error.colonia("Indique su colonia");
                }else{
                    self.error.colonia("");
                }
                if (info.ban == "") {
                    self.error.ban("¿Cuántos baños tiene?");
                }else{
                    self.error.ban("");
                }
                if (info.rec == "") {
                    self.error.rec("¿Cuántas recámaras tiene?");
                }else{
                    self.error.rec("");
                }
                if (info.detalle == "") {
                    self.error.detalle("Describa brevemente su propiedad");
                }else{
                    self.error.detalle("");
                }
                if (info.propia == "") {
                    self.error.propia("Seleccione");
                }else{
                    self.error.propia("");
                }
                if (info.deseado == "") {
                    self.error.deseado("¿Cuánto dinero quiere?");
                }else{
                    self.error.deseado("Sólo números Ej. 800000");
                }
                if (info.tipo == "") {
                    self.error.tipo.tipo("Seleccione el tipo de inmueble");
                }else{
                    self.error.tipo.tipo("");
                }
                if (info.cliente != "") {
                    if (info.cliente.domicilio == "") {
                        self.error.cliente.domicilio("Indique su domicilio");
                    }else{
                        self.error.cliente.domicilio("");
                    }
                    if (info.cliente.telefono == "") {
                        self.error.cliente.telefono("Indique su telefono");
                    }else{
                        self.error.cliente.telefono("");
                    }
                    if (info.cliente.usuario != "") {
                        if (info.cliente.usuario.nombre == "") {
                            self.error.cliente.usuario.nombre("Indique su nombre completo");
                        }else{
                            self.error.cliente.usuario.nombre("");
                        }
                        if (!validarEmail(info.cliente.usuario.correo)) {
                            self.error.cliente.usuario.correo("Indique un correo válido");
                        }else{
                            self.error.cliente.usuario.correo("");
                        }    
                    }else{
                        self.error.cliente.usuario.nombre("Indique su nombre completo");
                        self.error.cliente.usuario.correo("Indique un correo válido");    
                    }
                }else{
                    self.error.cliente.domicilio("Indique su domicilio");
                    self.error.cliente.telefono("Indique su telefono");
                    self.error.cliente.usuario.nombre("Indique su nombre completo");
                    self.error.cliente.usuario.correo("Indique un correo válido");
                } 
                if (pw1 != "" && pw2 != "") {
                    if (!validPass(pw1,pw2)) {
                        self.error.cliente.usuario.clave("Verifique las claves, al menos 6 caracteres");
                    }else{
                        self.error.cliente.usuario.clave("");
                    }
                }else{
                    if (pw1 == "") {
                        self.error.cliente.usuario.clave("Introduzca clave de acceso");
                    }else{
                        self.error.cliente.usuario.clave("");
                    }
                    if (pw2 == "") {
                        self.error.cliente.usuario.clave("Introduzca clave de acceso");
                    }else{
                        self.error.cliente.usuario.clave("");
                    }
                }
            delete info;
        }else{
            info.cliente.usuario.clave = pw1;
            self.error.cliente.usuario.clave("");
            self.error.cliente.domicilio("");
            self.error.cliente.telefono("");
            self.error.cliente.usuario.nombre("");
            self.error.cliente.usuario.correo("");
            self.error.tipo.tipo("");
            self.error.deseado("Sólo números Ej. 800000");
            self.error.propia("");
            self.error.detalle("");
            self.error.rec("");
            self.error.ban("");
            self.error.colonia("");
            self.error.calle("");
            self.error.nExt("");
            self.error.ubicacion("");
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {inmueble:info},
                url: 'backend/common/nuevaPropuesta.php',
                success: function(data) {
                    if (data.id == 0) {
                        toastr.info("Tu cuenta ya existe, inicia sesión.","Servidor");
                    }else{
                        toastr.success("Éxito al guardar", "Servidor");
                        setTimeout("location.href = 'registrarImagenes.php'",2000);
                    }
                    self.clave1("");
                    self.clave2("");
                    self.inmueble.limpiar();
                },
                error: function(e) { // Si no ha podido conectar con el servidor 
                    toastr.error("Error en la conexion","Servidor");
                    console.log(e);
                }
            });
        }
    }

    // Controladores del API Google

    function initialize1() {

      var input = /** @type {HTMLInputElement} */(
          document.getElementById('pac-input-1'));

      var autocomplete = new google.maps.places.Autocomplete(input);

      var infowindow = new google.maps.InfoWindow();

      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();

        var place = autocomplete.getPlace();
        if (!place.geometry) {
          return;
        }

        var address = '';
        if (place.address_components) {
          self.inmueble.cliente.domicilio(place.address_components[1].short_name + " " + place.address_components[0].short_name + " " + place.address_components[2].short_name + ", " + place.address_components[3].short_name + " " + place.address_components[4].short_name);
          address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
          ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
      });

    }
    google.maps.event.addDomListener(window, 'load', initialize1);

    function initialize2() {

      var input = /** @type {HTMLInputElement} */(
          document.getElementById('pac-input-2'));

      var autocomplete = new google.maps.places.Autocomplete(input);

      var infowindow = new google.maps.InfoWindow();

      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();

        var place = autocomplete.getPlace();
        if (!place.geometry) {
          return;
        }

        var address = '';
        if (place.address_components) {
          self.inmueble.ubicacion(place.address_components[1].short_name + " " + place.address_components[0].short_name + " " + place.address_components[2].short_name + ", " + place.address_components[3].short_name + " " + place.address_components[4].short_name);
          self.inmueble.calle(place.address_components[1].short_name);
          self.inmueble.nExt(place.address_components[0].short_name);
          self.inmueble.colonia(place.address_components[2].short_name);
          address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
          ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
      });

    }
    google.maps.event.addDomListener(window, 'load', initialize2);
}

ControllerRegistrarInmueble = function(id){
    var self = this;

    self.inmueble = new Inmueble();
    if (id != 0) {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {inmueble:id},
            url: '../backend/common/getInmueble.php',
            success: function(data) {
                self.inmueble.cargar(data);
            },
            error: function(e) { // Si no ha podido conectar con el servidor 
                toastr.error("Error en la conexion","Servidor");
                console.log(e);
            }
        });
    }
    
    self.error = new Inmueble();

    self.clave1 = ko.observable();
    self.clave2 = ko.observable();

    self.tipos = ko.observableArray([]);
    $.getJSON("../backend/common/tipos.php", function(data){
        ko.utils.arrayForEach(data, function(tipo){
            self.tipos.push(new Tipo(tipo));
        });
    });

    self.estados = ko.observableArray([]);
    $.getJSON("../backend/common/estados.php", function(data){
        ko.utils.arrayForEach(data, function(estado){
            self.estados.push(new Estado(estado));
        });
    });

    self.registrar = function(){
        var info = ko.toJS(self.inmueble);
        var pw1 = self.clave1();
        var pw2 = self.clave2();

        if (
            info.ubicacion == "" || 
            info.nExt == "" || 
            info.calle == "" || 
            info.colonia == "" || 
            info.ban == "" || 
            info.rec == "" || 
            info.detalle == "" ||
            info.propia == "" ||
            info.deseado == "" ||
            info.tipo.id == "" ||
            info.cliente.domicilio == "" ||
            info.cliente.telefono == "" ||
            !validarEmail(info.cliente.usuario.correo) ||
            info.cliente.usuario.nombre == "" ||
            !validPass(pw1,pw2)) {
                toastr.warning("Revisar información", "Servidor");
                if (info.ubicacion == "") {
                    self.error.ubicacion("Indique su domicilio");
                }else{
                    self.error.ubicacion("");
                }
                if (info.nExt == "") {
                    self.error.nExt("Indique número de su domicilio");
                }else{
                    self.error.nExt("");
                }
                if (info.calle == "") {
                    self.error.calle("Indique su calle");
                }else{
                    self.error.calle("");
                }
                if (info.colonia == "") {
                    self.error.colonia("Indique su colonia");
                }else{
                    self.error.colonia("");
                }
                if (info.ban == "") {
                    self.error.ban("¿Cuántos baños tiene?");
                }else{
                    self.error.ban("");
                }
                if (info.rec == "") {
                    self.error.rec("¿Cuántas recámaras tiene?");
                }else{
                    self.error.rec("");
                }
                if (info.detalle == "") {
                    self.error.detalle("Describa brevemente su propiedad");
                }else{
                    self.error.detalle("");
                }
                if (info.propia == "") {
                    self.error.propia("Seleccione");
                }else{
                    self.error.propia("");
                }
                if (info.deseado == "") {
                    self.error.deseado("¿Cuánto dinero quiere?");
                }else{
                    self.error.deseado("");
                }
                if (info.tipo == "") {
                    self.error.tipo.tipo("Seleccione el tipo de inmueble");
                }else{
                    self.error.tipo.tipo("");
                }
                if (info.cliente != "") {
                    if (info.cliente.domicilio == "") {
                        self.error.cliente.domicilio("Indique su domicilio");
                    }else{
                        self.error.cliente.domicilio("");
                    }
                    if (info.cliente.telefono == "") {
                        self.error.cliente.telefono("Indique su telefono");
                    }else{
                        self.error.cliente.telefono("");
                    }
                    if (info.cliente.usuario != "") {
                        if (info.cliente.usuario.nombre == "") {
                            self.error.cliente.usuario.nombre("Indique su nombre completo");
                        }else{
                            self.error.cliente.usuario.nombre("");
                        }
                        if (!validarEmail(info.cliente.usuario.correo)) {
                            self.error.cliente.usuario.correo("Indique un correo válido");
                        }else{
                            self.error.cliente.usuario.correo("");
                        }    
                    }else{
                        self.error.cliente.usuario.nombre("Indique su nombre completo");
                        self.error.cliente.usuario.correo("Indique un correo válido");    
                    }
                }else{
                    self.error.cliente.domicilio("Indique su domicilio");
                    self.error.cliente.telefono("Indique su telefono");
                    self.error.cliente.usuario.nombre("Indique su nombre completo");
                    self.error.cliente.usuario.correo("Indique un correo válido");
                } 
                if (pw1 != "" && pw2 != "") {
                    if (!validPass(pw1,pw2)) {
                        self.error.cliente.usuario.clave("Verifique las claves, al menos 6 caracteres");
                    }else{
                        self.error.cliente.usuario.clave("");
                    }
                }else{
                    if (pw1 == "") {
                        self.error.cliente.usuario.clave("Introduzca clave de acceso");
                    }else{
                        self.error.cliente.usuario.clave("");
                    }
                    if (pw2 == "") {
                        self.error.cliente.usuario.clave("Introduzca clave de acceso");
                    }else{
                        self.error.cliente.usuario.clave("");
                    }
                }
            delete info;
        }else{
            info.cliente.usuario.clave = pw1;
            self.error.cliente.usuario.clave("");
            self.error.cliente.domicilio("");
            self.error.cliente.telefono("");
            self.error.cliente.usuario.nombre("");
            self.error.cliente.usuario.correo("");
            self.error.tipo.tipo("");
            self.error.deseado("");
            self.error.propia("");
            self.error.detalle("");
            self.error.rec("");
            self.error.ban("");
            self.error.colonia("");
            self.error.calle("");
            self.error.nExt("");
            self.error.ubicacion("");
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {inmueble:info},
                url: '../backend/common/nuevoInmueble.php',
                success: function(data) {
                    if (data.id == 0) {
                        toastr.info("Tu cuenta ya existe, inicia sesión.","Servidor");
                    }else{
                        toastr.success("Éxito al guardar", "Servidor");
                        setTimeout("location.href = 'registrarImagenes.php'",2000);
                    }
                    self.clave1("");
                    self.clave2("");
                    self.inmueble.limpiar();
                },
                error: function(e) { // Si no ha podido conectar con el servidor 
                    toastr.error("Error en la conexion","Servidor");
                    console.log(e);
                }
            });
        }
    }

    // Controladores del API Google

    function initialize1() {

      var input = /** @type {HTMLInputElement} */(
          document.getElementById('pac-input-1'));

      var autocomplete = new google.maps.places.Autocomplete(input);

      var infowindow = new google.maps.InfoWindow();

      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();

        var place = autocomplete.getPlace();
        if (!place.geometry) {
          return;
        }

        var address = '';
        if (place.address_components) {
          self.inmueble.cliente.domicilio(place.address_components[1].short_name + " " + place.address_components[0].short_name + " " + place.address_components[2].short_name + ", " + place.address_components[3].short_name + " " + place.address_components[4].short_name);
          address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
          ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
      });

    }
    google.maps.event.addDomListener(window, 'load', initialize1);

    function initialize2() {

      var input = /** @type {HTMLInputElement} */(
          document.getElementById('pac-input-2'));

      var autocomplete = new google.maps.places.Autocomplete(input);

      var infowindow = new google.maps.InfoWindow();

      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();

        var place = autocomplete.getPlace();
        if (!place.geometry) {
          return;
        }

        var address = '';
        if (place.address_components) {
          self.inmueble.ubicacion(place.address_components[1].short_name + " " + place.address_components[0].short_name + " " + place.address_components[2].short_name + ", " + place.address_components[3].short_name + " " + place.address_components[4].short_name);
          self.inmueble.calle(place.address_components[1].short_name);
          self.inmueble.nExt(place.address_components[0].short_name);
          self.inmueble.colonia(place.address_components[2].short_name);
          address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
          ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
      });

    }
    google.maps.event.addDomListener(window, 'load', initialize2);
}

ControllerLogin = function(){
    var self = this;

    self.usuario = new Usuario();
    self.error = new Usuario();

    self.iniciar = function(){
        var info = ko.toJS(self.usuario);
        if (!validarEmail(info.correo) || info.clave.length < 6) {
            toastr.warning("Complete los datos", "Iniciar sesión");
            if (!validarEmail(info.correo)) {
                self.error.correo("Introduzca un correo válido");
            }else{
                self.error.correo("");
            }
            if (info.clave.length < 6) {
                self.error.clave("Introduzca una clave válida");
            }else{
                self.error.clave("");
            }
        }else{
            self.error.correo("");
            self.error.clave("");
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {usuario:info},
                url: 'backend/common/iniciar.php',
                success: function(data) {
                    self.usuario.limpiar();
                    if (data == 0) {
                        toastr.error("Falla en el sistema", "Servidor");
                    }
                    if (data == -1) {
                        toastr.info("Tu correo no está registrado", "Servidor");
                    }
                    if (data == -2) {
                        toastr.info("Tu cuenta aún no está activa", "Servidor");
                    }
                    if (data == -3) {
                        toastr.info("Tu clave es incorrecta", "Servidor");
                    }
                    if (data == 1) {
                        window.location = "admin";
                    }
                    if (data == 2) {
                        window.location = "cliente";
                    }
                    if (data == 3) {
                        window.location = "asesor";
                    }
                },
                error: function(e) { // Si no ha podido conectar con el servidor 
                    toastr.error("Error en la conexion","Servidor");
                    console.log(e);
                }
            });
        }
    }
}

ControllerAdmin = function(){
    var self = this;

    self.asesores = ko.observableArray([]);
    $.getJSON("../backend/common/asesores.php", function(data){
        ko.utils.arrayForEach(data, function(asesor){
            self.asesores.push(new Asesor(asesor));
        });
    });
}

ControllerRegistrarAsesor = function(id){
    var self = this;
    
    self.asesor = new Asesor();
    self.error = new Asesor();
    self.clave1 = ko.observable("");
    self.clave2 = ko.observable("");

    if (id != 0) {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {asesor:id},
            url: '../backend/common/getAsesor.php',
            success: function(data) {
                self.asesor.cargar(data);
            },
            error: function(e) { // Si no ha podido conectar con el servidor 
                toastr.error("Error en la conexion","Servidor");
                console.log(e);
            }
        });
    }

    self.sedes = ko.observableArray([]);
    $.getJSON("../backend/common/sedes.php", function(data){
        ko.utils.arrayForEach(data, function(sede){
            self.sedes.push(new Sede(sede));
        });
    });

    self.registrar = function(){
        var info = ko.toJS(self.asesor);
        if (id != 0) {
            info.id = id;
        }
        var pw1 = self.clave1();
        var pw2 = self.clave2();
        if (
            info.usuario.nombre == "" ||
            !validarEmail(info.usuario.correo) ||
            !validPass(pw1,pw2) ||
            info.telefono == "" ||
            info.sede.id == "") {

            toastr.warning("Revisar información", "Servidor");

            if (info.usuario.nombre == "") {
                self.error.usuario.nombre("Introduzca un nombre");
            }else{
                self.error.usuario.nombre("");
            }
            if (info.telefono == "") {
                self.error.telefono("Introduzca un teléfono");
            }else{
                self.error.telefono("");
            }
            if (!validarEmail(info.usuario.correo)) {
                self.error.usuario.correo("Introduzca un correo válido");
            }else{
                self.error.usuario.nombre("");
            }
            if (info.sede == "") {
                self.error.sede.sede("Seleccione la sede de asignación");
            }else{
                self.error.sede.sede("");
            }
            if (pw1 != "" && pw2 != "") {
                    if (!validPass(pw1,pw2)) {
                        self.error.usuario.clave("Verifique las claves, al menos 6 caracteres");
                    }else{
                        self.error.usuario.clave("");
                    }
            }else{
                if (pw1 == "") {
                    self.error.usuario.clave("Introduzca clave de acceso");
                }else{
                    self.error.usuario.clave("");
                }
                if (pw2 == "") {
                    self.error.usuario.clave("Introduzca clave de acceso");
                }else{
                    self.error.usuario.clave("");
                }
            }
        }else{
            info.usuario.clave = pw1;
            self.error.usuario.nombre("");
            self.error.usuario.correo("");
            self.error.usuario.clave("");
            self.error.sede.sede("");
            self.error.telefono("");
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {asesor:info},
                url: '../backend/common/nuevoAsesor.php',
                success: function(data) {
                    self.clave1("");
                    self.clave2("");
                    self.asesor.limpiar();
                    if (data.id == 0) {
                        toastr.info("El asesor ya está registrado", "Servidor");
                    }else{
                        toastr.success("Asesor creado correctamente", "Servidor");
                    }
                    setTimeout("location.href = 'asesores.php'",2000);
                },
                error: function(e) { // Si no ha podido conectar con el servidor 
                    toastr.error("Error en la conexion","Servidor");
                    console.log(e);
                }
            });
        }
    }
}

ControllerEliminarAsesor = function(id){
    var self = this;

    if (id != 0) {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {usuario:id},
            url: '../backend/common/EliminarAsesor.php',
            success: function(data) {
                if (data == 1) {
                    toastr.success("El usuario se eliminó correctamente","Servidor");
                    setTimeout("location.href = 'asesores.php'",2000);
                }
            },
            error: function(e) { // Si no ha podido conectar con el servidor 
                toastr.error("Error en la conexion","Servidor");
                console.log(e);
            }
        });
    }
}

ControllerAsesor = function(){
    var self = this;

    self.propuestas = ko.observableArray([]);
    $.getJSON("../backend/common/propuestas.php", function(data){
        ko.utils.arrayForEach(data, function(propuesta){
            self.propuestas.push(new Inmueble(propuesta));
        });
    });

    self.inmuebles = ko.observableArray([]);
    $.getJSON("../backend/common/inmuebles.php", function(data){
        ko.utils.arrayForEach(data, function(inmueble){
            self.inmuebles.push(new Inmueble(inmueble));
        });
    });
}

ControllerMain = function(){
    var self = this;

    self.inmuebles = ko.observableArray([]);
    self.inmueble = new Inmueble();
    var filtros = new Array();

    $.getJSON("backend/common/colonias.php", function(data){
        ko.utils.arrayForEach(data, function(colonia){
            filtros.push(colonia.colonia);
        });
    });
    $.getJSON("backend/common/tipos.php", function(data){
        ko.utils.arrayForEach(data, function(tipo){
            filtros.push(tipo.tipo);
        });
    });

    $.getJSON("backend/common/inmuebles.php", function(data){
        ko.utils.arrayForEach(data, function(inmueble){
            self.inmueble = new Inmueble(inmueble);
            //self.inmueble.clave = ko.observable(inmueble.expediente.slice(0,5));
            self.inmueble.pic = ko.observable("");
            self.inmueble.pics = ko.observableArray([]);
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {expediente:inmueble.expediente},
                url: 'backend/common/imagenes.php',
                success: function(data) {
                    ko.utils.arrayForEach(data, function(pic){
                        self.inmueble.pic(pic);
                        self.inmueble.pics.push(self.inmueble.pic);
                    });
                },
                error: function(e) { // Si no ha podido conectar con el servidor 
                    toastr.error("Error en la conexion","Servidor");
                    console.log(e);
                }
            });
            self.inmuebles.push(self.inmueble);
        });
    });    

    $('#filtro').typeahead({
      hint: true,
      highlight: true,
      minLength: 1
    },
    {
      name: 'states',
      source: substringMatcher(filtros)
    });

    self.openModal = function(){
        $("#myModal").modal('show');
    }

    self.filtrar = function(){
        var filtro = $('#filtro').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {filtros:filtro},
            url: 'backend/common/filtro.php',
            success: function(data) {
                self.inmuebles([]);
                ko.utils.arrayForEach(data, function(inmueble){
                    self.inmueble = new Inmueble(inmueble);
                    //self.inmueble.clave = ko.observable(inmueble.expediente.slice(0,5));
                    self.inmueble.pic = ko.observable("");
                    self.inmueble.pics = ko.observableArray([]);
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        data: {expediente:inmueble.expediente},
                        url: 'backend/common/imagenes.php',
                        success: function(data) {
                            ko.utils.arrayForEach(data, function(pic){
                                self.inmueble.pic(pic);
                                self.inmueble.pics.push(self.inmueble.pic);
                            });
                        },
                        error: function(e) { // Si no ha podido conectar con el servidor 
                            toastr.error("Error en la conexion","Servidor");
                            console.log(e);
                        }
                    });
                    self.inmuebles.push(self.inmueble);
                });
                //self.inmueble.cargar(inmueble);
            },
            error: function(e) { // Si no ha podido conectar con el servidor 
                //toastr.error("Error en la conexion","Servidor");
                console.log(e);
            }
        });
    }
}