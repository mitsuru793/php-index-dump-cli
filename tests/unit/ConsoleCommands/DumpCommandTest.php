<?php
declare(strict_types=1);

namespace UnitTest\ConsoleCommands;

use IndexDumper\ConsoleCommands\DumpCommand;
use Spatie\Snapshots\MatchesSnapshots;
use Symfony\Component\Console\Tester\CommandTester;
use TestHelper\TestCase;

class DumpCommandTest extends TestCase
{
    use MatchesSnapshots;

    private CommandTester $tester;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tester = new CommandTester(new DumpCommand());
    }

    public function testExecute()
    {
        $this->tester->execute([
            'text' => 'hello',
        ]);
        $output = trim($this->tester->getDisplay());
        $this->assertMatchesTextSnapshot($output);
    }
}
