// Magic Cursor
options = {
    "cursorOuter": "circle-basic",
    "hoverEffect": "circle-move",
    "hoverItemMove": true,
    "defaultCursor": true,
    "outerWidth": 30,
    "outerHeight": 30
};
magicMouse(options);
// Page Scroll
$(document).ready(function() {
	$('#content').fullpage({
		//options here
		autoScrolling:true,
		navigation: true,
        loopBottom: true,
        resize: false,
        scrollOverflow: true,
        css3: true,
	});

	//methods
});
// Text Typing
var typed = new Typed('#text-writer', {
    strings: ['Amr Khaled', 'From Egypt', 'A Full-Stack Developer'],
    typeSpeed: 70,
    backSpeed: 35,
    loop: true,
    loopCount: Infinity,
    cursorChar: ' /&gt;',
});
// scroll down boll jump
var ball = document.querySelector('scroll-down');
var h = 575; // x vertex, half of total bounce duration
var k = 160; // y vertex, total bounce height
var a = -4 * k / Math.pow(h * 2, 2); // coefficient: -.000483932
var ypos, start, time;

(function drawPosition(timestamp) {
    if (!start) { start = timestamp };
    time = timestamp - start;

    // Position as a function of time, using the vertex form
    // of the quadratic formula:  f(x) = a(x - h)^2 + k,
    // (where [h, k] is the vertex). See it graphically at:
    //    https://www.desmos.com/calculator/i6yunccp7v
    ypos = a * Math.pow(((time + h) % (h * 2) - h), 2) + k;

    ball.style.transform = 'translateY(' + -ypos + 'px)';
    window.requestAnimationFrame(drawPosition);
})(performance.now());

// create function that takes a variable and return 