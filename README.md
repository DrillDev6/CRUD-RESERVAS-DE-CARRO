📅 Sistema de Agendamento de Veículos
Este repositório contém um sistema completo de CRUD para agendamento e controle de uso de veículos, com autenticação via Firebase Authentication e banco de dados MySQL, projetado para ambientes corporativos, escolas, ou qualquer instituição que necessite de organização e rastreio no uso da frota.

🚗 Funcionalidades
Login com Google (Firebase Authentication)

Cadastro de usuários sincronizado com o banco de dados MySQL

Interface de agendamentos com FullCalendar, similar ao Google Agenda

Prevenção de conflitos de horário: não permite agendar se o veículo já estiver reservado

Campos para:

Data e hora de saída/chegada

Quilometragem inicial e final (km final só pode ser preenchido após o retorno)

Destino

Nome do usuário

Upload de imagens de avarias (armazenadas localmente no servidor)

Apenas o administrador pode editar ou deletar todos os agendamentos; usuários comuns só gerenciam seus próprios

Interface web responsiva e de fácil utilização

🧰 Tecnologias Utilizadas
Frontend: HTML, CSS, JavaScript, FullCalendar

Backend: PHP

Banco de Dados: MySQL (via XAMPP)

Autenticação: Firebase Authentication (Google Login)

Armazenamento de Imagens: Local (uploads de avarias)

🚀 Como Usar
Clone o repositório:

bash
Copiar
Editar
git clone https://github.com/seu-usuario/sistema-agendamento-veiculos.git
Configure o Firebase Authentication com login via Google.

Configure o banco de dados MySQL no XAMPP usando o arquivo .sql fornecido.

Atualize os arquivos de configuração com suas credenciais e caminhos.

Inicie o servidor local e acesse o sistema via navegador.
