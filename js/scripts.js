(function() {
	var App;
	var jqCanvas;
	var x1 ,y1 ,x2 ,y2;
	App = {};
	
	function setBrushSize(){
		$("#brushSize").width(brushSize);
		$("#brushSize").height(brushSize);
		$("#brushSize").css("background-color", myColor);
		App.socket.emit('setBrushSize', {
			size: brushSize
		});
	}
	
	function incBrush(){
		if(brushSize < 16){
			brushSize = brushSize + 1;
			setBrushSize();
		}
	}

	function decBrush(){
		if(brushSize > 1){
			brushSize = brushSize - 1;
			setBrushSize();
		}
	}

	App.init = function() {
		console.log("This is happeneing");
		App.canvas = document.createElement('canvas');
		var divPlayer = $("#ytplayer");
		var w = ($(document).width())*0.75;
		var h = ((1/2)*w);
		App.canvas.height = h;
		$("canvasHolder").height(h+20);
		App.canvas.width = w;
		$("canvasHolder").width(w+20);
		document.getElementsByTagName('article')[0].appendChild(App.canvas);
		App.ctx = App.canvas.getContext("2d");
		App.ctx.fillStyle = "solid";
		App.ctx.strokeStyle = null;
		App.ctx.lineWidth = brushSize;
		App.ctx.lineCap = "round";
		jqCanvas = $("canvas");
		App.socket = io.connect('http://arbiter:4000');
		
		App.socket.on('setup', function(data) {
			console.log("Recieved setup message");
			if(myColor == null){
				myColor = data.color;
				App.ctx.strokeStyle = myColor;
				$("#myColor").css("background", myColor);
				setBrushSize();
				App.socket.emit('subscribe', {
					roomName: myRoom,
					userID: myID,
				});
			}
			else{
				console.log("Something went wrong !");
			}
		});
		
		App.socket.on('draw', function(data) {
			return App.draw(data.x, data.y, data.type, data.color, data.size, data.mode, false);
		});
		
		
		App.draw = function(x, y, type, color, size, mode, arg_toBroadcast) {
			var toBroadcast = arg_toBroadcast;
			App.ctx.lineWidth = size;
			App.ctx.strokeStyle = color;
			if(mode === "free"){
				if(color != null){
					if (type === "dragstart"){
						App.ctx.moveTo(x, y);
						App.ctx.beginPath();
					} 
					else if(type === "drag"){
						  App.ctx.lineTo(x, y);
						  App.ctx.stroke();
					}
					else if(type === "dragend"){
						App.ctx.lineTo(x, y);
						App.ctx.stroke();
						App.ctx.closePath();
					}
					else{
						toBroadcast = false;
					}
				}
			}
			else if(mode === "line"){
				console.log(type);
				if(color != null){
					if(type === "dragstart"){
						x1 = x;
						y1 = y;
					}
					else if(type === "dragend"){
						x2 = x;
						y2 = y;
						App.ctx.beginPath();
						App.ctx.moveTo(x1 ,y1);
						App.ctx.lineTo(x2, y2);
						App.ctx.stroke();
						App.ctx.closePath();
					}
					/*else if(type === "drag"){
						toBroadcast = false;
						App.ctx.clearRect(0,0,w,h);
						App.ctx.drawImage(temp,0,0);
						App.ctx.beginPath();
						App.ctx.moveTo(x1 ,y1);
						App.ctx.lineTo(x, y);
						App.ctx.stroke();
						App.ctx.closePath();
					}*/
					else{
						toBroadcast = false;
					}
				}
			}
			else if(mode === "fill"){
				if(type === "live"){
					App.ctx.moveTo(x, y);
					App.ctx.fillStyle = color;
					App.ctx.fill();
				}
				else{
					toBroadcast = false;
				}
			}
			else if(mode === "fan"){
				console.log(type);
				if(color != null){
					if(type === "dragstart"){
						x1 = x;
						y1 = y;
					}
					else if(type === "dragend"){
						x2 = x;
						y2 = y;
						App.ctx.beginPath();
						App.ctx.moveTo(x1 ,y1);
						App.ctx.lineTo(x2, y2);
						App.ctx.stroke();
						App.ctx.closePath();
					}
					else if(type === "drag"){
						App.ctx.beginPath();
						App.ctx.moveTo(x1 ,y1);
						App.ctx.lineTo(x, y);
						App.ctx.stroke();
						App.ctx.closePath();
					}
					else{
						toBroadcast = false;
					}
				}
			}
			else{
				//Invalid mode
			}
			
			if(toBroadcast){
				App.socket.emit('drawClick', {
					x: x,
					y: y,
					type: type,
					mode: drawMode
				});
			}
		};
	};  
  
	/**********************************
		Draw - click n drag on canvas
	***********************************/
	$('canvas').live('click drag dragstart dragend', function(e) {
		var offset, type, x, y;
		type = e.handleObj.type;
		offset = $(this).offset();
		//for firefox
		e.offsetX = e.pageX - offset.left;
		e.offsetY = e.pageY - offset.top;
		//for chrome
		//e.offsetX = e.layerX;
		//e.offsetY = e.layerY;
		x = e.offsetX;
		y = e.offsetY;
		App.draw(x, y, type, myColor, brushSize, drawMode, true);
	});

	/**********************************
		On document ready
	***********************************/
	$(function() {
		
		$(".setMode").ready(function(){
			$(".setMode").click(function(){
				drawMode = $(this).attr("destination");
				$(".setMode").addClass("btn-inverse");
				$(this).removeClass("btn-inverse");
				console.log("Draw mode set to " + drawMode);
				
			});
		});
		
		$("#swatches").ready(function(){
			$(".swatch").click(function(){
				myColor = $(this).attr("bgcolor");
				App.socket.emit('setColor', {
									color: myColor
								});
				$("#myColor").css("background-color", myColor);
				setBrushSize();
			});
		});
		
		$("#decBrush").ready(function(){
			$("#decBrush").click(decBrush);
		});
		
		$("#incBrush").ready(function(){
			$("#incBrush").click(incBrush);
		});
	
		return App.init();
	});

}).call(this);
