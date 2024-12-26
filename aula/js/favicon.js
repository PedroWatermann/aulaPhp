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

// Executa a função ao carregar a página
detectColorScheme();