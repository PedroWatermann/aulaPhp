// Função para mudar o favicon de acordo com o tema do usuário
function detectColorScheme() {
    // Obtém o elemento favicon com o id favicon
    const fav = document.getElementById("favicon");
    // Função para atualizaro favicon
    const atualizaFavicon = () => {
        // Verifica se a página está fora de foco
        if (document.hidden) {
            fav.href = "img/icon.gif";
            fav.type = "image/gif";
        } else {
            // Verifica se o tema do navegador é dark
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                fav.href = "img/iconwhite.png";
                fav.type = "image/png";
            }
        }
    };

    // Atualiza o favicon
    atualizaFavicon();

    // Adiciona um listener para mudanças de visibilidade
    document.addEventListener("visibilitychange", atualizaFavicon);
}

function paginalink() {
    const url = window.location.href;
    let linkHome = document.getElementById("home");
    let linkUsua = document.getElementById("usua");
    let linkProd = document.getElementById("prod");
    let linkPedi = document.getElementById("pedi");
    let linkRela = document.getElementById("rela");

    if (url.includes("aula.php")) {
        linkHome.classList.add("ativo");
        linkUsua.classList.remove("ativo");
        linkProd.classList.remove("ativo");
        linkPedi.classList.remove("ativo");
        linkRela.classList.remove("ativo");
    } else if (url.includes("usuario.php")) {
        linkUsua.classList.add("ativo");
        linkHome.classList.remove("ativo");
        linkProd.classList.remove("ativo");
        linkPedi.classList.remove("ativo");
        linkRela.classList.remove("ativo");
    } else if (url.includes("produto.php")) {
        linkProd.classList.add("ativo");
        linkUsua.classList.remove("ativo");
        linkHome.classList.remove("ativo");
        linkPedi.classList.remove("ativo");
        linkRela.classList.remove("ativo");
    } else if (url.includes("retirar.php")) {
        linkPedi.classList.add("ativo");
        linkUsua.classList.remove("ativo");
        linkProd.classList.remove("ativo");
        linkHome.classList.remove("ativo");
        linkRela.classList.remove("ativo");
    } else if (url.includes("relatorio.php")) {
        linkRela.classList.add("ativo");
        linkUsua.classList.remove("ativo");
        linkProd.classList.remove("ativo");
        linkPedi.classList.remove("ativo");
        linkHome.classList.remove("ativo");
    }
}

// Executa a função ao carregar a página
paginalink();
detectColorScheme();