const cadastrarInstrutorForm = document.getElementById("cadastrarInstrutorForm");

cadastrarInstrutorForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosInstrutor = new FormData(cadastrarInstrutorForm);

    const dados = await fetch("../control/cadastrarInstrutor.php", {
        method: "POST",
        body: dadosInstrutor
    });

    const resposta = await dados.json();

    console.log(resposta);
})