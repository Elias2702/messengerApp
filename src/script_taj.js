/* becode/javascript
 *
 * /03-colors/03-change-bcg-three/script.js - 3.3: couleur de fond (3)
 *
 * coded by leny@BeCode
 * started at 26/10/2018
 */

// NOTE: don't focus on the existing code structure for now.
// You will have time to focus on it later.

(function() {

    // your code here
	document.getElementById("mem_sel").onclick =  function() {
        //call a php file name that contain the display code
          //  document.getElementById("dsp_cnv").setAttribute(action,"display_conv.php"); 
            //simulate a mouse click
           //document.getElementById("dsp_cnv").click();

            var elem = document.getElementById("dsp_cnv");
            var click = new MouseEvent('click', {
                view: window
            });
            elem.dispatchEvent(click);
           //var dsp =" <?php require_once 'display_conv.php'; ?>";
	};
})();