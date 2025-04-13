# 📦 Fila de Prioridade em PHP

Este projeto demonstra **4 formas diferentes** de implementar uma **fila de prioridade** em PHP, com foco em clareza, escalabilidade e uso eficiente das estruturas de dados nativas da linguagem.

Além disso, trata-se de um **projeto de estudo** desenvolvido para a realização do **trabalho de Atividades Práticas Supervisionadas (APS)** da disciplina **Tópicos Especiais de Sistemas de Informação**, do curso de **Análise e Desenvolvimento de Sistemas** da **Faculdade Unifametro**.

---

## 🚀 Objetivo

Simular uma **fila de processamento de dados** com diferentes **níveis de prioridade**. Cada item da fila recebe um `peso` que define o tempo de execução ou sua posição de prioridade no processamento.

---

## 🧠 Conceitos Usados

- Estruturas de dados nativas (`SplPriorityQueue`)
- Programação orientada a objetos (POO)
- Enumeração com `enum` (PHP 8.1+)
- Simulação de execução com `sleep(peso)`
- Fila dinâmica e processamento ordenado por prioridade

---

## ⚙️ Modos de Execução

### ✅ `meio1()` — Simples com array

> Uma versão **minimalista**, usando somente arrays puros. Boa para entender o conceito inicial de fila e simular comportamento com `sleep()`.

---

### ✅ `meio2()` — Com classe `Fila` customizada

> Usa uma classe personalizada com organização por `peso`.  
> Permite executar:
- `Prioridade::Alta` → Do maior para o menor peso
- `Prioridade::Baixa` → Do menor para o maior peso
- `Prioridade::Media` → FIFO simples (ordem de chegada)

✔️ Aceita pesos não previstos (ex: peso `11`)  
⚠️ Depende de chaves `nome` e `peso` nos dados

---

### ✅ `meio3()` — Usando `SplPriorityQueue` diretamente

> Implementação direta com `SplPriorityQueue`, a estrutura de **fila com prioridade nativa do PHP**.

- Prioridade automaticamente tratada com ordenação decrescente
- Fácil manutenção
- Simples e robusto

---

### ✅ `meio4()` — Fila nativa + Enum `Prioridade`

> Estende a ideia do `meio3`, mas agora com uma classe mais completa (`SplFila`) que:
- Aceita `Prioridade::Alta`, `Media`, `Baixa`
- Mantém execução fiel ao conceito de fila com prioridade
- Simula o tempo de execução com `sleep()`
- Exibe log do item processado com seu respectivo peso

---

## 📂 Estrutura do Projeto

├── Classes/ <br>
│ ├── Fila.php # Fila com arrays manuais por peso <br>
│ ├── SplFila.php # Fila com SplPriorityQueue e enum <br>
│ ├── Prioridade.php # Enum com tipos de prioridade <br>
│ └── SimplesComEstruturaDeDados.php # Fila bruta com   estrutura nativa <br>
├── SimplesComArray.php # Versão mais simples com array puro <br>
├── index.php # Ponto de entrada do projeto <br>
└── README.md<br>

---

## ⚙️ Modos de Execução

### ✅ `meio1()` — Fila com array simples

> Implementação direta, didática, usando apenas arrays PHP. Ideal para introdução ao conceito.

---

### ✅ `meio2()` — Classe `Fila` com arrays separados por peso

> Usa estrutura por array e simula prioridade com:
- `Prioridade::Alta` → executa do maior para o menor
- `Prioridade::Baixa` → executa do menor para o maior
- `Prioridade::Media` → executa em ordem de chegada (FIFO)

✔️ Suporta pesos não definidos (ex: peso 11)  
⚠️ Requer que os dados tenham as chaves `nome` e `peso`

---

### ✅ `meio3()` — Classe com `SplPriorityQueue` puro

> Usa diretamente o `SplPriorityQueue` com peso como prioridade nativa.  
Menos flexível, mas extremamente simples e eficaz para execuções automáticas por prioridade.

---

### ✅ `meio4()` — Classe `SplFila` com enum e prioridade definida

> Combina a estrutura nativa com uma arquitetura orientada a comportamento via `enum`.  
Permite executar:

- `Prioridade::Alta` → prioriza maiores pesos
- `Prioridade::Media` → executa em FIFO
- `Prioridade::Baixa` → prioriza menores pesos

✨ Mais robusta e flexível

---

## 🛠️ Requisitos

- PHP 8.1 ou superior (necessário para suporte a enums)
- Composer (opcional, para autoload)
- Extensão SPL (habilitada por padrão na maioria das instalações PHP)

## 🚀 Como Executar

1. Clone o repositório:

```bash
git clone https://github.com/iarleyibiapina/fila-prioridade-php.git
cd fila-prioridade-php
```

2. (Opcional) Instale as dependências:

```bash
composer install
```

3. Edite o arquivo `index.php` para selecionar o método desejado:

```php
// Escolha uma das implementações:
// meio1();  // Array simples
// meio2();  // Classe Fila customizada
// meio3();  // SplPriorityQueue puro
meio4();    // SplFila com enum
```

4. Execute o projeto:

```bash
php index.php
```

## 📜 Licença

Este projeto está licenciado sob a licença MIT - veja o arquivo [LICENSE](LICENSE) para detalhes.

## 👥 Equipe

- Iarley Ibiapina Barbosa
- Antonio Gabriel Benevides Gondim
- Paulo Cezar Nascimento Dos Santos
- Bruno Teixeira de Souza
