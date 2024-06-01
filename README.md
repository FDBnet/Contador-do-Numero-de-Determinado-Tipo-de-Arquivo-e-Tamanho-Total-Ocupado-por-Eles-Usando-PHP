# Contador do Número de Arquivos Armazenados e o Tamanho que Eles Ocupam Através de um Código em PHP Puro (PHP File Counter and Size Calculator)

Este repositório contém um script PHP que itera recursivamente através de todos os arquivos PHP em um diretório específico, contando-os e calculando o tamanho total ocupado por eles.

## Como funciona

O script utiliza as classes `RecursiveDirectoryIterator`, `RecursiveIteratorIterator`, e `RegexIterator` para percorrer recursivamente os diretórios e subdiretórios, identificando apenas arquivos com a extensão indicada, no exemplo foi colocado `.pdf`. Neste caso, ele calcula o número total de arquivos PDFs e o tamanho total combinado desses arquivos.

## Requisitos

- PHP 7.4 ou superior (recomendo PHP >= 8.3)
- Acesso ao sistema de arquivos (Permissão para que o PHP encontre e leia estes arquivos: normalmente já tem)

## Uso

Para usar o script, você deve clonar este repositório e executar o script no seu ambiente local ou servidor com acesso ao diretório desejado. Certifique-se de alterar o caminho do diretório no script para o diretório que deseja analisar.

Ou fazer uma copia do script "contadorArquivos.php" e usar em seu sistema ou serviço! 

```bash
php path/to/contadorArquivos.php
