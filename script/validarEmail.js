function validarEmail(input) {
    input.value = input.value.replace(/[^a-zA-Z0-9@._-]/g, '');
}
