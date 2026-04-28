<?php

$resources = [
    'Setting' => ['group' => '🛠 Site Infrastructure', 'translatable' => true, 'export' => false, 'media' => false],
    'Menu' => ['group' => '🛠 Site Infrastructure', 'translatable' => false, 'export' => false, 'media' => false],
    'MenuItem' => ['group' => '🛠 Site Infrastructure', 'translatable' => true, 'export' => false, 'media' => false],
    'Page' => ['group' => '📄 Content', 'translatable' => true, 'export' => false, 'media' => false],
    'Slider' => ['group' => '🛠 Site Infrastructure', 'translatable' => true, 'export' => false, 'media' => true],
    'Category' => ['group' => '🛍 Catalog & Services', 'translatable' => true, 'export' => false, 'media' => false],
    'Product' => ['group' => '🛍 Catalog & Services', 'translatable' => true, 'export' => true, 'media' => true],
    'Service' => ['group' => '🛍 Catalog & Services', 'translatable' => true, 'export' => true, 'media' => false],
    'ContactMessage' => ['group' => '📈 Logs & Support', 'translatable' => false, 'export' => true, 'media' => false],
];

foreach ($resources as $name => $config) {
    $resourcePath = __DIR__ . "/app/Filament/Resources/{$name}Resource.php";
    $content = file_get_contents($resourcePath);

    // 1. Navigation Group
    if (!str_contains($content, '$navigationGroup')) {
        $content = preg_replace('/(protected static \?string \$navigationIcon = \'[^\']+\';)/', "$1\n\n    protected static ?string \$navigationGroup = '{$config['group']}';", $content);
    }

    // 2. Translatable Trait
    if ($config['translatable'] && !str_contains($content, 'use Filament\Resources\Concerns\Translatable;')) {
        $content = str_replace("use Filament\Resources\Resource;", "use Filament\Resources\Resource;\nuse Filament\Resources\Concerns\Translatable;", $content);
        $content = preg_replace('/(class '.$name.'Resource extends Resource\n\{)/', "$1\n    use Translatable;\n", $content);
    }

    // 3. ToggleColumn for is_active
    $content = preg_replace('/Tables\\\\Columns\\\\IconColumn::make\(\'is_active\'\)[^,]+,/', "Tables\Columns\ToggleColumn::make('is_active'),", $content);
    $content = preg_replace('/Tables\\\\Columns\\\\TextColumn::make\(\'is_active\'\)[^,]+,/', "Tables\Columns\ToggleColumn::make('is_active'),", $content);

    // 4. Media
    if ($config['media']) {
        $content = str_replace("use Filament\Forms;", "use Filament\Forms;\nuse Filament\Forms\Components\SpatieMediaLibraryFileUpload;", $content);
        $content = preg_replace('/Forms\\\\Components\\\\TextInput::make\(\'image_path\'\)[^,]+,/', "SpatieMediaLibraryFileUpload::make('image_path'),", $content);
        if ($name === 'Product' && !str_contains($content, "SpatieMediaLibraryFileUpload::make('image')")) {
            // For product, maybe image field wasn't generated since it's Spatie media library not a direct db column. 
            // We should append it to schema array if it doesn't exist
            $content = preg_replace('/(->schema\(\[)/', "$1\n                SpatieMediaLibraryFileUpload::make('image')->collection('default'),", $content);
        }
    }

    // 5. Excel Export
    if ($config['export'] && !str_contains($content, 'pxlrbt\FilamentExcel')) {
        $content = str_replace("use Filament\Tables;", "use Filament\Tables;\nuse pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;", $content);
        $content = preg_replace('/(Tables\\\\Actions\\\\DeleteBulkAction::make\(\),)/', "$1\n                    ExportBulkAction::make(),", $content);
    }

    file_put_contents($resourcePath, $content);

    // Pages Traits
    if ($config['translatable']) {
        $pages = [
            'List' => "use Filament\Resources\Pages\ListRecords\Concerns\Translatable;\n\n    use Translatable;",
            'Create' => "use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;\n\n    use Translatable;",
            'Edit' => "use Filament\Resources\Pages\EditRecord\Concerns\Translatable;\n\n    use Translatable;"
        ];
        
        $plural = $name;
        if ($name == 'Category') $plural = 'Categories';
        else if ($name == 'Setting') $plural = 'Settings';
        else if ($name == 'Menu') $plural = 'Menus';
        else if ($name == 'MenuItem') $plural = 'MenuItems';
        else if ($name == 'Page') $plural = 'Pages';
        else if ($name == 'Slider') $plural = 'Sliders';
        else if ($name == 'Product') $plural = 'Products';
        else if ($name == 'Service') $plural = 'Services';

        foreach (['List' => "List{$plural}", 'Create' => "Create{$name}", 'Edit' => "Edit{$name}"] as $type => $className) {
            $pagePath = __DIR__ . "/app/Filament/Resources/{$name}Resource/Pages/{$className}.php";
            if (file_exists($pagePath)) {
                $pContent = file_get_contents($pagePath);
                if (!str_contains($pContent, 'use Translatable;')) {
                    if ($type == 'List') {
                        $pContent = str_replace("use Filament\Resources\Pages\ListRecords;", "use Filament\Resources\Pages\ListRecords;\nuse Filament\Resources\Pages\ListRecords\Concerns\Translatable;", $pContent);
                        $pContent = preg_replace('/(class '.$className.' extends ListRecords\n\{)/', "$1\n    use Translatable;\n", $pContent);
                        
                        // Add locale switcher
                        $pContent = preg_replace('/(protected function getHeaderActions\(\): array\n    \{\n        return \[)/', "$1\n            \Filament\Actions\LocaleSwitcher::make(),", $pContent);
                    }
                    if ($type == 'Create') {
                        $pContent = str_replace("use Filament\Resources\Pages\CreateRecord;", "use Filament\Resources\Pages\CreateRecord;\nuse Filament\Resources\Pages\CreateRecord\Concerns\Translatable;", $pContent);
                        $pContent = preg_replace('/(class '.$className.' extends CreateRecord\n\{)/', "$1\n    use Translatable;\n", $pContent);
                        $pContent = preg_replace('/(protected function getHeaderActions\(\): array\n    \{\n        return \[)/', "$1\n            \Filament\Actions\LocaleSwitcher::make(),", $pContent);
                        // If getHeaderActions doesn't exist, create it
                        if (!str_contains($pContent, 'getHeaderActions')) {
                            $pContent = preg_replace('/(\})/', "    protected function getHeaderActions(): array\n    {\n        return [\n            \Filament\Actions\LocaleSwitcher::make(),\n        ];\n    }\n}", $pContent);
                        }
                    }
                    if ($type == 'Edit') {
                        $pContent = str_replace("use Filament\Resources\Pages\EditRecord;", "use Filament\Resources\Pages\EditRecord;\nuse Filament\Resources\Pages\EditRecord\Concerns\Translatable;", $pContent);
                        $pContent = preg_replace('/(class '.$className.' extends EditRecord\n\{)/', "$1\n    use Translatable;\n", $pContent);
                        $pContent = preg_replace('/(protected function getHeaderActions\(\): array\n    \{\n        return \[)/', "$1\n            \Filament\Actions\LocaleSwitcher::make(),", $pContent);
                    }
                }
                file_put_contents($pagePath, $pContent);
            }
        }
    }
}
echo "Updated Filament Resources successfully.";
