function validStatuscheck(id, name, numeroarr) {
    if (document.getElementById(id + numeroarr).checked === false) {
        var checkboxs = document.querySelectorAll('input[name = "' + name + '"]');

        checkboxs.forEach(check => {
            if (check.checked === true) {
                check.checked = false;
            }
        });
        document.getElementById('check' + numeroarr).checked = true;
    }
}


function inhabilitarchecks(name) {
    var checkboxs = document.querySelectorAll('input[name = "' + name + '"]');

    checkboxs.forEach(check => {
        if (check.checked === true) {
            check.checked = false;
        }
    });
}




function mostarpanel() {
    const elementdiv = document.querySelector('.divofreci')
    const style = getComputedStyle(elementdiv)
    console.log(style.display);

    if (style.display === 'none') {
        document.getElementById('divofreci').style.display = "block";
        document.getElementById('cuadofrecimi').style.display = "none";        
        document.getElementById('divofreci').style.animation= "aparece-izquierda ease 1s backwards";
    
    } else if (style.display === 'block') {
        document.getElementById('cuadofrecimi').style.display = "block";        
        document.getElementById('divofreci').style.display = "none";

    }

    
}
