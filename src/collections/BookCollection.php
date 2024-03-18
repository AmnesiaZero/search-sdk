<?php

namespace Search\Sdk\collections;

class BookCollection extends Collection
{
    protected string $prefix = 'books';

    protected string $titleField = 'title';

    public function getNames(array $collection, int $pageId, int $perPage = 10): string
    {
        $startIndex = ($pageId - 1) * $perPage;
        $showContent = array_slice($collection, $startIndex, $perPage);
        $string = '';
        $pageNumber = ($pageId - 1) * $perPage + 1; // Начальный номер для текущей страницы
        for ($i = 0; $i < count($showContent); $i++) {
            $string .= $pageNumber + $i . ') ' . $showContent[$i][$this->titleField] . "\n";
            $string .= 'Ссылка -'.$this->getLink($showContent[$i]['id']) . "\n";
        }
        return $string;
    }
}