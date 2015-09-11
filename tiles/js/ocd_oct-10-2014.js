var canvas 				= document.getElementById("main_canvas");
//canvas.width 		= document.body.clientWidth;
//canvas.height		= document.body.clientHeight;
//canvas.style.width 	= canvas.width + 'px';
//canvas.style.height = canvas.height + 'px';

var ctx 			= canvas.getContext('2d');
var score			= 0;

(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] 
                                   || window[vendors[x]+'CancelRequestAnimationFrame'];
    }
 
    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); }, 
              timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };
 
    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
}());

var Drawer = function (ctx) {
	return {
		x : 0,
		y : 0,
		w : 0,
		h : 0,
		sprite_x : 0,
		sprite_y : 0,
		draw : function (x, y, w, h, sprite_x, sprite_y) {
			this.x = x;
			this.y = y;
			this.w = w;
			this.h = h;
			this.sprite_x = sprite_x;
			this.sprite_y = sprite_y;

			//ctx.fillStyle = 'rgba(255, 255, 255, 0.5)';
			//ctx.strokeRect(x, y, w, h);
			ctx.drawImage(imgSprite, sprite_x, sprite_y, w, h, x, y, w, h);
		},
		coord : function () {
			return {
				x : this.x,
				y : this.y,
				w : this.w,
				h : this.h,
				with_footstep : 0,
				score_counted : 0,
				thing : {}
			}
		},
		resetValues : function () {
			this.x = 0;
			this.y = 0;
			this.w = 0;
			this.h = 0;
			this.sprite_x = 0;
			this.sprite_y = 0;
		}
	};
};

