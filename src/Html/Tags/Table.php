<?php
declare(strict_types=1);
/**
 * @Filename: Table.php
 * @Description:
 * @CreatedAt: 25/04/20 9:31
 * @Author: Roman Cisneros romancc9@gmail.com
 * Code is poetry
 */

namespace Rcc\Html\Tags;


class Table extends Div
{
    protected $elementType = 'table';

    /** @var Tr */
    private $theadRow;
    /** @var Tr[] */
    private $tbodyRows = [];

    function __construct(string $htmlId = '', array $classes = [])
    {
        parent::__construct($htmlId, $classes);
        $this->pushOneClass('table');
    }

    function appendTheadRow(Tr $tr): Table
    {
        $this->theadRow = $tr;

        return $this;
    }

    function appendTbodyRow(Tr $tr): Table
    {
        $this->tbodyRows[] = $tr;

        return $this;
    }

    function toHtml(): string
    {
        if (empty($this->theadRow) || empty($this->tbodyRows)) {
            return parent::toHtml();
        }

        /*
         * Se clona este objeto y se cargan el head row y los body rows. Se clona para en caso de que se le hayan
         * agregado otros elementos estos no se pierdan
         */
        $output = clone $this;
        $output->theadRow = null;
        $output->tbodyRows = [];
        $output->removeAllElements()
            ->append((new Thead())->append($this->theadRow));

        $tbody = new Tbody();
        foreach ($this->tbodyRows as $tr) {
            $tbody->append($tr);
        }
        $output->append($tbody);

        return $output->toHtml();
    }
}
