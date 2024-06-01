<?php
$diretorioEscolhido = new RecursiveDirectoryIterator('/home/user'); //Altere aqui. Informe o caminho para acessar a raiz o algum diretório específico que deseja contar o número e tamanho dos arquivos. Neste caso, eu uso "/home/user(nome do meu user)" pois o script foi executado em S.O. Linux.
$iterator = new RecursiveIteratorIterator($diretorioEscolhido);
$arquivos = new RegexIterator($iterator, '/^.+\.pdf$/i', RecursiveRegexIterator::GET_MATCH); // Substitua o "pdf" pelo formato de arquivo que deseja, por exemplo: "php", "mp3", "jpg", "png" ou "html" e lembre-se de manter o "." antes do nome da extensão.

$contadorDeArquivos = 0;
$tamanhoTotal = 0;

foreach ($arquivos as $arquivoInfo) {
    $contadorDeArquivos++;
    // Acesso ao SplFileInfo para pegar o tamanho do arquivo
    $arquivo = new SplFileInfo($arquivoInfo[0]);
    $tamanhoTotal += $arquivo->getSize();
}

echo "Número de Arquivos encontrados: " . $contadorDeArquivos . "\n";
echo "Tamanho total dos arquivos: " . formataUnidsDeTamanho($tamanhoTotal);

//Função para facilitar a leitura do tamanho dos arquivos:
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
