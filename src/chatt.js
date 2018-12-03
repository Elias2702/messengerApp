
function js_get_cnv_id() {
    var x = document.getElementById("dsp-cnv").selectedIndex;
    var y = document.getElementById("dsp-cnv").options;
    document.getElementById("dsp-tst").innerHTML = y[x].value;//selectedIndex;//option['selectedIndex'].value;// <?php var_dump($cnv_ident); ?>;
    document.getElementById("dsp-tst").value = z;
    var z = y[x].value;
    
 //document.getElementById("get_cnv_id").click();
}
/* var x = document.getElementById("mySelect").selectedIndex;
    var y = document.getElementById("mySelect").options;
    alert("Index: " + y[x].index + " is " + y[x].value);
    */
        