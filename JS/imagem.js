    const inputFile =
    document.querySelector("#foto"); // Pega o id do input

    const pictureImage =
    document.querySelector(".foto_imagem"); // Pega o nome da classe do span 

    const pictureIMG =
    document.createElement('img'); // Pega a a imagem do cliente
    pictureIMG.src = "./img_perfil/Teste.png";
    pictureIMG.classList.add('my-user');
    pictureImage.appendChild(pictureIMG);

    inputFile.addEventListener('change', function(e) { // Adicionando função na mudança do file
    const inputTarget = e.target; // Pega essa mudança e guarda no var

    const file = inputTarget.files[0];

    if(file) {
        const reader = new FileReader(); // Ler esse arquivo escolhido

        reader.addEventListener('load', function(e) { // Faz o a funcionalidade de mudança
            const readerTarget = e.target;

            const img = document.createElement('img'); // Criar imagem
            img.src = readerTarget.result;
            img.classList.add('my-user');

            pictureImage.innerHTML = ''; // Não repetir as imagens
            pictureImage.appendChild(img); // Colocar a imagem escolhida
        })
        reader.readAsDataURL(file); // Ler local da imagem
        
        } else {
            pictureImage.innerHTML = '';
            pictureImage.appendChild(pictureIMG); // Caso nenhuma imagem é escolhida ele fará nada
        }
    })