<?php

namespace OnClick\FilamentOnClick\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class FilamentOnClickCommand extends Command
{
    public $signature = 'filament-onclick:setup';

    public $description = 'Install required deps';

    public function handle(): int
    {
        Process::run('npm i lodash.camelcase vue@latest @vitejs/plugin-vue -S');

        return self::SUCCESS;
    }
}