/*
var Warehouse = function () {
	return {
		lst : [],
		add : function (rect) {
			this.lst[this.lst.length] = rect;
		},
		get : function () {
			return this.lst;
		}
	};
};
*/
var Tiles = function (rectangle, context, canvas, footstep) {
	return {
		rectangles : [],
		WIDTH: 150, // width of the tile
		HEIGHT: 150, // height of the tile
		TILE_SPRITE_X: 0,
		TILE_SPRITE_Y: 0,
		TILES_PER_DRAW: 3, // tiles drawn at a time
		OFFSET: -150, // (HEIGHT) offset in the Y coordinate so rectangles are drawn outside of the screen
		FPS: 7.5, // pixels per loop
		margin: canvas.width * .15, // constraint the tiles n% from left and from right of canvas
		/*
		draw : function () {
			var x = 0;
			var y = 0;
			var rectangles_len = this.rectangles.length;
			for (var i = 0; i < this.TILES_PER_DRAW; i += 1) {
				x = this.randX();
				y = this.randY();
				rectangle.draw(x,y,this.WIDTH,this.HEIGHT);
				this.rectangles[rectangles_len + i] = rectangle.coord();
			}
		},
		*/
		draw : function () {
			var x = 0;
			var y = 0;
			var thing = {};
			y = this.HEIGHT * -1; // place it outside the canvas

			// the center tile
			x = (canvas.width / 2) - (this.WIDTH / 2);
			rectangle.draw(x,y, this.WIDTH, this.HEIGHT, this.TILE_SPRITE_X, this.TILE_SPRITE_Y);
			this.rectangles[this.rectangles.length] = rectangle.coord();
			thing = Thing();
			this.rectangles[this.rectangles.length - 1].thing = thing;
			if (thing.name !== '') {
				rectangle.draw(x+thing.offset_x, y+thing.offset_y, thing.coord.w, thing.coord.h, thing.coord.x, thing.coord.y); // draw thing
			}

			// the left tile
			x = (canvas.width / 2) - (this.WIDTH / 2) - this.WIDTH;
			rectangle.draw(x,y, this.WIDTH, this.HEIGHT, this.TILE_SPRITE_X, this.TILE_SPRITE_Y);
			this.rectangles[this.rectangles.length] = rectangle.coord();
			thing = Thing();
			this.rectangles[this.rectangles.length - 1].thing = thing;
			if (thing.name !== '') {
				rectangle.draw(x+thing.offset_x, y+thing.offset_y, thing.coord.w, thing.coord.h, thing.coord.x, thing.coord.y); // draw thing
			}

			// the right tile
			x = (canvas.width / 2) + (this.WIDTH / 2);
			rectangle.draw(x,y, this.WIDTH, this.HEIGHT, this.TILE_SPRITE_X, this.TILE_SPRITE_Y);
			this.rectangles[this.rectangles.length] = rectangle.coord();
			thing = Thing();
			this.rectangles[this.rectangles.length - 1].thing = thing;
			if (thing.name !== '') {
				rectangle.draw(x+thing.offset_x, y+thing.offset_y, thing.coord.w, thing.coord.h, thing.coord.x, thing.coord.y); // draw thing
			}
		},
		randX: function () {
			var x = Math.floor(Math.random() * (canvas.width - (this.margin + this.WIDTH)));
			if (x < this.margin) {
				x = x + this.margin;
			}
			return x;
		},
		randY: function () {
			var offset = this.OFFSET;
			var y = Math.floor(Math.random() * (offset - this.HEIGHT));
			if (y + this.HEIGHT > 0) {
				y = y - this.HEIGHT;
			};
			return y;
		},
		move: function() {
			var new_rectangles = [];
			var rect = this.rectangles;
			var rectangles_len = this.rectangles.length;
			var len = rect.length;
			var x = 0;
			var y = 0;
			var w = 0;
			var h = 0;
			var to_splice = [];
			var j = 0;
			var thing = {};

			// draw the tiles
			for (var i = 0; i < len; i += 1) {
				var x = rect[i].x;
				var y = rect[i].y + this.FPS;
				var w = rect[i].w;
				var h = rect[i].h;

				var thing = rect[i].thing;
				var tile_is_safe = thing.attribute;

				rectangle.draw(x, y, w, h, this.TILE_SPRITE_X, this.TILE_SPRITE_Y); // draw tile

				if (footstep.began) {
					// check if footstep is inside the tile or not
					this.intersects(i);
					// check if tile has the footstep
					if (this.rectangles[i].with_footstep) {
						if (tile_is_safe === 'safe') {
							if (!this.rectangles[i].score_counted) {
								score += thing.points_earned;
								this.rectangles[i].score_counted = 1;
								console.log('score = ' + score);
							}
						} else {
							game_over = 1;
						}
					}
				}

				if (thing.name !== '' && !this.rectangles[i].score_counted) {
					rectangle.draw(x+thing.offset_x, y+thing.offset_y, thing.coord.w, thing.coord.h, thing.coord.x, thing.coord.y); // draw thing
				}
				this.rectangles[i].y = y;

				// check if tile is already outside canvas
				if (this.rectangles[i].y > canvas.height) {
					to_splice[i] = i; // this rectangle (tile) needs to be removed
					//this.rectangles.splice(i, 1); // pop it out of the array;
				};
			};

			if (footstep.began) {
				if (!footstep.was_inside_tile) {
					// footstep is not inside the tile
					game_over = 1;
				}

				if (footstep.y > canvas.height) {
					//footstep.resetValues();
					footstep.began = 0;
					game_over = 1;
				};

				// draw the footstep
				footstep.y += this.FPS;
				footstep.draw(footstep.x, footstep.y, footstep.w, footstep.h, footstep.sprite_x, footstep.sprite_y);
			}

			if (to_splice.length > 0) {
				for (var i = 0; i < rectangles_len; i += 1) {
					// do not include tiles that are no longer visible on the canvas
					if (typeof to_splice[i] === "undefined") {
						new_rectangles[j] = this.rectangles[i];
						j = j + 1;
					};
				};
			};
			
			if (new_rectangles.length > 0) {
				// reinitialize rectangles object
				this.rectangles = new_rectangles;
			};
		},
		intersects : function (i) {
			var rect = this.rectangles;
			var offset = this.FPS;
			var footstep_top_left_y = footstep.y;
			var footstep_top_left_x = footstep.x; 
			var footstep_bottom_right_x = footstep_top_left_x + footstep.w;
			var footstep_bottom_right_y = footstep_top_left_y + footstep.h;

			if ((footstep_top_left_x > rect[i].x && footstep_top_left_y > rect[i].y) &&
				(footstep_bottom_right_x < rect[i].x + rect[i].w && footstep_bottom_right_y < rect[i].y + rect[i].h)
			) {
				// this footstep is inside the tile
				footstep.was_inside_tile = 1;
				this.rectangles[i].with_footstep = 1; // this tile has the footstep
			} else {
				if (footstep.was_inside_tile === 1) {
					// do nothing
				} else {
					footstep.was_inside_tile = 0;
				}
			};
		}
	};
};

