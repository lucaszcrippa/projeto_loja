# 🛒 Sistema de Pedidos em PHP

## 👨‍💻 Desenvolvedor

**Lucas Crippa**

---

## 📌 Sobre o Projeto

Este projeto consiste em um sistema de pedidos desenvolvido em PHP com Programação Orientada a Objetos (POO), integrado a um banco de dados MySQL.

O objetivo é simular o funcionamento básico de uma loja, permitindo o gerenciamento de clientes, produtos e pedidos de forma organizada e automatizada.

---

## 🎯 Funcionalidades

O sistema permite:

* ✅ Cadastrar clientes
* ✅ Cadastrar produtos
* ✅ Editar clientes
* ✅ Excluir clientes
* ✅ Criar pedidos
* ✅ Adicionar produtos aos pedidos
* ✅ Calcular automaticamente o valor total
* ✅ Exibir resumo completo do pedido

---

## 🧠 Conceitos Aplicados

Durante o desenvolvimento foram aplicados:

* Programação Orientada a Objetos (POO)
* Encapsulamento (`private`)
* Getters e Setters
* Construtor (`__construct`)
* Organização de código em múltiplos arquivos
* Uso de `require_once`
* Integração com banco de dados (PDO)
* CRUD (Create, Read, Update, Delete)
* Relacionamento entre tabelas (chaves estrangeiras)
* Estrutura MVC simplificada (DAO/DTO/View)
* HTML + CSS responsivo

---

## 🗄️ Banco de Dados

O sistema utiliza MySQL com as seguintes tabelas:

* `clientes`
* `produtos`
* `pedidos`
* `pedido_itens`

### 🔗 Relacionamentos:

* Um cliente pode ter vários pedidos
* Um pedido pode ter vários produtos
* Relação feita através de chaves estrangeiras

---

## 📂 Estrutura do Projeto

```bash
projeto_loja/
│
├── config/
│   └── database.php
│
├── classes/
│   ├── Cliente.php
│   ├── Produto.php
│   ├── Pedido.php
│   └── ItemPedido.php
│
├── actions/
│   ├── salvar_cliente.php
│   ├── excluir_cliente.php
│   ├── editar_cliente.php
│   ├── atualizar_cliente.php
│   ├── salvar_produto.php
│   ├── criar_pedido.php
│   └── adicionar_item.php
│
├── css/
│   ├── style.css
│   └── editar.css
│
├── index.php
└── pedido.php
```

---

## ⚙️ Como Executar

1. Iniciar o XAMPP (Apache + MySQL)
2. Acessar o phpMyAdmin
3. Criar o banco de dados:

```
projeto_loja
```

4. Executar o script SQL para criar as tabelas
5. Colocar a pasta do projeto dentro de:

```
htdocs
```

6. Acessar no navegador:

```
http://localhost/projeto_loja
```

---

## 🎨 Interface

O sistema possui:

* Layout organizado
* Estilo moderno com CSS
* Responsividade para dispositivos móveis 📱
* Tabelas estilizadas
* Botões de ação (Editar / Excluir / Atualizar)

---

## ⚠️ Observações

* Não é possível excluir um cliente que possui pedidos vinculados (integridade referencial)
* O sistema utiliza PDO para maior segurança
* Os dados são manipulados via formulários HTML

---

## 🚀 Possíveis Melhorias

* Sistema de login
* Dashboard administrativo
* Filtros e buscas
* Paginação
* Carrinho de compras
* Tema dark 🌙

---

## 📌 Conclusão

Este projeto permitiu consolidar conhecimentos fundamentais em desenvolvimento web com PHP, banco de dados e boas práticas de programação, simulando um sistema real de gerenciamento de pedidos.

---

## ⭐ Autor

**Lucas Crippa**
