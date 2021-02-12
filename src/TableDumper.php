<?php
declare(strict_types=1);

namespace IndexDumper;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class TableDumper
{
    private OutputInterface $output;

    private Table $table;

    private SymfonyStyle $io;

    private function __construct(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
        $this->table = new Table($this->output);
        $this->io = new SymfonyStyle($input, $output);

    }

    public static function create(InputInterface $input, OutputInterface $output): self
    {
        return new self($input, $output);
    }

    public function dump(string $section, array $chars): void {
        $this->io->text($section);

        $rows = [];
        foreach ($chars as $i => $char) {
            $rows[] = [$i, $char];
        }

        $this->table
            ->setHeaders(['index', 'value'])
            ->setRows($rows)
            ->setHorizontal(true)
        ;
        $this->table->render();
    }
}