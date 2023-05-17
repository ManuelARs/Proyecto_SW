function toggleAdditionalFields() {
    var method = document.getElementById("method").value;
    var x = document.getElementById("hidden"); 
    if (method === "POST" || method === "PUT") {
        x.style.display = "block";
    } else {
        x.style.display = "none"; 
    }
}

function submitForm() {
    var form = document.getElementById("myForm");
    var method = form.method.value;
    var id = form.id.value;
    var nombre = form.nombre.value;
    var apellido_p = form.apellido_p.value;
    var apellido_m = form.apellido_m.value;
    var grado = form.grado.value;

    //JSON object to send info
    var data = {
        id: id,
        nombre: nombre,
        apellido_p: apellido_p,
        apellido_m: apellido_m,
        grado: grado
    };

    // Conditionally add a hidden input field to send the ID
    if (method === "GET") {
        const queryString = new URLSearchParams(data).toString();
        var url = `rest_alumnos.php`;
        if(id) {
            url = `rest_alumnos.php?${queryString}`;
        } 
        fetch(url)
          .then(response => {
              // Parse the JSON response
              return response.text();
          })
          .then(data => {
              // Access the message in the response
              console.log(data);
              // alert(data);
          })
          .catch(error => {
            // Handle any errors
            console.error(error);
          });
  }

    if (method === "POST" || method === "PUT") {
        fetch('rest_alumnos.php', {
            method: `${method}`,
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          })
            .then(response => {
                // Parse the TXT response
                return response.text();
            })
            .then(data => {
                console.log(data);
            })
            .catch(error => {
              // Handle any errors
              console.error(error);
            });
    }
    
    if (method === "DELETE" && id) {
        const params = new URLSearchParams(data).toString();
        const url = `rest_alumnos.php?${params}`;

        fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        }
        })
        .then(response => {
            // Parse the TXT response
            return response.text();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
          // Handle any errors
          console.error(error);
        });
    }

}