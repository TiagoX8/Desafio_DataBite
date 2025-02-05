Desafio: Sistema de Jogos de Futebol - Brasileiro ou Campeonato Internacional
Descrição: O candidato deve criar um sistema em PHP que consuma uma API pública de futebol (como a API-Football ou Football-Data.org) e forneça informações sobre os jogos do Campeonato Brasileiro (ou outro campeonato de sua escolha, como a Premier League ou La Liga).
O sistema deve permitir que o usuário:
Escolha um campeonato de futebol (pode ser o Campeonato Brasileiro ou outro campeonato).
Exiba os jogos programados para a próxima rodada.
Mostre informações sobre os últimos resultados da competição (últimos jogos).
Permita pesquisar por um time específico e mostrar suas partidas programadas e últimos resultados.

Requisitos:
Consumir uma API Pública de Futebol:
O candidato deve consumir uma API pública de futebol que forneça dados sobre jogos. Algumas boas opções incluem:
API-Football
Football-Data.org
A API deve ser usada para obter informações sobre jogos de um campeonato específico (ex: Campeonato Brasileiro) e também deve permitir a busca de jogos por time.


Exibição dos Jogos Programados:
O sistema deve permitir ao usuário selecionar um campeonato.
Exibir os próximos jogos para a competição selecionada. Para cada jogo, as seguintes informações devem ser apresentadas:
Nome dos times (casa e visitante).
Data e hora do jogo.
Estádio (se disponível).


Exibição dos Últimos Resultados:
O sistema deve mostrar os últimos resultados para a competição ou time selecionado.
Para cada jogo, deve ser exibido o nome dos times e o placar final (ex: "Flamengo 2x1 Vasco").


Busca por Time Específico:
O usuário pode pesquisar por um time específico (por nome), e o sistema deve mostrar todos os jogos programados para esse time, bem como os últimos resultados.


Interface Simples e Limpa:
A interface deve ser simples e amigável. Pode ser feita com HTML básico, ou o candidato pode usar algo como Bootstrap para melhorar a aparência.
Exibir as informações de forma clara, com ênfase em dados como time, data, hora e placar dos jogos.


Validações:
O sistema deve tratar casos em que a API não retorne dados, como quando o campeonato ou time não existe ou há problemas na consulta.
O sistema deve tratar entradas inválidas (por exemplo, nome de time errado) e exibir uma mensagem adequada.

Critérios de Avaliação:
Integração com a API: Como o candidato consome a API de futebol e lida com os dados recebidos.
Lógica e Exibição de Dados: Como ele processa e organiza os dados da API para exibir as informações de forma clara e intuitiva.
Busca por Time Específico: A funcionalidade de pesquisa está funcionando corretamente? O candidato pode otimizar ou melhorar essa parte?
Boas Práticas de Programação: O código é organizado, reutilizável e legível? O candidato usa boas práticas, como a separação de funções e tratamento de erros?
Interface de Usuário (UX): A interface é simples e fácil de usar? As informações estão bem organizadas e visíveis?
