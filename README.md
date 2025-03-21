# Sistema de Anuidade

## 1. Introdução:

. O usuário deve ser cadastrata-do ao sistema antes de logar!!!

. Todos os boletos são cadastrados junto ao cliente mediante data de filiação inserida no formulário de registro

. Para pagar os boletos deve-se marcar as anuidades desejadas em CHECKOUT e clicar em pagar 

## Gestor: 

Login do admin:
. admin@gmail.com
. admin123

. O gestor após ser logado cai em seu Dashboard principal onde irá distinguir cada usuário cadastrado pela coluna de Status (caso o usuário tenha alguma "Anuidade" em pendência). 

. Na página de payments.php o "Gestor" poderá fazer ações basica como registrar novas Anuidades, editar as já presentes e deletar caso queirá. 

## Teste:

(Exemplo)
Registro de Usuário:
. Nome:  "exemplo1"
. CPF: "123.456.678-09"
. Ano de Filiação: 2023 (input do tipo number)
. Email: "exemplo1@gmail.com"
. Senha: "123456"

Fazer seu cadastro no banco de dados, clicando no botão "Login" e depois em "Não possui uma conta? Registrar", após o cadastro o usuário deve ser redirecionado para a página de login novamente, onde poderá logar com suas credenciais. 
No dashboard principal não possui nenhuma funcionalidade além de mostrar seus dados cadastrados e um menu lateral onde somente os botões (home, pagamentos e logout funcionam 😅). Entrando na página de pagamentos o usuário pode selecionar quantas anuidades quiser; selecionando as Anuidades desejadas e clicando em pagar. Por fim, uma vez que o usuário esteja em estado de adimplencia, no painel do gestor, deve mudar dinamicamente o estado daquele usuário em questão para "adimplente".

## Avisos finais: 

- O sistema de anuidade não possui nenhuma funcionalidade de pagamento real, apenas uma query que seta o valor boolean de 0 para 1.
- O front-end não foi completamente polido, pois meu trabalho requer muito de mim e portanto algumas funcionalidades, podem ser atualizadas com o tempo adicional.
- Botões de search, settings e info não possui funcionalidades, já que não foi implementado na documentação (somente figurativos).

