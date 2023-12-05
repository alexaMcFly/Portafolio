const columna=document.getElementById("columna");

columna.addEventListener("input", (e) => {
        
        if(e.target && e.target.name == "cantProductos"){
            valor=e.target.value;
            /*e.target.style.autofocus="true";*/
            if(valor.length>0){

                var boton=e.target.parentNode.getElementsByTagName("button");
                boton[0].click();

            }
            
        }
    
    }
);


