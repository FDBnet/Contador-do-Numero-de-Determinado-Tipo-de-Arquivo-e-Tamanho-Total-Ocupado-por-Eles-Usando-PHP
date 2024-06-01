<?php
// Altere aqui. Informe o caminho para acessar a raiz ou algum diretório específico que deseja contar o número e tamanho dos arquivos:
$diretorioEscolhido = new RecursiveDirectoryIterator('/home/user'); // Exemplo: '/home/user', onde 'user' é o nome do usuário no sistema operacional Linux. É importante está correto para funcionar!

$iterator = new RecursiveIteratorIterator($diretorioEscolhido);
// Altere o tipo de arquivo que deseja pesquisar, substituindo "pdf" por "php", "mp3", "jpg", "png", "html", etc:
$arquivos = new RegexIterator($iterator, '/^.+\.pdf$/i', RecursiveRegexIterator::GET_MATCH);

$contadorDeArquivos = 0;
$tamanhoTotal = 0;

foreach ($arquivos as $arquivoInfo) {
    $contadorDeArquivos++;
    // Acesso ao SplFileInfo para pegar o tamanho do arquivo:
    $arquivo = new SplFileInfo($arquivoInfo[0]);
    $tamanhoTotal += $arquivo->getSize();
}

echo "Número de Arquivos Encontrados: " . $contadorDeArquivos . "\n";
echo "Tamanho Total dos Arquivos: " . formataUnidsDeTamanho($tamanhoTotal);

// Função para facilitar a leitura do tamanho dos arquivos:
function formataUnidsDeTamanho($bytes) {
    if ($bytes >= 1099511627776) {
        $bytes = number_format($bytes / 1099511627776, 2) . ' TB';
    } elseif ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } else {
        $bytes = $bytes . ' bytes';
    }
    return $bytes;
}
?>
