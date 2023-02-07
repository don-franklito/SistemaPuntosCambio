var radioState = false;
function test(element) {
   if(radioState == false) {
      check(element);
      radioState = true;
   } else {
      uncheck(element);
      radioState = false;
   }
}

function check (element) {
	document.getElementById(element).checked = true;
}

function uncheck (element) {
	document.getElementById(element).checked = false;
}

function valor() {
	let htmlContent
	var select = document.getElementById("lenguaje");
	var valor = select.options[select.selectedIndex].text;
	
   
	switch (valor){
	
	  case "PHP":
	   htmlContent=` <hr><h5> Escoge una opción: </h5>
		<label for="for"> for: </label>
		<input type="radio" name="for" id="for" >
		<label for="while"> while: </label>
		<input type="radio" name="while" id="while" >
		<label for="Do-while"> Do-while: </label>
		<input type="radio" name="Do-while" id="Do-while" >
		<label for="if"> if: </label>
		<input type="radio" name="if" id="if" >
		<label for="mysql"> mysql: </label>
		<input type="radio" name="mysql" id="mysql" >
		<label for="PDO"> PDO: </label>
		<input type="radio" name="PDO" id="PDO" >
		<label for="array_push"> array_push: </label>
		<input type="radio" name="array_push" id="array_push" >
		<label for="array_list"> array_list: </label>
		<input type="radio" name="array_list" id="array_list" >
		<br>`;
	break; 

	case "JAVA":
	  htmlContent=` <hr><h5> Escoge una opción: </h5>
		<label for="for"> for: </label>
		<input type="radio" name="for" id="for" >
		<label for="while"> while: </label>
		<input type="radio" name="while" id="while" >
		<label for="Do-while"> Do-while: </label>
		<input type="radio" name="Do-while" id="Do-while" >
		<label for="if"> if: </label>
		<input type="radio" name="if" id="if" >
		<label for="mysql"> mysql: </label>
		<input type="radio" name="mysql" id="mysql" >
		<label for="PDO"> PDO: </label>
		<input type="radio" name="PDO" id="PDO" >
		<label for="add"> add: </label>
		<input type="radio" name="add" id="add" >
		<label for="array_list"> array_list: </label>
		<input type="radio" name="array_list" id="array_list" >
		<br>`;

	break;

	case "C++":
	  htmlContent=` <hr><h5> Escoge una opción: </h5>
		<label for="for"> for: </label>
		<input type="radio" name="for" id="for" >
		<label for="while"> while: </label>
		<input type="radio" name="while" id="while" >
		<label for="Do-while"> Do-while: </label>
		<input type="radio" name="Do-while" id="Do-while" >
		<label for="if"> if: </label>
		<input type="radio" name="if" id="if" >
		<label for="mysql"> mysql: </label>
		<input type="radio" name="mysql" id="mysql" >
		<label for="PDO"> PDO: </label>
		<input type="radio" name="PDO" id="PDO" >
		<label for="array_push"> array_push: </label>
		<input type="radio" name="array_push" id="array_push" >
		<label for="array_list"> array_list: </label>
		<input type="radio" name="array_list" id="array_list" >
		<br>`;

	break;

	case "Python":
	  htmlContent=`<hr><h5> Escoge una opción: </h5>
		<label for="for"> for: </label>
		<input type="radio" name="for" id="for" >
		<label for="while"> while: </label>
		<input type="radio" name="while" id="while" >
		<label for="Do-while"> Do-while: </label>
		<input type="radio" name="Do-while" id="Do-while" >
		<label for="if"> if: </label>
		<input type="radio" name="if" id="if" >
		<label for="mysql"> mysql: </label>
		<input type="radio" name="mysql" id="mysql" >
		<label for="PDO"> PDO: </label>
		<input type="radio" name="PDO" id="PDO" >
		<label for="array_push"> array_push: </label>
		<input type="radio" name="array_push" id="array_push" >
		<label for="array_list"> array_list: </label>
		<input type="radio" name="array_list" id="array_list" >
		<br>`;

	break;

	default:
	  htmlContent= `<h1>Selecciona un lenguaje</h1>`;
	}

	document.getElementById("language-div").innerHTML = htmlContent;

}

/* Arrastrar no jalo */
const inputfile = getElementById('fileTest');
const labelfile = getElementById('label_fileTest');

labelfile.addEvenListener('dragstart', e => {
	console.log('Drag Start');
});

labelfile.addEvenListener('dragend', e => {
	console.log('Drag End');
});

labelfile.addEvenListener('drag', e => {
	console.log('Only Drag');
});

var dropzone = new Dropzone('#demo-upload', {
	previewTemplate: document.querySelector('#preview-template').innerHTML,
	parallelUploads: 2,
	thumbnailHeight: 120,
	thumbnailWidth: 120,
	maxFilesize: 3,
	filesizeBase: 1000,
	thumbnail: function(file, dataUrl) {
	  if (file.previewElement) {
		file.previewElement.classList.remove("dz-file-preview");
		var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
		for (var i = 0; i < images.length; i++) {
		  var thumbnailElement = images[i];
		  thumbnailElement.alt = file.name;
		  thumbnailElement.src = dataUrl;
		}
		setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
	  }
	}
  
  });
  
  
  // Now fake the file upload, since GitHub does not handle file uploads
  // and returns a 404
  
  var minSteps = 6,
	  maxSteps = 60,
	  timeBetweenSteps = 100,
	  bytesPerStep = 100000;
  
  dropzone.uploadFiles = function(files) {
	var self = this;
  
	for (var i = 0; i < files.length; i++) {
  
	  var file = files[i];
	  totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
  
	  for (var step = 0; step < totalSteps; step++) {
		var duration = timeBetweenSteps * (step + 1);
		setTimeout(function(file, totalSteps, step) {
		  return function() {
			file.upload = {
			  progress: 100 * (step + 1) / totalSteps,
			  total: file.size,
			  bytesSent: (step + 1) * file.size / totalSteps
			};
  
			self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
			if (file.upload.progress == 100) {
			  file.status = Dropzone.SUCCESS;
			  self.emit("success", file, 'success', null);
			  self.emit("complete", file);
			  self.processQueue();
			  //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
			}
		  };
		}(file, totalSteps, step), duration);
	  }
	}
  }