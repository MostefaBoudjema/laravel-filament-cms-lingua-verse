<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ServeCommand as BaseServeCommand;
use Illuminate\Support\Stringable;

class ServeCommand extends BaseServeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Serve the application on the PHP development server (without access logs or session payloads)';

    /**
     * Flush the output buffer.
     *
     * @return void
     */
    protected function flushOutputBuffer()
    {
        $lines = (new Stringable($this->outputBuffer))->explode("\n");

        $this->outputBuffer = (string) $lines->pop();

        $lines
            ->map(fn ($line) => trim($line))
            ->filter()
            ->each(function ($line) {
                if ((new Stringable($line))->contains('Development Server (http')) {
                    if ($this->serverRunningHasBeenDisplayed === false) {
                        $this->serverRunningHasBeenDisplayed = true;

                        $this->components->info("Server running on [http://{$this->host()}:{$this->port()}].");
                        $this->comment('  <fg=yellow;options=bold>Press Ctrl+C to stop the server</>');

                        $this->newLine();
                    }

                    return;
                }

                // Tokens to ignore for typical PHP access logs
                $ignoreTokens = [
                    ' Accepted',
                    ' Closing',
                    'Closed without sending a request',
                    'Failed to poll event',
                    ']: GET ',
                    ']: POST ',
                    ']: PUT ',
                    ']: PATCH ',
                    ']: DELETE ',
                    ']: OPTIONS ',
                    ']: HEAD ',
                    'URI:',
                ];

                $stringableLine = new Stringable($line);

                // Ignore request logs AND ignore massive session queries
                if ($stringableLine->contains($ignoreTokens)) {
                    return;
                } elseif ($stringableLine->contains('update `sessions` set `payload`') || $stringableLine->contains("update 'sessions' set 'payload'")) {
                    return;
                } elseif ($stringableLine->contains('insert into `sessions`') || $stringableLine->contains("insert into 'sessions'")) {
                    return;
                } elseif (! empty($line)) {
                    // Extract valid logs, stripping typical timestamp prefix from php -S
                    if ($stringableLine->startsWith('[')) {
                        $line = $stringableLine->after('] ');
                    }

                    $this->output->writeln("  <fg=gray>$line</>");
                }
            });
    }
}
