/**
 * Created by Novateur on 4/26/2017.
 */
function smoothMove(origin, towards, count, element) {
    var id = setInterval(function() {
        if (origin == towards) {
            clearInterval(id);
        }
        else {
            origin = origin + count;
            document.getElementById(element).style.left = origin + 'px';
        }
    }, 1);
}
function smoothFade(element) {
    var origin = 0.4;
    var id = setInterval(function() {
        if (origin < 0) {
            clearInterval(id);
            document.getElementById(element).style.display = 'none';
        }
        else {
            origin = origin - 0.01; 	document.getElementById(element).style.backgroundColor = 'rgba(10, 10, 10, ' + origin + ')';
        }
    }, 5);
}

function toggleNav() {
    var nav = document.getElementById("sidebar");
    var blurrie = document.getElementById("blurrie");
    if (blurrie.style.display == "none") {
        blurrie.style.display = "block";
        blurrie.style.backgroundColor = "rgba(10, 10, 10, 0.4)";
        smoothMove(-280, 0, 5, 'sidebar');
    }

    else {
        smoothFade('blurrie');
        smoothMove(0, -280, -5, 'sidebar');
    }
}

//SWIPE EVENT
document.addEventListener('touchstart', handleTouchStart, false);
document.addEventListener('touchmove', handleTouchMove, false);
var xDown = null;
var yDown = null;
function handleTouchStart(evt) {
    xDown = evt.touches[0].clientX;
    yDown = evt.touches[0].clientY;
};

function handleTouchMove(evt) {
    if ( ! xDown || ! yDown ) {
        return;
    }
    var xUp = evt.touches[0].clientX;
    var yUp = evt.touches[0].clientY;
    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;
    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
        if ( xDiff > 0 ) {
            /* left swipe */
            if (document.getElementById('sidebar').style.left == '-280px'){}
            else {
                toggleNav();
            }
        } else {
            /* right swipe */
            if (document.getElementById('sidebar').style.left == '-280px') {
                toggleNav();
            }
        }
    } else {
        if ( yDiff > 0 ) {
            /* up swipe */
        } else {
            /* down swipe */
        }
    }
    /* reset values */
    xDown = null;
    yDown = null;
};

//END SWIPE EVENT

//RIPPLE EFFECT
var addRippleEffect = function (e) {
    var target = e.target;
    if (target.tagName.toLowerCase() !== 'p' && target.tagName.toLowerCase() !== 'button') return false;
    var rect = target.getBoundingClientRect();
    var ripple = target.querySelector('.ripple');
    if (!ripple) {
        ripple = document.createElement('span');
        ripple.className = 'ripple';
        ripple.style.height = ripple.style.width = Math.max(rect.width, rect.height) + 'px';
        target.appendChild(ripple);
    }
    ripple.classList.remove('show');
    var top = e.pageY - rect.top - ripple.offsetHeight / 2 - document.body.scrollTop;
    var left = e.pageX - rect.left - ripple.offsetWidth / 2 - document.body.scrollLeft;
    ripple.style.top = top + 'px';
    ripple.style.left = left + 'px';
    ripple.classList.add('show');
    return false;
};

document.addEventListener('click', addRippleEffect, false);
//END RIPPLE EFFECT
