<?php

namespace Search\Sdk\collections;

class PagesCollection extends Collection
{
    protected string $prefix = 'pages';

    protected string $titleField = 'title';

    public function getNames(array $collection, int $pageId, int $perPage = 10): string
    {
        $startIndex = ($pageId - 1) * $perPage;
        $showContent = array_slice($collection, $startIndex, $perPage);
        $string = '';
        $pageNumber = ($pageId - 1) * $perPage + 1; // Начальный номер для текущей страницы
        for ($i = 0; $i < count($showContent); $i++) {
            if(!$showContent[$i]['flag']){
                $title =substr($showContent[$i]['content'],0,20).'..........';
                $string .= $pageNumber + $i . ') ' . $title . "\n";
            }
            else{
                $title = $showContent[$i][$this->titleField];
                $string .= $pageNumber + $i . ') ' . $title . "\n";
                $string .= 'Ссылка -'.$this->getLink($showContent[$i]['book_id']) . "\n";
            }
        }
        return $string;
    }
}