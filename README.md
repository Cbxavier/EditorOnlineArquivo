Descrição do Projeto:

O projeto consiste em um editor de arquivos online desenvolvido em PHP, criado com o objetivo de explorar e compreender conceitos fundamentais de programação backend utilizando PHP, especialmente focando na manipulação de arquivos. Este projeto foi criado pois estou estudando PHP ele é para treinar minhas habilidades de programação.

O código PHP é estruturado para realizar a edição e salvamento de arquivos de texto, como arquivos PHP, HTML e JavaScript. O funcionamento do editor é baseado em formulários HTML e na interação do usuário com a interface web.

Principais funcionalidades do projeto:

Listagem de arquivos:

Utiliza a função scandir do PHP para obter a lista de arquivos no diretório 'files'.
Percorre a lista de arquivos, verifica se são arquivos (não diretórios) e filtra aqueles com extensões específicas (php, html, js).
Exibe a lista de arquivos compatíveis na interface web, permitindo que o usuário selecione um arquivo para edição.
Edição de arquivos:

Se um arquivo é selecionado através do método GET na URL, verifica se o arquivo existe no diretório 'files'.
Se o arquivo existe, exibe um formulário HTML que contém uma textarea preenchida com o conteúdo atual do arquivo utilizando a função file_get_contents.
Permite que o usuário edite o conteúdo do arquivo na textarea.
Atualização e salvamento de arquivos:

Utiliza um formulário HTML com o método POST para capturar os dados do usuário (conteúdo editado e caminho do arquivo).
Utiliza a função file_put_contents do PHP para salvar as alterações no arquivo, atualizando seu conteúdo.
Exibe uma mensagem de sucesso em JavaScript caso o salvamento seja bem-sucedido.

