// Primero declaramos variables para poder utilizarlas con javascript
// Aqui verifica que si el usuario esta dentro se le muestran diversas opciones
const loggedOutLinks = document.querySelectorAll('.logged-out')
const loggedInLinks = document.querySelectorAll('.logged-in')
const boton = document.querySelectorAll('#boton')
const test = document.querySelectorAll('#test')

const loginCheck = user => {
    if (user) {
        loggedInLinks.forEach(link => link.style.display = 'block');
        loggedOutLinks.forEach(link => link.style.display = 'none');
        boton.forEach(link => link.style.display = 'block')
        test.forEach(link => link.style.display = 'block')

    } else {
        loggedInLinks.forEach(link => link.style.display = 'none');
        loggedOutLinks.forEach(link => link.style.display = 'block');
        boton.forEach(link => link.style.display = 'none')
        test.forEach(link => link.style.display = 'none')

    }
}

// Registro de usuario
const signupForm = document.querySelector('#RegistrarForm');
signupForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const email = document.querySelector('#Registrarse-email').value;
    const password = document.querySelector('#Registrarse-password').value;

    auth
        .createUserWithEmailAndPassword(email, password)
        .then(userCredential => {
            // Clear the form
            signupForm.reset();
            // Close the modal
            $('#RegistrarModal').modal('hide')
            console.log('sign up')
        })
})

// Inicio de sesion con correo
const signinForm = document.querySelector('#IniciarForm');
signinForm.addEventListener('submit', (e) => {
    e.preventDefault();


    const email = document.querySelector('#Iniciar-email').value;
    const password = document.querySelector('#Iniciar-password').value;

    auth
        .signInWithEmailAndPassword(email, password)
        .then(userCredential => {
            // Clear the form
            signupForm.reset();
            // Close the modal
            $('#IniciarModal').modal('hide')
            console.log('sing in')
        })
})

//Cerrar sesion 
const logout = document.querySelector('#CerrarSesion');
logout.addEventListener('click', (e) => {
    e.preventDefault;
    auth.signOut().then(() => {
        console.log('sign out');
    })
})


// Google login
const googleButton = document.querySelector('#googleLogin')
googleButton.addEventListener('click', e => {
    const provider = new firebase.auth.GoogleAuthProvider();
    auth.signInWithPopup(provider)
        .then(result => {
            console.log('google sign in');
            // Clear the form
            signupForm.reset();
            // Close the modal
            $('#IniciarModal').modal('hide')
        })
        .catch(err => {
            console.log(err);
        })
})

// Facebook login
const facebookButton = document.querySelector('#facebookLogin')
facebookButton.addEventListener('click', e => {
    e.preventDefault();
    const provider = new firebase.auth.FacebookAuthProvider();
    auth.signInWithPopup(provider)
        .then(result => {
            console.log(result);
            console.log('facebook sign in');
            // Clear the form
            signupForm.reset();
            // Close the modal
            $('#IniciarModal').modal('hide')
        })
        .catch(err => {
            console.log(err);
        })
})

// Generar pdf
function genPdf() {
    function createHeaders(keys) {
        return keys.map(key => ({
            'name': key,
            'prompt': key,
            'width': 50,
            'align': 'center',
            'padding': 0
        }));
    };
    var tableHeaders = createHeaders(["Residencia", "Total"]);

    fs.collection('Usuarios').get().then((snapshot) => {
        var tableData = [];
        snapshot.forEach((value, _idx) => {
            let userResidencia = value.get('Residencia');
            let chartResicencia = tableData.find(item => item['Residencia'] === userResidencia);
            if (chartResicencia) {
                chartResicencia['Total'] = chartResicencia['Total'] + 1
            } else {
                let newResidencia = {
                    'Residencia': userResidencia,
                    'Total': 1,
                };
                tableData.push(newResidencia);
            };
        });
        console.log(tableData);
        const pdf = new jsPDF()    
        pdf.text(20, 20, '')
        pdf.table(1, 1, tableData, tableHeaders)
        pdf.save('aplicaciones_graficas')
    });

}

// Usuarios posts
const postList = document.querySelector('.posts');
const setupPosts = data => {
    if (data.length) {
        let html = '';
        data.forEach(doc => {
            const post = doc.data()
            const li = `
                <li class="list-group-item list-group-item-action">
                    <h5>Nombre: ${post.Nombre}</h5>
                    <p>Residencia: ${post.Residencia}</p>
                </li>
            `;
            html += li;
        });
        postList.innerHTML = html;
    } else {
        postList.innerHTML = '<p class="text-center">Inicia sesion para ver los usuarios</p>'
    }
};

// Generacion de grafico
const setupChart = data => {
    let chartData = [];
    data.forEach((value, _idx) => {
        let userResidencia = value.get('Residencia');
        let chartResicencia = chartData.find(item => item['label'] === userResidencia);
        if (chartResicencia) {
            chartResicencia['total'] = chartResicencia['total'] + 1
        } else {
            let newResidencia = {
                'label': userResidencia,
                'total': 1,
            };
            chartData.push(newResidencia);
        };
    });

    var myPieChart = new Chart(document.getElementById('myChart'), {
        type: 'pie',
        data: {
            labels: chartData.map(obj => obj['label']),
            datasets: [
                {
                    data: chartData.map(obj => obj['total']),
                    backgroundColor: [
                        "#FF6384",
                        "#63FF84",
                        "#84FF63",
                        "#8463FF",
                        "#6384FF"
                    ]
                }]
        },
        options: {
            legend: {
                position: 'left'
            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    });

    return;
};

// eventos
// lista para los autenticados cambia el estado
auth.onAuthStateChanged(user => {
    if (user) {
        fs.collection('Usuarios')
            .get()
            .then((snapshot) => {
                setupPosts(snapshot.docs)
                setupChart(snapshot.docs)
                loginCheck(user);
            })
    } else {
        setupPosts([])
        loginCheck(user);
    }
})