var Thing = function () {
	var none = {
		name : '',
		coord : {x: 0, y: 0, w: 0, h: 0},
		attribute : 'safe',
		points_earned : 1,
		offset_x : 0,
		offset_y : 0
	};
	var scissors = {
		name : 'scissors',
		coord : {x: 225, y: 0, w: 100, h: 67},
		attribute : 'deadly',
		points_earned : 0,
		offset_x : 25,
		offset_y : 50
	};
	var banana = {
		name : 'banana',
		coord : {x: 320, y: 0, w: 100, h: 50},
		attribute : 'slippery',
		points_earned : 0,
		offset_x : 25,
		offset_y : 50
	};
	var money = {
		name : 'money',
		coord : {x: 155, y: 65, w: 60, h: 90},
		attribute : 'safe',
		points_earned : 50,
		offset_x : 45,
		offset_y : 25
	};
	var snake = {
		name : 'snake',
		coord : {x: 225, y: 75, w: 110, h: 66},
		attribute : 'deadly',
		points_earned : 0,
		offset_x : 25,
		offset_y : 40
	};
	var coin = {
		name : 'coin',
		coord : {x: 375, y: 50, w: 100, h: 100},
		attribute : 'safe',
		points_earned : 5,
		offset_x : 25,
		offset_y : 30
	};
	var oil = {
		name : 'oil',
		coord : {x: 0, y: 150, w: 100, h: 95},
		attribute : 'slippery',
		points_earned : 0,
		offset_x : 25,
		offset_y : 30
	};
	var gold = {
		name : 'gold',
		coord : {x: 109, y: 151, w: 102, h: 66},
		attribute : 'safe',
		points_earned : 100,
		offset_x : 25,
		offset_y : 40
	};
	var skateboard = {
		name : 'skateboard',
		coord : {x: 211, y: 150, w: 108, h: 66},
		attribute : 'slippery',
		points_earned : 0,
		offset_x : 25,
		offset_y : 30
	};
	var things = [none, none, scissors, banana, money, snake, coin, oil, gold, skateboard];

	var key = Math.floor(Math.random() * things.length);
	var thing = things[key];

	if (thing.name === 'money') {
		// select another random
		key = Math.floor(Math.random() * things.length);
	};

	// make gold rare
	if (thing.name === 'gold') {
		// select another random
		key = Math.floor(Math.random() * things.length);
		thing = things[key];

		if (thing.name === 'gold') {
			// to make it even more rarer
			key = Math.floor(Math.random() * things.length);
		};
	};

	return things[key];
}

function initialize(canvas) {
	canvas.addEventListener("mousedown", drawFootstep, false);
}

function drawFootstep(event) {
	var rect = canvas.getBoundingClientRect();
    //x = event.clientX - rect.left;
    //y = event.clientY - rect.top;
    x = (event.clientX - rect.left) / (rect.right - rect.left) * canvas.width,
	y = (event.clientY - rect.top) / (rect.bottom - rect.top) * canvas.height

    width = 61;
    height = 60;

    // offset in the middle
	footstep.draw(x - (width / 2), y - (height / 2), width, height, 155, 0);   
	footstep.began = 1;
	footstep.was_inside_tile = 0;
}

function loop() {
	if (!game_over) {
		if (elapse >= (tiles.OFFSET * -1)) {
			tiles.draw(); // draw more tiles
			elapse = 0;
		}
		ctx.clearRect(0, 0, canvas.width, canvas.height);
		tiles.move();
		requestAnimationFrame(loop);
		elapse = elapse + tiles.FPS;
	} else {
		console.log('game is over');
	}
	return;
}

var tile = Drawer(ctx);

var footstep = Drawer(ctx);
footstep.began = 0; // no footstep yet
footstep.was_inside_tile = 0; // inside the tile

var start_time = 0;
var elapse = 0;
var imgSprite = new Image();
var game_over = 0;
imgSprite.src = 'images/assets/sprite.png';
tiles = Tiles(tile, ctx, canvas, footstep);
tiles.FPS = 5;
tiles.draw();
initialize(canvas);
loop(); 