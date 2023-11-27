function validarNome(input) {
    input.value = input.value.replace(/[^a-zA-Záàâãéèêíïóôõöúçñ\s]/g, '');

    input.value = input.value.replace(/\s{2,}/g, ' ');
}
