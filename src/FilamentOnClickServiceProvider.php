<?php

namespace OnClick\FilamentOnClick;

use Filament\Support\Assets\Js;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Asset;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Process;
use Spatie\LaravelPackageTools\Package;
use Filament\Support\Facades\FilamentIcon;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\AlpineComponent;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use OnClick\FilamentOnClick\Testing\TestsFilamentOnClick;
use OnClick\FilamentOnClick\Commands\FilamentOnClickCommand;

class FilamentOnClickServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-onclick';

    public static string $viewNamespace = 'filament-onclick';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->copyAndRegisterServiceProviderInApp()
                        ->publish('js')
                        ->endWith(function (InstallCommand $installCommand) {
                            $installCommand->info("Instal·lant dependències NPM...");
                            Process::run('npm i lodash.camelcase vue@latest @vitejs/plugin-vue -S');

                            $installCommand->info('Configurat correctament!');
                        });
                    // ->publishConfigFile()
                    // ->publishMigrations()
                    // ->askToRunMigrations()
                    // ->askToStarRepoOnGitHub('onclicksolucions/filament-onclick');
            });

        $configFileName = $package->shortName();

        $this->publishes([
            __DIR__ . '/../resources/js/app.js' => resource_path('js/app.js'),
            __DIR__ . '/../resources/js/components/SampleComponent.vue' => resource_path('js/components/SampleComponent.vue'),
        ], 'js');
        // if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
        //     $package->hasConfigFile();
        // }

        // if (file_exists($package->basePath('/../database/migrations'))) {
        //     $package->hasMigrations($this->getMigrations());
        // }

        // if (file_exists($package->basePath('/../resources/lang'))) {
        //     $package->hasTranslations();
        // }

        $package->hasCommands($this->getCommands());

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        // // Asset Registration
        // FilamentAsset::register(
        //     $this->getAssets(),
        //     $this->getAssetPackageName()
        // );

        // FilamentAsset::registerScriptData(
        //     $this->getScriptData(),
        //     $this->getAssetPackageName()
        // );

        // // Icon Registration
        // FilamentIcon::register($this->getIcons());

        // // Handle Stubs
        // if (app()->runningInConsole()) {
        //     foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
        //         $this->publishes([
        //             $file->getRealPath() => base_path("stubs/filament-onclick/{$file->getFilename()}"),
        //         ], 'filament-onclick-stubs');
        //     }
        // }

        // // Testing
        // Testable::mixin(new TestsFilamentOnClick());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'onclicksolucions/filament-onclick';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-onclick', __DIR__ . '/../resources/dist/components/filament-onclick.js'),
            // Css::make('filament-onclick-styles', __DIR__ . '/../resources/dist/filament-onclick.css'),
            // Js::make('filament-onclick-scripts', __DIR__ . '/../resources/dist/filament-onclick.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            FilamentOnClickCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            // 'create_filament-onclick_table',
        ];
    }
}
