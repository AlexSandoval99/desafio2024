const app = new Vue({
    el: '#app',
    data: {
        documento: '',
        password: '',
        loginError: ''
    },
    methods: {
        login() {
            // Verificar que la contraseña cumpla con las validaciones
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[*._])[A-Za-z\d*._]{8,16}$/;
            if (!passwordRegex.test(this.password)) {
                this.loginError = "La contraseña debe tener entre 8 y 16 caracteres, al menos una mayúscula, una minúscula, un dígito y solo puede contener los caracteres *, . o _.";
                return;
            }

            // Aquí iría la lógica para hacer la solicitud al backend con los datos de login
            // Supongamos que el backend devuelve un objeto { success: true/false }

            // Simulación de respuesta del backend
            const backendResponse = { success: true }; // Cambiar a false para simular un login incorrecto

            if (backendResponse.success) {
                // Login exitoso
                alert("¡Login exitoso!");
                this.loginError = '';
                // Aquí puedes redirigir a la página de inicio o realizar otras acciones necesarias
            } else {
                // Login fallido
                this.loginError = "Usuario o contraseña incorrectos.";
            }
        }
    }
});
