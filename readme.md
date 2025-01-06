# Text Manager PHP

**Versão** 0.1.3

**Objetivo** Organiza funções úteis para manipular strings.

## Detalhes

### O que faz?

Executa ações úteis envolvendo strings e textos, como contar palavras, dividir frases, converter letras para maiúsculas, remover acentos e outras operações.

## Como instalar

1. Copie o conteúdo para um diretório dentro de seu projeto;
2. Num script externo à pasta deste projeto, utilize o seguinte código para incluir **Text Manager**:

```php
require dirname(__FILE__) . "/textManager-php/text.php" ;
```

3. Acesse as classes de **Text Manager** através do namespace `\text`;

A estrutura de diretórios do projeto deve estar da seguinte forma:

- textManager-php
    - *Arquivos de textManager-php*
    - ...
- index.php

No caso, o script *index.php* deve conter a instrução no passo 2. Fique à vontade para renomear a pasta em que ficará instalado este projeto.

## Exemplos

### Como transformar uma frase numa URL válida

Depois de incluir o arquivo conforme o passo 2 da seção **Como instalar**, utilize o método `to_url ( )` da seguinte forma:

```php
use text\writing;

$title = new writing("Como obter Data e Hora em Python");

$url = "https://diariocode.com.br/blog/python/" . $title->to_url();

echo $url;
```

O código acima converte um título de uma página web para um formato compatível com uma URL na internet. O método `to_url ( )` substitui os espaços do título por hífens (`-`), remove os acentos, converte o cedilha para a letra "`c`" e qualquer outro símbolo que poderia causar problemas numa URL. O código acima retornará o seguinte:

```php
// https://diariocode.com.br/blog/python/como-obter-data-e-hora-em-python
```

## Mapa de utilização de Text Manager

Abaixo, está o mapa de classes e propriedades de Routes Manager.

* **text [ namespace ]**
    
    * **writing [ classe ]**
        * PROPRIEDADES
            * string [ propriedade:string ]
            * chars [ propriedade:int]
            * words [ propriedade:int]
        * MÉTODOS
            * correct_font ( )
            * remove_accents ( )
            * replace_punctutation ( )
            * to_url ( )
            * word_slice ( )

## Bugs

Atualmente, o projeto possui os seguintes bugs:

- As funções não possuem tratamento de erros eficiente, expondo dados sensíveis e a própria estrutura do website;
   - Para dirimir esse bug, em versões futuras será criado a classe **Exception** para tratamento de erros;

## Histórico

0.1.3:
- Renomeado método `remove_punctuation ( )` para `replace_punctutation ( )`;
- Melhorados comentários e explicações sobre os métodos;
- Adicionadas 2 novas propriedades: `chars` e `words`;

0.1.0:
- Lançamento inicial;