<?php
declare(strict_types=1);

namespace IndexDumper\ConsoleCommands;

use IndexDumper\TableDumper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class DumpCommand extends Command
{
    protected static $defaultName = 'dump';

    protected function configure()
    {
        $this
            ->setDescription('dump index of string')
            ->addArgument('text', InputArgument::REQUIRED, 'text to dump its index');
    }

    /**
     * @throws \JsonException
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $text = $input->getArgument('text');
        $dumper = TableDumper::create($input, $output);

        $io->definitionList(
            ['strlen' => strlen($text)],
            ['mb_strlen' => mb_strlen($text)],
            ['grapheme_strlen' => grapheme_strlen($text)],
        );

        $split = str_split($text);
        $dumper->dump('str_split', $split);

        $split = mb_str_split($text);
        $dumper->dump('mb_str_split', $split);

        return Command::SUCCESS;
    }
}
