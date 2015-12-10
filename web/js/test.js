/**
 * Created by babenoff on 07.12.2015.
 */

window.onload = function() {
    var g = new Snap();

    g.attr({
        viewBox: [0, 0, 320, 240]
    });

    Snap.load('public/likedimion.svg', function(f) {
        function getShift(dot) {
            return "t" + (400 - dot.x) + "," + (300 - dot.y);
        }

    });
};
