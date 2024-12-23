document.addEventListener('DOMContentLoaded', function () {
    const guiaRadio = document.querySelector('#guia');
    const clienteRadio = document.querySelector('#cliente');
    const habilitacaoInput = document.querySelector('#habilitacaoGuia');

    function toggleHabilitacao() {
        if (guiaRadio.checked) {
            habilitacaoInput.required = true;
            habilitacaoInput.disabled = false;
        } else if (clienteRadio.checked) {
            habilitacaoInput.required = false;
            habilitacaoInput.disabled = true;
        }
    }

    guiaRadio.addEventListener('change', toggleHabilitacao);
    clienteRadio.addEventListener('change', toggleHabilitacao);

    toggleHabilitacao();
});
